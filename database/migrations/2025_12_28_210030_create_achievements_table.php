<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $t) {
            $t->id();
            // Translatable JSON: {"ar": "...", "en": "..."}
            $t->json('title');
            $t->json('description')->nullable();

            // e.g. number to show in UI (projects count, years exp, ...)
            $t->unsignedInteger('value')->nullable();
            $t->string('unit')->nullable(); // e.g. '+', 'Projects', ...

            $t->unsignedInteger('sort_order')->default(0)->index();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
