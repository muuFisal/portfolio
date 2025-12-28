<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $t) {
            $t->id();
            $t->json('role');
            $t->string('company');
            $t->date('start_date');
            $t->date('end_date')->nullable();
            $t->json('highlights')->nullable();
            $t->unsignedInteger('sort_order')->default(0)->index();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
