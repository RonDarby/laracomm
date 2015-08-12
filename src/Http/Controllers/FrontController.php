<?php
/**
 * FrontController.php
 *
 * @author: Ron
 */

namespace Rondarby\Laracomm\Http\Controllers;


use Rondarby\Laracomm\Models\Products;

class FrontController extends Controller
{

	public function getHome()
	{

		$products = Products::find(1);
		dd($products->categories()->get());
		return $this->view('pages.home');
	}
}