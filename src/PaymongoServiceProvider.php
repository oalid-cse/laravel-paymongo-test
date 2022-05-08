<?php

namespace ABO\Paymongo;

use Illuminate\Support\ServiceProvider;
use ABO\Paymongo\Commands\WebhookAddCommand;
use ABO\Paymongo\Commands\WebhookListCommand;
use ABO\Paymongo\Commands\WebhookToggleCommand;
use ABO\Paymongo\Middlewares\PaymongoValidateSignature;
use ABO\Paymongo\Signer\Signer;

class PaymongoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('paymongo.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                WebhookListCommand::class,
                WebhookAddCommand::class,
                WebhookToggleCommand::class,
            ]);
        }

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'paymongo');

        $this->app->singleton('paymongo', function () {
            return new Paymongo;
        });

        $this->app->bind(Signer::class, config('paymongo.signer'));

        $this->app['router']->aliasMiddleware('paymongo.signature', PaymongoValidateSignature::class);
    }
}
