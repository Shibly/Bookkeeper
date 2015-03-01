<?php

namespace Keeper\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class AbstractRepository
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    /**
     * Get a new instance of the model
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getNew(array $attributes = array())
    {
        return $this->model->newInstance($attributes);
    }

}