<?php

namespace App\Repositories;

class ModelRepository
{
    protected $model;

    public function __construct($modelClass)
    {
        $this->model = app($modelClass);
    }

    public function getAll($perPage = 10)
    {
        return $this->model->paginate($perPage);
    }


    public function query()
    {
        return $this->model->query();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $model = $this->find($id);
        if ($model) {
            $model->update($data);
            return $model;
        }
        return null;
    }

    public function delete($id)
    {
        $model = $this->find($id);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function search($column, $value)
    {
        return $this->model->where($column, $value)->get();
    }

    public function filter(array $filterArgs)
    {
        $query = $this->model;

        foreach ($filterArgs as $column => $value) {
            $query->where($column, $value);
        }

        return $query;
    }
}