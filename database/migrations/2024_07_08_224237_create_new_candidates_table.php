<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('new_candidates', function (Blueprint $table) {
            $table->bigIncrements('jobseeker_id');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone_cleaned')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->longText('personal_summary')->nullable();
            $table->integer('desired_salary_cleaned')->nullable();
            $table->boolean('has_shown_irratic_behaviour')->nullable();
            $table->string('identifier_irratic_behaviour')->nullable();
            $table->boolean('is_physically_present')->nullable();
            $table->string('zip_code')->nullable();
            $table->integer('year_of_birth')->nullable();
            $table->boolean('job_admin')->nullable();
            $table->boolean('job_covid19')->nullable();
            $table->boolean('job_customerservice')->nullable();
            $table->boolean('job_distributionshipping')->nullable();
            $table->boolean('job_grocery')->nullable();
            $table->boolean('job_hospitalityhotel')->nullable();
            $table->boolean('job_marketingsales')->nullable();
            $table->boolean('job_other')->nullable();
            $table->boolean('job_production')->nullable();
            $table->boolean('job_restaurantfoodservice')->nullable();
            $table->boolean('job_retail')->nullable();
            $table->boolean('job_supplychain')->nullable();
            $table->boolean('job_transportation')->nullable();
            $table->boolean('job_warehouse')->nullable();
            $table->boolean('visa_all')->nullable();
            $table->boolean('visa_dp')->nullable();
            $table->boolean('visa_ep')->nullable();
            $table->boolean('visa_f')->nullable();
            $table->boolean('visa_ltvp')->nullable();
            $table->boolean('visa_my')->nullable();
            $table->boolean('visa_sg')->nullable();
            $table->boolean('visa_sp')->nullable();
            $table->boolean('visa_wp')->nullable();
            $table->boolean('have_resume')->nullable();
            $table->boolean('have_phone')->nullable();
            $table->boolean('have_email')->nullable();
            $table->boolean('picked_up_phone')->nullable();
            $table->longText('resume_url')->nullable();
            $table->boolean('previously_revealed')->nullable();
            $table->json('skills')->nullable();
            $table->json('education')->nullable();
            $table->json('work_experience')->nullable();
            $table->json('employment_history')->nullable();
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {


        Schema::dropIfExists('new_candidates');



    }
};
