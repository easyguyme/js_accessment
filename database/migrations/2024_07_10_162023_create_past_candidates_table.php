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
        Schema::create('past_candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id')->nullable();
            $table->string('email')->nullable();
            $table->string('full_name')->nullable();
            $table->datetime('date_parsed')->nullable();
            $table->string('phone')->nullable();
            $table->json('work_experience')->nullable();
            $table->json('education')->nullable();
            $table->integer('year_of_birth')->nullable();
            $table->boolean('visa_all')->nullable();
            $table->boolean('visa_sg')->nullable();
            $table->boolean('visa_my')->nullable();
            $table->boolean('visa_f')->nullable();
            $table->boolean('visa_ep')->nullable();
            $table->boolean('visa_wp')->nullable();
            $table->boolean('visa_sp')->nullable();
            $table->boolean('visa_ltvp')->nullable();
            $table->boolean('visa_dp')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('phone_cleaned')->nullable();
            $table->unsignedBigInteger('dropbox_resume_id')->nullable();
            $table->boolean('has_shown_irratic_behaviour')->nullable();
            $table->string('resume_url')->nullable();
            $table->integer('num_year_of_birth')->nullable();
            $table->text('sovren_raw_results')->nullable();
            $table->text('sovren_resume_summary')->nullable();
            $table->boolean('sovren_resume_parsing_failed')->nullable();
            $table->json('employment_history')->nullable();
            $table->unsignedBigInteger('resume_id')->nullable();
            $table->unsignedBigInteger('jobseeker_id')->nullable();
            $table->string('location')->nullable();
            $table->string('resume_owner')->nullable();
            $table->longText('dropbox_resume_url')->nullable();
            $table->string('fastjobs_job_title')->nullable();
            $table->boolean('previously_revealed')->nullable();
            $table->boolean('have_phone')->nullable();
            $table->string('last_activity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_candidates');
    }
};
