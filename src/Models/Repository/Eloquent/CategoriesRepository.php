<?php
/**
 * ProductsRepository.php
 *
 * @author: Ron
 */

namespace Rondarby\Laracomm\Models\Repository\Eloquent;


use Rondarby\Laracomm\Models\Repository\CategoriesRepositoryInterface;

class CategoriesRepository extends Repository implements CategoriesRepositoryInterface
{

	protected $model = 'Rondarby\Laracomm\Models\Categories';
}