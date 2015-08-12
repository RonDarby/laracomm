<?php

namespace Rondarby\Laracomm\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Config;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    protected function view( $template, array $data = [], $location = 'front' )
    {
        $theme = Config::get( 'laracomm.theme.' . $location );

        $view = 'laracomm::' . $location . "." . $theme . "." . $template;
        return View( $view , $data );
    }
}
