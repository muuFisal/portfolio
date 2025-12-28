<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $t) {
            $t->id();

            // العنوان (عربي/إنجليزي) زي "باك اند" / "Backend"
            $t->json('title');

            // السطر الإنجليزي اللي تحت زي "PHP / Laravel"
            $t->json('subtitle')->nullable();

            // النسبة
            $t->unsignedTinyInteger('percent')->default(0);

            // ترتيب العرض
            $t->unsignedSmallInteger('sort_order')->default(0);

            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
