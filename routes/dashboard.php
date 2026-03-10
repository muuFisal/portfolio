<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\PortfolioController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\ForgotController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\Auth\ResetPasswordController;






Route::group([
    'prefix' => LaravelLocalization::setLocale() . '/dashboard',
    'as' => 'dashboard.',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });


    ############################### Auth Routes ############################################
    Route::get('login',       [AuthController::class, 'login'])->name('login');
    Route::post('login/post', [AuthController::class, 'loginPost'])->name('login.post');
    Route::post('logout',     [AuthController::class, 'logout'])->name('logout');

    ############################### Forgot Password Routes ############################################
    Route::group(['prefix' => 'password', 'as' => 'password.'], function () {
        Route::get('email',          [ForgotController::class, 'showEmailForm'])->name('email');
        Route::post('email',         [ForgotController::class, 'sendOTP'])->name('sendOTP');
        Route::get('verify/{email}', [ForgotController::class, 'showOtpForm'])->name('showOtpForm');
        Route::post('verify',        [ForgotController::class, 'verifyOtp'])->name('verifyOtp');

        ############################### Reset Password Routes ############################################
        Route::get('reset/{email}',  [ResetPasswordController::class, 'showResetForm'])->name('resetForm');
        Route::post('reset',         [ResetPasswordController::class, 'resetPassword'])->name('reset');
    });

    ############################### Admin Routes ############################################
    Route::group(['middleware' => 'auth:admin'], function () {

        ############################### Auth Routes ############################################
        Route::get('home', [AuthController::class, 'home'])->name('home');
        Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
        Route::get('security', [ProfileController::class, 'security'])->name('security');
        Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
        Route::post('profile/update/password', [ProfileController::class, 'profileUpdatePassword'])->name('profile.update.password');

        ############################### Role Routes ############################################
        Route::resource('roles', RoleController::class)->middleware('can:roles');
        ############################### End Role Routes ############################################

        ############################### Admin Routes ############################################
        Route::resource('admins',         AdminController::class)->middleware('can:admins');
        Route::get('admins/{id}/status', [AdminController::class, 'changeStatus'])->middleware('can:admins')->name('admin.changeStatus');
        ############################### End Amin Routes ############################################

        ############################### Users Routes ############################################
        Route::get('users',                  [UserController::class, 'index'])->middleware('can:users')->name('users.index');
        Route::get('user/profile/{id}',      [UserController::class, 'userProfile'])->middleware('can:users')->name('user.profile');
        ############################### End Users Routes #########################################







        ############################### settings Routes ############################################
        Route::get('settings',            [SettingsController::class, 'genralSetting'])->middleware('can:settings')->name('settings');
        ############################### End settings Routes ############################################

        ############################### Portfolio Routes ############################################
        Route::prefix('portfolio')->as('portfolio.')->group(function () {
            Route::get('settings', [PortfolioController::class, 'settings'])->middleware('can:portfolio_settings_view')->name('settings');
            Route::get('profile', [PortfolioController::class, 'profile'])->middleware('can:portfolio_profile_view')->name('profile');
            Route::get('about', [PortfolioController::class, 'about'])->middleware('can:portfolio_about_view')->name('about');
            Route::get('home-sections', [PortfolioController::class, 'sections'])->middleware('can:portfolio_home_sections_view')->name('sections.index');
            Route::get('home-sections/{key}', [PortfolioController::class, 'editSection'])->middleware('can:portfolio_home_sections_view')->name('sections.edit');
            Route::get('navigation', [PortfolioController::class, 'navigation'])->middleware('can:portfolio_navigation_view')->name('navigation.index');
            Route::get('navigation/create', [PortfolioController::class, 'createNavigation'])->middleware('can:portfolio_navigation_create')->name('navigation.create');
            Route::get('navigation/{link}/edit', [PortfolioController::class, 'editNavigation'])->middleware('can:portfolio_navigation_update')->name('navigation.edit');
            Route::get('seo-pages', [PortfolioController::class, 'seoPages'])->middleware('can:portfolio_seo_pages_view')->name('seo-pages.index');
            Route::get('seo-pages/create', [PortfolioController::class, 'createSeoPage'])->middleware('can:portfolio_seo_pages_create')->name('seo-pages.create');
            Route::get('seo-pages/{page}/edit', [PortfolioController::class, 'editSeoPage'])->middleware('can:portfolio_seo_pages_update')->name('seo-pages.edit');
            Route::get('projects', [PortfolioController::class, 'projects'])->middleware('can:portfolio_projects_view')->name('projects.index');
            Route::get('projects/create', [PortfolioController::class, 'createProject'])->middleware('can:portfolio_projects_create')->name('projects.create');
            Route::get('projects/{project}/edit', [PortfolioController::class, 'editProject'])->middleware('can:portfolio_projects_update')->name('projects.edit');
            Route::get('projects/{project}/show', [PortfolioController::class, 'showProject'])->middleware('can:portfolio_projects_view')->name('projects.show');
            Route::get('achievements', [PortfolioController::class, 'achievements'])->middleware('can:portfolio_achievements_view')->name('achievements.index');
            Route::get('achievements/create', [PortfolioController::class, 'createAchievement'])->middleware('can:portfolio_achievements_create')->name('achievements.create');
            Route::get('achievements/{achievement}/edit', [PortfolioController::class, 'editAchievement'])->middleware('can:portfolio_achievements_update')->name('achievements.edit');
            Route::get('experiences', [PortfolioController::class, 'experiences'])->middleware('can:portfolio_experiences_view')->name('experiences.index');
            Route::get('experiences/create', [PortfolioController::class, 'createExperience'])->middleware('can:portfolio_experiences_create')->name('experiences.create');
            Route::get('experiences/{experience}/edit', [PortfolioController::class, 'editExperience'])->middleware('can:portfolio_experiences_update')->name('experiences.edit');
            Route::get('skills', [PortfolioController::class, 'skills'])->middleware('can:portfolio_skills_view')->name('skills.index');
            Route::get('skills/create', [PortfolioController::class, 'createSkill'])->middleware('can:portfolio_skills_create')->name('skills.create');
            Route::get('skills/{skill}/edit', [PortfolioController::class, 'editSkill'])->middleware('can:portfolio_skills_update')->name('skills.edit');
            Route::get('events', [PortfolioController::class, 'events'])->middleware('can:portfolio_events_view')->name('events.index');
            Route::get('events/create', [PortfolioController::class, 'createEvent'])->middleware('can:portfolio_events_create')->name('events.create');
            Route::get('events/{event}/edit', [PortfolioController::class, 'editEvent'])->middleware('can:portfolio_events_update')->name('events.edit');
            Route::get('testimonials', [PortfolioController::class, 'testimonials'])->middleware('can:portfolio_testimonials_view')->name('testimonials.index');
            Route::get('testimonials/create', [PortfolioController::class, 'createTestimonial'])->middleware('can:portfolio_testimonials_create')->name('testimonials.create');
            Route::get('testimonials/{testimonial}/edit', [PortfolioController::class, 'editTestimonial'])->middleware('can:portfolio_testimonials_update')->name('testimonials.edit');
            Route::get('comments', [PortfolioController::class, 'comments'])->middleware('can:portfolio_comments_view')->name('comments.index');
            Route::get('comments/{id}', [PortfolioController::class, 'showComment'])->middleware('can:portfolio_comments_view')->name('comments.show');
            Route::get('contacts', [PortfolioController::class, 'contacts'])->middleware('can:portfolio_contacts_view')->name('contacts.index');
            Route::get('contacts/{contact}', [PortfolioController::class, 'showContact'])->middleware('can:portfolio_contacts_view')->name('contacts.show');
        });
        ############################### End Portfolio Routes ############################################

    });
});
