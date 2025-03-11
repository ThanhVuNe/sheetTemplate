<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = []);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, $attributes = []);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * firstWhere
     *
     * @param array $condition
     * @param array $columns
     * @return mixed
     */
    public function firstWhere($condition = [], $columns = ['*']);

    /**
     * firstWhere
     *
     * @param string $field
     * @param array $data
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findWhereIn($field, array $data, $columns = ['*']);

    /**
     * Get first data.
     *
     * @param array  $where       [array where]
     * @param string $columnOrder [default is created_at]
     * @param string $orderType   [default is ASC]
     *
     * @return object
     */
    public function first($where = [], $columnOrder = 'created_at', $orderType = 'ASC');

    /**
     * Create or update a record matching the attributes, and fill it with values.
     *
     * @param array $attributes [attributes]
     * @param array $values     [values]
     *
     *  @return \Illuminate\Database\Eloquent\Model|static
     */
    public function updateOrCreate(array $attributes, array $values = []);

    /**
     * Create or update with Trashed a record matching the attributes, and fill it with values.
     *
     * @param array $attributes [attributes]
     * @param array $values     [values]
     *
     *  @return \Illuminate\Database\Eloquent\Model|static
     */
    public function updateOrCreateWithTrashed(array $attributes, array $values = []);

    /**
     * Update values by conditions.
     *
     * @param array $conditions
     * @param array $values [values]
     *
     * @return int
     */
    public function updateByConditions(array $conditions, array $values = []): int;

    /**
     * Find with trashed
     *
     * @param string $id
     *
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function findWithTrashed($id);

    /**
     * Delete by conditions
     *
     * @param $conditions
     * @return mixed
     */
    public function deleteByConditions(array $conditions);


     /**
     * firstWhere withTrash
     *
     * @param array $condition
     * @param array $columns
     * @return mixed
     */
    public function firstWhereWithTrashed($condition = [], $columns = ['*']);

    /**
     * Find by condition
     * @param array $conditions
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findWhere($conditions = [], $columns = ['*']);

    /**
     * Bulk delete by ids
     * @param array $ids
     * @return int
     */
    public function deleteByIds($ids);

    /**
     * Upsert by conditions
     * @param array $data
     * @param array $conditions
     * @param array $columns
     * @return int
     */
    public function upsert($data, $conditions, $columns);

    /*
     * first or create a record matching the attributes, and fill it with values.
     *
     * @param array $attributes [attributes]
     * @param array $values     [values]
     *
     *  @return \Illuminate\Database\Eloquent\Model|static
     */
    public function firstOrCreate(array $attributes, array $values = []);
}
