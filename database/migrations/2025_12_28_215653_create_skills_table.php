<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('subtitle')->nullable();
            $table->json('category')->nullable();
            $table->json('level_label')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedTinyInteger('percent')->default(0);
            $table->boolean('featured')->default(true)->index();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
