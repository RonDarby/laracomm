<?php
/**
 * OrderItem.php
 *
 * @author: Ron
 */

namespace Rondarby\Laracomm\Models;


use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
	protected $table = 'order_items';
	protected $fillable = [
		'order_id',
	    'product_id'
	];
}