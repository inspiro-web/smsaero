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

    }

    protected function registerSmsAeroSingleton()
    {
        $this->app->singleton('smsaero', SMSAeroManager::class);
    }
}
