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
        $this->helloMessage();
        $valid = $this->checkPurchaseCode();
        if( $valid )
        {
            Artisan::call('vendor:publish');
            // Run the migrations
            Artisan::call('migrate', [ '--force' => true ]);
            $this->output->writeln(<<<SUCEESS
<fg=green>
Success, Thanks for purchasing!!!!
</fg=green>
SUCEESS
);
        }
        else
        {
            $this->output->writeln(<<<INVALID
<fg=red>
Your Purchase Code is incorrect!!!
</fg=red>
INVALID
);
        }
    }

    private function checkPurchaseCode()
    {
        $code = $this->ask('Please insert the purchase code.');

        // ToDo:: Write the integration into either cozareg's license or envato's sales
        return true;
    }

    private function helloMessage()
    {
        $this->output->writeln(<<<HELLO
<fg=white>
*-----------------------------------------------*
|                                               |
|       Thank-You for installing LaraComm       |
|              Copyright (c) 2015               |
|              Ron Darby LaraComm.              |
|                                               |
*-----------------------------------------------*
</fg=white>
HELLO
        );
    }
}