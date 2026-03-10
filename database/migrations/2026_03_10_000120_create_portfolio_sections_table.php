<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_sections', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->json('title')->nullable();
            $table->json('subtitle')->nullable();
            $table->json('content')->nullable();
            $table->json('items')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_sections');
    }
};
