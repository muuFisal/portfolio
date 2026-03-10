<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->date('date');
            $table->string('type')->nullable();
            $table->json('location')->nullable();
            $table->json('description')->nullable();
            $table->string('url')->nullable();
            $table->string('cover_image')->nullable();
            $table->boolean('featured')->default(false)->index();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
