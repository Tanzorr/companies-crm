<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('phone_regex', function ($attribute, $value, $parameters, $validator) {
            // Your phone number regex pattern
            $pattern = '/^\+?\d{1,4}(?:[-.\s]?\d{1,4}){0,2}$/';

            return preg_match($pattern, $value);
        });
    }
}
