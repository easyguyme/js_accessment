<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(WebsiteController::class)->name('website.')->group(function () {
    Route::get('/new', 'new_candidates')->name('job');
    Route::get('/past', 'past_candidates')->name('past');
    Route::get('/', 'candidates')->name('candidate');
    Route::get('/employers', 'employees')->name('company');
    Route::get('job/autocomplete', 'jobAutocomplete')->name('job.autocomplete');
    Route::get('/jobs/category/{category}', 'jobsCategory')->name('job.category.slug');
    Route::get('/candidates/{id}', 'candidateDetails')->name('candidate.details');
    Route::get('/candidate/profile/details', 'candidateProfileDetails')->name('candidate.profile.details');

});
