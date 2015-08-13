<?php
/**
 * ProductsRepository.php
 *
 * @author: Ron
 */

namespace Rondarby\Laracomm\Models\Repository\Eloquent;


use Rondarby\Laracomm\Models\Repository\ProductsRepositoryInterface;

class ProductsRepository extends Repository implements ProductsRepositoryInterface
{

	protected $model = 'Rondarby\Laracomm\Models\Products';
}