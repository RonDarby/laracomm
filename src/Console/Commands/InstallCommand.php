<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2015-08-12
 * Time: 10:08 PM
 */
namespace Rondarby\Laracomm\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
    protected $signature = 'laracomm:install';
    protected $description = 'Install the Laracomm Package';

    public function handle()
    {
        Artisan::call('vendor:publish');

        \Event::fire('laracomm.published');
        // Run the migrations
        Artisan::call('migrate', [ '--force' => true ]);

        \Event::fire('laracomm.migrated');
    }


}