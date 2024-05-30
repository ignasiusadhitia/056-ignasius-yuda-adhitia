<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('image_url', function ($attribute, $value, $parameters, $validator) {
            // Check if the URL is valid
            if (!filter_var($value, FILTER_VALIDATE_URL)) {
                return false;
            }

            // Fetch the image data
            $imageData = @file_get_contents($value);
            if ($imageData === false) {
                return false; // Unable to fetch the image
            }

            // Check if the fetched data is an image
            $imageSize = @getimagesizefromstring($imageData);
            if ($imageSize === false) {
                return false; // Not a valid image
            }

            return true;
        });

        Validator::replacer('image_url', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The Image URL must be a valid URL pointing to an image.');
        });
    }
}
