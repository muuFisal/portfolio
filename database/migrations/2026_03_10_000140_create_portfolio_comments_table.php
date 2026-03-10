<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('role')->nullable();
            $table->text('comment');
            $table->unsignedTinyInteger('rating')->nullable();
            $table->string('avatar')->nullable();
            $table->string('source')->nullable();
            $table->boolean('featured')->default(false)->index();
            $table->string('status')->default('pending')->index();
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_comments');
    }
};
