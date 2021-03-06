<?php

namespace SMSAero;

use Illuminate\Support\ServiceProvider;

class SMSAeroServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerSmsAeroSingleton();
    }

    public function boot()
    {
        $this->publishConfig();
    }

    protected function registerSmsAeroSingleton()
    {
        $this->app->singleton('smsaero', API::class);
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__.'/config/smsaero.php' => config_path('smsaero.php'),
        ], 'smsaero-config');
    }
}
