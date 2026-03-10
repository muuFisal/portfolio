<?php

namespace App\Providers;

use App\Http\Resources\Portfolio\BasePortfolioResource;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        JsonResource::withoutWrapping();
        BasePortfolioResource::withoutWrapping();

        foreach (config('permessions_en') as $config_permession => $value) {
            Gate::define($config_permession, function ($auth) use ($config_permession) {
                return $auth->hasAccess($config_permession);
            });
        }

        RateLimiter::for('portfolio-comments', function (Request $request) {
            $identifier = implode('|', [
                $request->ip(),
                strtolower((string) $request->input('email')),
            ]);

            return Limit::perMinute(5)->by($identifier);
        });

        RateLimiter::for('portfolio-contact', function (Request $request) {
            $identifier = implode('|', [
                $request->ip(),
                strtolower((string) $request->input('email')),
            ]);

            return Limit::perMinute(8)->by($identifier);
        });
    }
}
