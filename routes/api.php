<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventsController;
use App\Http\Controllers\Api\SkillsController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ProjectsController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgotController;
use App\Http\Controllers\Api\ExperiencesController;
use App\Http\Controllers\Api\AchievementsController;
use App\Http\Controllers\Api\TestimonialsController;


## ================== SETTINGS ================== ##
Route::get('/settings', [SettingsController::class, 'index']);
## ================== SETTINGS ================== ##


## ================== PROJECTS ================== ##
Route::get('/projects', [ProjectsController::class, 'index']);
Route::get('/projects/{slug}', [ProjectsController::class, 'show']);
## ================== PROJECTS ================== ##


## ================== EXPERIENCES ================== ##
Route::get('/experiences', [ExperiencesController::class, 'index']);
## ================== EXPERIENCES ================== ##


## ================== EVENTS ================== ##
Route::get('/events', [EventsController::class, 'index']);
## ================== EVENTS ================== ##


## ================== TESTIMONIALS ================== ##
Route::get('/testimonials', [TestimonialsController::class, 'index']);
## ================== TESTIMONIALS ================== ##


## ================== ACHIEVEMENTS ================== ##
Route::get('/achievements', [AchievementsController::class, 'index']);
## ================== ACHIEVEMENTS ================== ##


## ================== CONTACT ================== ##
Route::post('/contact', [ContactController::class, 'store']);
## ================== CONTACT ================== ##

## ================== SKILLS ================== ##
Route::get('/skills', [SkillsController::class, 'index']);
## ================== SKILLS ================== ##




## ------------------ AUTH ROUTES ------------------ ##
// Route::controller(AuthController::class)->group(function () {
//     Route::post('/register',     'register')->middleware('guest');
//     Route::post('/verify-otp',   'verifyOtp')->middleware('guest');
//     Route::post('/resend-otp',   'resendOtp')->middleware('guest');
//     Route::post('/login',        'login')->middleware('guest');
//     Route::post('/logout',       'logout')->middleware('auth:sanctum');
// });
## ------------------ AUTH ROUTES ------------------ ##




## ------------------ Forgot Password ------------------ ##
// Route::post('/forgot/password',         [ForgotController::class, 'forgotPassword'])->middleware('guest');
// Route::post('/forgot/verify-otp',       [ForgotController::class, 'verifyOtp'])->middleware('guest');
// Route::post('/forgot/resend-otp',       [ForgotController::class, 'resendOtp'])->middleware('guest');
// Route::post('/forgot/reset-password',   [ForgotController::class, 'resetPassword'])->middleware('guest');
## ------------------ Forgot Password ------------------ ##
