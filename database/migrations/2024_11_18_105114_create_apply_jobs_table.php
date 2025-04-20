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
        Schema::create('apply_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_id');
            $table->string('candidate_name');
            $table->string('candidate_email');
            $table->text('education');
            $table->text('qualification');
            $table->text('job_attachment');
            $table->text('status');
            $table->string('user_id');
            $table->text('cover_letter');
            $table->string('hr_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_jobs');
    }
};
