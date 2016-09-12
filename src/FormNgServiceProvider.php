<?php namespace Larangu\FormNg;

use Illuminate\Support\ServiceProvider;
use Larangu\FormNg\Services\FormNgService;

class FormNgServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Http/routes.php';
        }

        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('finance.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/form-ng'),
        ], 'views');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'form-ng');

        $this->registerAliases($this->morphAliases);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'form-ng');

        $this->app->singleton('formNgService', function () {
            return app(FormNgService::class);
        });
    }
}
