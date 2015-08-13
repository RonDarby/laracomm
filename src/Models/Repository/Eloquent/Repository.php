<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2015-05-23
 * Time: 12:44 PM
 */

namespace Rondarby\Laracomm\Models\Repository\Eloquent;


use \Cartalyst\Support\Traits\RepositoryTrait;
use Closure;

class Repository
{
    use RepositoryTrait;

    public function create(array $credentials, Closure $callback = null)
    {
        $model = $this->createModel();

        $model->fill($credentials);

        if ($callback) {
            $result = $callback($model);

            if ($result === false) {
                return false;
            }
        }

        $model->save();

        return $model;

    }

    public function findById( $id )
    {
        return $this
            ->createModel()
            ->newQuery()
            ->find($id);
    }

    public function findByCredentials(array $credentials)
    {
        return $this
            ->createModel()
            ->newQuery()
            ->where( $credentials );
    }

    public function all()
    {
        return $this
            ->createModel()
            ->all();
    }

    public function update( $id, array $detail )
    {
        // TODO: Implement update() method.
    }

    public function delete( $id )
    {
        // TODO: Implement delete() method.
    }
}