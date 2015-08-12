<?php
/**
 * Images.php
 *
 * @author: Ron
 */

namespace Rondarby\Laracomm\Models;


use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
	protected $table = 'images';
	private $fillage = [
		'name',
	    'location',
	    'mime',
	    'visible'
	];
}