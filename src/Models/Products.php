<?php
/**
 * Products.php
 *
 * @author: Ron
 */

namespace Rondarby\Laracomm\Models;


use Illuminate\Database\Eloquent\Model;


class Products extends Model
{
	protected $table = 'products';

	protected $fillable = [
		'title',
	    'friendly_uri',
	    'long_desc',
	    'short_desc',
	    'price'
	];

	public function categories()
	{
		return $this->belongsToMany( 'Rondarby\Laracomm\Models\Categories' )->withPivot('Rondarby\Laracomm\Models\ProductCategories');
	}

}