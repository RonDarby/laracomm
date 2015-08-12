<?php
/**
 * routes.php
 *
 * @author: Ron
 */



Route::get('/', ['as' => 'home', 'uses' => 'FrontController@getHome'] );