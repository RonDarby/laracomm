<?php
/**
 * Orders.php
 *
 * @author: Ron
 */

namespace Rondarby\Laracomm\Models;


use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
	protected $table = 'orders';
	protected $fillable = [
		'total',
	    'status',
	    'user_id'
	];
}