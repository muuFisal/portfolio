<?php

namespace Tests\Feature\Api;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioApiTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;
    protected string $seeder = DatabaseSeeder::class;

    public function test_shared_endpoints_return_the_expected_envelope(): void
    {
        foreach ([
            '/api/v1/portfolio/settings',
            '/api/v1/portfolio/navigation',
            '/api/v1/portfolio/profile',
            '/api/v1/portfolio/about',
            '/api/v1/portfolio/contact-info',
        ] as $endpoint) {
            $this->getJson($endpoint)
                ->assertOk()
                ->assertJsonStructure([
                    'code',
                    'message',
                    'data',
                    'pagination',
                ]);
        }
    }

    public function test_localized_endpoints_return_translated_values_not_raw_translation_objects(): void
    {
        $response = $this->withHeaders([
            'Accept-Language' => 'ar',
        ])->getJson('/api/v1/portfolio/profile');

        $response
            ->assertOk()
            ->assertJsonPath('data.headline', 'مهندس باك إند يسلّم واجهات برمجية ولوحات تحكم وتكاملات.')
            ->assertJsonMissingPath('data.headline.en')
            ->assertJsonMissingPath('data.headline.ar');
    }

    public function test_projects_endpoint_supports_filters_and_returns_filter_metadata(): void
    {
        $this->getJson('/api/v1/portfolio/projects?featured=1&category=web&tag=laravel&per_page=9')
            ->assertOk()
            ->assertJsonPath('data.items.0.slug', 'merchant-core-platform')
            ->assertJsonCount(1, 'data.items')
            ->assertJsonPath('data.filters.categories', ['fintech', 'open-source', 'web'])
            ->assertJsonPath('data.filters.tags', ['api', 'dashboard', 'laravel', 'mysql', 'open-source', 'payments', 'webhooks'])
            ->assertJsonPath('data.summary.total_items', 1)
            ->assertJsonPath('pagination.per_page', 9);
    }

    public function test_project_details_return_full_media_urls_and_gallery(): void
    {
        $this->getJson('/api/v1/portfolio/projects/merchant-core-platform')
            ->assertOk()
            ->assertJsonPath('data.slug', 'merchant-core-platform')
            ->assertJsonPath('data.gallery.0.url', asset('uploads/images/logo.png'))
            ->assertJsonPath('data.cover_image_url', asset('uploads/images/logo.png'));
    }

    public function test_comments_endpoint_only_returns_approved_comments_and_is_paginated(): void
    {
        $this->getJson('/api/v1/portfolio/comments?featured=1&per_page=5')
            ->assertOk()
            ->assertJsonCount(1, 'data.items')
            ->assertJsonPath('data.items.0.name', 'Noor')
            ->assertJsonPath('data.summary.total_items', 1)
            ->assertJsonPath('pagination.per_page', 5);
    }

    public function test_comment_submission_creates_a_pending_comment(): void
    {
        $this->postJson('/api/v1/portfolio/comments', [
            'name' => 'Test Commenter',
            'email' => 'commenter@example.com',
            'role' => 'Designer',
            'comment' => 'This portfolio API is well structured.',
            'rating' => 5,
            'source' => 'test',
        ])->assertCreated()
            ->assertJsonPath('data.status', 'pending');

        $this->assertDatabaseHas('portfolio_comments', [
            'email' => 'commenter@example.com',
            'status' => 'pending',
        ]);
    }

    public function test_contact_submission_creates_a_new_contact_message(): void
    {
        $this->postJson('/api/v1/portfolio/contact', [
            'name' => 'Product Team',
            'email' => 'product@example.com',
            'phone' => '+20 111 111 1111',
            'company' => 'Acme',
            'service_interest' => 'API Development',
            'budget_range' => '$5k-$10k',
            'message' => 'We need a backend partner for a dashboard rebuild.',
            'source' => 'website',
        ])->assertCreated()
            ->assertJsonPath('data.status', 'new');

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'product@example.com',
            'status' => 'new',
        ]);
    }
}
