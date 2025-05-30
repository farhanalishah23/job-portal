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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('location_id');
            $table->string('job_title');
            $table->text('job_description');
            $table->text('qualification');
            $table->text('requirement');
            $table->text('benefits');
            $table->string('status');
            $table->string('type');
            $table->string('salary_offer');
            $table->string('company_name');
            $table->bigInteger('hr_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
