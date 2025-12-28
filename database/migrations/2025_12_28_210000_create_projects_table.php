<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();

            // Translatable JSON: {"ar": "...", "en": "..."}
            $t->json('title');
            $t->json('summary');

            $t->boolean('featured')->default(false)->index();
            $t->json('tags')->nullable();

            // main cover image (relative path stored)
            $t->string('cover_image')->nullable();

            // optional links
            $t->string('web_url')->nullable();
            $t->string('google_play_url')->nullable();
            $t->string('app_store_url')->nullable();

            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
