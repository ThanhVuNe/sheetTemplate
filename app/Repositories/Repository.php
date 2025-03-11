<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;

abstract class Repository implements RepositoryInterface
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get all
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    /**
     * firstWhere
     *
     * @param array $condition
     * @param array $columns
     * @return mixed
     */
    public function firstWhere($condition = [], $columns = ['*'])
    {
        return $this->model->select($columns)->firstWhere($condition);
    }

    /**
     * firstWhere
     *
     * @param string $field
     * @param array $data
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findWhereIn($field, array $data, $columns = ['*'])
    {
        return $this->model->whereIn($field, $data)->get($columns);
    }

    /**
     * Get first data.
     *
     * @param array  $where       [array where]
     * @param string $columnOrder [default is created_at]
     * @param string $orderType   [default is ASC]
     *
     * @return object
     */
    public function first($where = [], $columnOrder = 'created_at', $orderType = 'ASC')
    {
        return $this->model->where($where)->orderBy($columnOrder, $orderType)->first();
    }

    /**
     * Create or update a record matching the attributes, and fill it with values.
     *
     * @param array $attributes [attributes]
     * @param array $values     [values]
     *
     *  @return \Illuminate\Database\Eloquent\Model|static
     */
    public function updateOrCreate(array $attributes, array $values = [])
    {
        return $this->model->updateOrCreate($attributes, $values);
    }

    /**
     * Create or update with Trashed a record matching the attributes, and fill it with values.
     *
     * @param array $attributes [attributes]
     * @param array $values     [values]
     *
     *  @return \Illuminate\Database\Eloquent\Model|static
     */
    public function updateOrCreateWithTrashed(array $attributes, array $values = [])
    {
        /* @phpstan-ignore-next-line */
        return $this->model->withTrashed()->updateOrCreate($attributes, $values);
    }

    /**
     * Update values by conditions.
     *
     * @param array $conditions
     * @param array $values [values]
     *
     * @return int
     */
    public function updateByConditions(array $conditions, array $values = []): int
    {
        return $this->model->newQuery()->where($conditions)->update($values);
    }

    /**
     * Find with trashed
     *
     * @param string $id
     *
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function findWithTrashed($id)
    {
        return $this->model->withTrashed()->find($id); /** @phpstan-ignore-line */
    }

    /**
     * Delete by conditions
     *
     * @param $conditions
     * @return mixed
     */
    public function deleteByConditions(array $conditions)
    {
        return $this->model->newQuery()->where($conditions)->delete();
    }

    /**
     * firstWhere withTrash
     *
     * @param array $condition
     * @param array $columns
     * @return mixed
     */
    public function firstWhereWithTrashed($condition = [], $columns = ['*'])
    {
        return $this->model->withTrashed()->select($columns)->firstWhere($condition); /** @phpstan-ignore-line */
    }

    /**
     * Find by condition
     * @param array $conditions
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findWhere($conditions = [], $columns = ['*'])
    {
        return $this->model->select($columns)->where($conditions)->get();
    }

    /**
     * Bulk delete by ids
     * @param array $ids
     * @return int
     */
    public function deleteByIds($ids)
    {
        return $this->model->whereIn('id', $ids)->delete();
    }

    /**
     * Upsert by conditions
     * @param array $data
     * @param array $conditions
     * @param array $columns
     * @return int
     */
    public function upsert($data, $conditions, $columns)
    {
        return $this->model->upsert($data, $conditions, $columns);
    }
    /*
     * first or create a record matching the attributes, and fill it with values.
     *
     * @param array $attributes [attributes]
     * @param array $values     [values]
     *
     *  @return \Illuminate\Database\Eloquent\Model|static
     */
    public function firstOrCreate(array $attributes, array $values = [])
    {
        return $this->model->firstOrCreate($attributes, $values);
    }
}
