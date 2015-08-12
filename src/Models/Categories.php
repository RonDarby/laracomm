<?php
/**
 * Categories.php
 *
 * @author: Ron
 */

namespace Rondarby\Laracomm\Models;


use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	protected $table = 'categories';
	protected $fillable = [
		'title',
	    'type',
	    'image_id'
	];

}