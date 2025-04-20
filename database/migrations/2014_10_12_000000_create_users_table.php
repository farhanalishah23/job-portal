<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
             $table->string('google_id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cover_letter')->nullable();
                 $table->string('status')->default('active');
            $table->string('role');
              $table->string('profile_title')->nullable();
        $table->text('education')->nullable();
        $table->text('past_experience')->nullable();
        $table->string('skill_1')->nullable();
        $table->string('skill_2')->nullable();
        $table->string('skill_3')->nullable();
        $table->text('about_me')->nullable();
        $table->string('address')->nullable();
        $table->string('phone_no')->nullable();
        $table->string('image')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
