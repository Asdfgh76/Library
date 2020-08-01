<?php

namespace App\Repositories;

abstract class CoreRepository
{

    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

    protected function startConditions()
    {
        return clone $this->model;
    }

    public function getId($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getDelete($id)
    {
        $this->startConditions()->where('id', '=', $id)->delete();
    }
}
