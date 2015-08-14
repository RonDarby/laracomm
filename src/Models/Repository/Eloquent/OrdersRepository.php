<?php
/**
 * OrdersRepository.php
 *
 * @author: Ron
 */

namespace Rondarby\Laracomm\Models\Repository\Eloquent;


use Rondarby\Laracomm\Models\Repository\OrdersRepositoryInterface;

class OrdersRepository extends Repository implements OrdersRepositoryInterface
{
    protected $model = 'Rondarby\Laracomm\Models\Orders';
}