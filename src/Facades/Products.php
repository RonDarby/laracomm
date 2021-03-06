<?php
/**
 * Products.php
 *
 * @author: Ron
 */

namespace Rondarby\Laracomm\Facades;


use Illuminate\Support\Facades\Facade;

class Products extends Facade
{
		/**
	     * Get the registered name of the component.
	     *
	     * @return string
	     */
	    protected static function getFacadeAccessor() { return 'Rondarby\Laracomm\Models\Repository\ProductsRepositoryInterface'; }
}