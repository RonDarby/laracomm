<?php
/**
 * ProductsRepositoryInterface.php
 *
 * @author: Ron
 */

namespace Rondarby\Laracomm\Models\Repository;

use Closure;
interface ProductsRepositoryInterface
{
    public function create( array $detail, Closure $callback = null );
	public function findById( $id );
	public function all();
	public function update(  $id, array $detail  );
	public function delete( $id );
}