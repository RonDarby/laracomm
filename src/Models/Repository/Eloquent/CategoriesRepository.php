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

	public function getSorted()
	{
		$model = $this->createModel();
		$sorted =  $model->get()->groupBy('parent');
        $all = $model->all()->keyBy('id')->toArray();
		//$sorted = $sorted->keyBy('id');
		$sorting = [];
        foreach( $sorted as $k=>$v)
        {
            $sorted[$k] = $v;
        }

		foreach( $sorted[''] as $k => $v )
		{
			if( isset( $sorted[$v['id']] ) )
			{
                foreach( $sorted[$v['id']]->keyBy('id')->toArray() as $id => $sub )
                {
                    unset( $all[$id] );
                    $sorting[$v['id']][$id] = $sub;
                }
                foreach( $all as $key => )
			}
            else
            {
                $sorting[$v['id']] = $v['id'];
            }
            unset( $all[$v['id']] );
		}

        var_dump( $all );
		foreach( $sorting as $k=>$v)
        {

        }
		dd($sorting);
		return $sorted;
	}
}