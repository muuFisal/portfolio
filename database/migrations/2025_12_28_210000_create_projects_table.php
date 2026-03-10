<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->json('title');
            $table->json('summary');
            $table->json('description')->nullable();
            $table->string('category')->nullable()->index();
            $table->boolean('featured')->default(false)->index();
            $table->boolean('is_open_source')->default(false)->index();
            $table->json('tags')->nullable();
            $table->json('stack')->nullable();
            $table->json('highlights')->nullable();
            $table->json('challenges')->nullable();
            $table->json('solutions')->nullable();
            $table->json('metrics')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('og_image')->nullable();
            $table->string('web_url')->nullable();
            $table->string('google_play_url')->nullable();
            $table->string('app_store_url')->nullable();
            $table->string('repository_url')->nullable();
            $table->string('case_study_url')->nullable();
            $table->string('client_name')->nullable();
            $table->date('project_date')->nullable();
            $table->json('seo_title')->nullable();
            $table->json('seo_description')->nullable();
            $table->json('seo_keywords')->nullable();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
