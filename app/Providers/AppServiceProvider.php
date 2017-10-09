<?php

namespace App\Providers;

use App\AuditDrivers\Niajiri;
use Illuminate\Support\ServiceProvider;
use OwenIt\Auditing\Facades\Auditor;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //see https://github.com/laravel/framework/issues/17508
        Schema::defaultStringLength(191);

       //register walimu audit driver
        Auditor::extend('niajiri', function () {
            return $this->app->make(Niajiri::class);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //register helpers
        require_once __DIR__ . '/../Helpers/strings.php';

        //register oauth callback uri & urls
        foreach (Config::get('services') as $key => $config) {

            if (!isset($config['redirect'])) {
                continue;
            }
            Config::set("services.$key.redirect", url($config['redirect']));
        }
    }
}
