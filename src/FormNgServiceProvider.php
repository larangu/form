<?php namespace Larangu\FormNg;

use Illuminate\Support\ServiceProvider;
use Larangu\FormNg\Contracts\FormBuilder;
use Larangu\FormNg\Form\BuilderNg;

class FormNgServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('form-ng.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/form-ng'),
        ], 'views');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'form-ng');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'form-ng');

        $this->app->singleton(FormBuilder::class, function () {
            return $this->app->make(BuilderNg::class);
        });

        $this->app->singleton('formBuilderNg', function () {
            return $this->app->make(FormBuilder::class);
        });
    }
}
