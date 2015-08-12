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

            $path = realpath(__DIR__.'/resources/views/');

            $this->loadViewsFrom( $path, 'laracomm');

            // use this if your package has routes
            $this->setupRoutes($this->app->router);

            $config = $this->app['config']->get('laracomm');


            view()->share( 'frontTheme', 'laracomm::front.' . $config['theme']['front'] . '.' );
            view()->share( 'adminThem',  'laracomm::admin.' . $config['theme']['admin'] . '.' );

            $migrations = realpath(__DIR__.'/database/migrations');

            $this->publishes([
               $migrations => $this->app->databasePath().'/migrations',
            ], 'migrations');

             $this->publishes([
                     __DIR__.'/config/config.php' => config_path('laracomm.php')
             ]);

            $this->publishes( [
                __DIR__.'/resources/views' => base_path('resources/views/vendor/laracomm' )
            ]);



            // use the vendor configuration file as fallback
             $this->mergeConfigFrom(
                 __DIR__.'/config/config.php', 'laracomm'
             );
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
            $this->registerBindings();

            // use this if your package has a config file
             config([
                     'config/config.php',
             ]);
        }

        private function registerLaracomm()
        {
            $this->app->bind('laracomm',function($app){
                return new Laracomm($app);
            });
        }

        private function registerBindings()
        {
            // $this->app->bind( );
        }
}