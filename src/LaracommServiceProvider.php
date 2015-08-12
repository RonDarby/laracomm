<?php

namespace Rondarby\Laracomm;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class LaracommServiceProvider extends ServiceProvider
{
    /**
         * Indicates if loading of the provider is deferred.
         *
         * @var bool
         */
        protected $defer = false;

        /**
         * Perform post-registration booting of services.
         *
         * @return void
         */
        public function boot()
        {

            // use this if your package has views
            $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'laracomm');

            // use this if your package has routes
            $this->setupRoutes($this->app->router);

            view()->share( 'frontTheme', Config::get( 'laracomm.theme.front', 'default' ) . '.' );
            view()->share( 'adminThem',  Config::get( 'laracomm.theme.admin', 'default' ) . '.' );

            // use this if your package needs a config file
            // $this->publishes([
            //         __DIR__.'/config/config.php' => config_path('laracomm.php'),
            // ]);

            // use the vendor configuration file as fallback
            // $this->mergeConfigFrom(
            //     __DIR__.'/config/config.php', 'laracomm'
            // );
        }

        /**
         * Define the routes for the application.
         *
         * @param  \Illuminate\Routing\Router  $router
         * @return void
         */
        public function setupRoutes(Router $router)
        {
            $router->group(['namespace' => 'Rondarby\Laracomm\Http\Controllers'], function($router)
            {
                require __DIR__.'/Http/routes.php';
            });
        }

        /**
         * Register any package services.
         *
         * @return void
         */
        public function register()
        {
            $this->registerLaracomm();

            // use this if your package has a config file
             config([
                     'config/laracomm.php',
             ]);
        }

        private function registerLaracomm()
        {
            $this->app->bind('laracomm',function($app){
                return new Laracomm($app);
            });
        }
}