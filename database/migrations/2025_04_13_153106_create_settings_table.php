<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->json('site_name');
            $table->json('site_desc');
            $table->json('site_title');
            $table->string('site_phone')->nullable();
            $table->json('site_address');
            $table->string('site_email')->nullable();
            $table->string('email_support')->nullable();
            $table->text('facebook')->nullable();
            $table->text('x_url')->nullable();
            $table->text('youtube')->nullable();
            $table->text('instagram')->nullable();
            $table->text('tiktok')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('github')->nullable();
            $table->json('meta_key')->nullable();
            $table->json('meta_desc')->nullable();
            $table->text('logo')->nullable();
            $table->text('logo_dark')->nullable();
            $table->text('favicon')->nullable();
            $table->text('resume')->nullable();
            $table->text('profile_image')->nullable();
            $table->text('default_og_image')->nullable();
            $table->text('site_copyright')->nullable();
            $table->text('promotion_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
