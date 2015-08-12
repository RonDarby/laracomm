<?php
/**
 * FrontController.php
 *
 * @author: Ron
 */

namespace Rondarby\laracomm\Http\Controllers;

class FrontController extends Controller
{

	public function getHome()
	{
		return $this->view('pages.home');
	}
}