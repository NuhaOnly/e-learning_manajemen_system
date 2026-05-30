<?php

namespace App\Providers;

use App\Models\Google;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class GoogleServiceProvider extends ServiceProvider
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
        // cek apakah tabel googles sudah ada
        if (Schema::hasTable('googles')) {

            $googleConfig = Google::first();

            if ($googleConfig) {
                Config::set('services.google.client_id', $googleConfig->client_id);
                Config::set('services.google.client_secret', $googleConfig->secret_key);
            }
        }
    }
}