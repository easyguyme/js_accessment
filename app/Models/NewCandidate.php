<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCandidate extends Model
{
    use HasFactory;
    protected $primaryKey = 'jobseeker_id';
    protected $fillable = [
        'full_name',
        'email',
        'phone_cleaned',
        'phone',
        'location',
        'personal_summary',
        'desired_salary_cleaned',
        'has_shown_erratic_behaviour',
        'identifier_erratic_behaviour',
        'is_physically_present',
        'zip_code',
        'date_of_birth',
        'year_of_birth',
        'has_resume',
        'has_phone',
        'has_email',
        'picked_up_phone',
        'resume_url',
        'previously_revealed',
        'skills',
        'education',
        'work_experience',
        'employment_history',

    ];

    protected $casts = [
        'skills' => 'array',
        'education' => 'array',
        'work_experience' => 'array',
        'employment_history' => 'array',
    ];


}
