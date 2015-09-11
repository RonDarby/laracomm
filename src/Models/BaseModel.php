<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2015-08-28
 * Time: 08:06 PM
 */
namespace Rondarby\Laracomm\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function manyThroughMany($related, $through, $firstKey, $secondKey, $pivotKey)
    {
        $model = new $related;
        $table = $model->getTable();
        $throughModel = new $through;
        $pivot = $throughModel->getTable();

        return $model
            ->join($pivot, $pivot . '.' . $pivotKey, '=', $table . '.' . $secondKey)
            ->select($table . '.*')
            ->where($pivot . '.' . $firstKey, '=', $this->id);
    }
}