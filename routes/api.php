<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Portfolio\PortfolioHomeController;
use App\Http\Controllers\Api\Portfolio\PortfolioCareerController;
use App\Http\Controllers\Api\Portfolio\PortfolioSharedController;
use App\Http\Controllers\Api\Portfolio\PortfolioCommentsController;
use App\Http\Controllers\Api\Portfolio\PortfolioContactsController;
use App\Http\Controllers\Api\Portfolio\PortfolioProjectsController;
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

Route::prefix('v1/portfolio')->group(function () {
    Route::get('/settings', [PortfolioSharedController::class, 'settings']);
    Route::get('/navigation', [PortfolioSharedController::class, 'navigation']);
    Route::get('/seo/pages/{pageKey}', [PortfolioSharedController::class, 'seoPage']);
    Route::get('/profile', [PortfolioSharedController::class, 'profile']);
    Route::get('/about', [PortfolioSharedController::class, 'about']);

    Route::prefix('home')->group(function () {
        Route::get('/hero', [PortfolioHomeController::class, 'hero']);
        Route::get('/highlights', [PortfolioHomeController::class, 'highlights']);
        Route::get('/featured-projects', [PortfolioHomeController::class, 'featuredProjects']);
        Route::get('/process', [PortfolioHomeController::class, 'process']);
        Route::get('/skills-showcase', [PortfolioHomeController::class, 'skillsShowcase']);
        Route::get('/open-source', [PortfolioHomeController::class, 'openSource']);
    });

    Route::get('/projects', [PortfolioProjectsController::class, 'index']);
    Route::get('/projects/{slug}', [PortfolioProjectsController::class, 'show']);

    Route::get('/experiences', [PortfolioCareerController::class, 'experiences']);
    Route::get('/skills', [PortfolioCareerController::class, 'skills']);
    Route::get('/events', [PortfolioCareerController::class, 'events']);
    Route::get('/testimonials', [PortfolioCareerController::class, 'testimonials']);

    Route::get('/comments', [PortfolioCommentsController::class, 'index']);
    Route::post('/comments', [PortfolioCommentsController::class, 'store'])->middleware('throttle:portfolio-comments');

    Route::get('/contact-info', [PortfolioContactsController::class, 'info']);
    Route::post('/contact', [PortfolioContactsController::class, 'store'])->middleware('throttle:portfolio-contact');
});


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
