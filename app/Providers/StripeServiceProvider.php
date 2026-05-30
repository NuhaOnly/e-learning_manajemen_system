<?php

namespace App\Providers;

use App\Models\Stripe;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class StripeServiceProvider extends ServiceProvider
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
         if (Schema::hasTable('stripes')) {
        // Fetch Stripe settings from the database
        $stripeConfig = Stripe::first();
        if ($stripeConfig) {
            Config::set('stripe.stripe_pk', $stripeConfig->publish_key);
            Config::set('stripe.stripe_sk', $stripeConfig->secret_key);
        }
    }
    }
}
