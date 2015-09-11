<?php

namespace Rondarby\Laracomm;

use Illuminate\Support\ServiceProvider;

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
            $migrations = realpath(__DIR__.'/database/migrations');

            $this->publishes([
               $migrations => $this->app->databasePath().'/migrations',
            ], 'migrations');

            /* $this->publishes([
                                  __DIR__.'/config/config.php' => config_path('laracomm.php')
                          ]);


                         // use the vendor configuration file as fallback
                          $this->mergeConfigFrom(
                              __DIR__.'/config/config.php', 'laracomm'
                          );*/
            $this-> bootFacades();
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
            $this->registerCommands();


            // use this if your package has a config file
            /* config([
                     'config/config.php',
             ]);*/
        }

        private function bootFacades()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Products', 'Rondarby\Laracomm\Facades\Products');
            $loader->alias('Categories','Rondarby\Laracomm\Facades\Categories');

        }

        private function registerLaracomm()
        {
            $this->app->bind('laracomm',function($app){
                return new Laracomm($app);
            });
        }

        private function registerBindings()
        {
            $this->app->bind(
                'Rondarby\Laracomm\Models\Repository\ProductsRepositoryInterface','Rondarby\Laracomm\Models\Repository\Eloquent\ProductsRepository'
             );
            $this->app->bind(
                    'Rondarby\Laracomm\Models\Repository\CategoriesRepositoryInterface',
                'Rondarby\Laracomm\Models\Repository\Eloquent\CategoriesRepository'
                 );
        }

        private function registerCommands()
        {
            $this->app->singleton('laracomm.install', function ($app) {
                return $app['Rondarby\Laracomm\Console\Commands\InstallCommand'];
            });
            $this->commands('laracomm.install');
        }
}