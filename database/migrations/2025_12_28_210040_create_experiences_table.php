<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->json('role');
            $table->string('company');
            $table->json('summary')->nullable();
            $table->json('location')->nullable();
            $table->json('employment_type')->nullable();
            $table->string('company_url')->nullable();
            $table->string('logo')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->json('highlights')->nullable();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
