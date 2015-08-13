<?php
/**
 * ProductsRepositoryInterface.php
 *
 * @author: Ron
 */

namespace Rondarby\Laracomm\Models\Repository;


interface ProductsRepositoryInterface
{
    public function create( array $detail, Closure $callback = null );
	public function findById( $id );
	public function all();
	public function update( $detail );
}