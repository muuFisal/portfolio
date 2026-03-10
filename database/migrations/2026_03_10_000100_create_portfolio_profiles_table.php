<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->json('headline');
            $table->json('short_bio');
            $table->json('long_bio')->nullable();
            $table->json('location')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->json('availability_text')->nullable();
            $table->unsignedTinyInteger('years_experience')->nullable();
            $table->unsignedInteger('projects_delivered')->nullable();
            $table->unsignedInteger('clients_count')->nullable();
            $table->json('focus_areas')->nullable();
            $table->json('hero_badges')->nullable();
            $table->json('primary_cta_label')->nullable();
            $table->string('primary_cta_url')->nullable();
            $table->json('secondary_cta_label')->nullable();
            $table->string('secondary_cta_url')->nullable();
            $table->string('resume')->nullable();
            $table->string('profile_image')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_profiles');
    }
};
