<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_nav_links', function (Blueprint $table) {
            $table->id();
            $table->json('label');
            $table->string('href');
            $table->string('page_key')->nullable();
            $table->string('target')->default('_self');
            $table->string('icon')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_nav_links');
    }
};
