<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class Service
{
    /**
     * The model instance
     */
    protected Model $model;

    /**
     * BaseService constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Create a new record
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Update an existing record
     */
    public function update(int $id, array $data): ?Model
    {
        $record = $this->find($id);
        if (!$record) return null;

        $record->update($data);
        return $record;
    }

    /**
     * Delete a record
     */
    public function delete(int $id): bool
    {
        $record = $this->find($id);
        if (!$record) return false;

        return $record->delete();
    }

    /**
     * Find a record by ID
     */
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * Get all records (can override in child)
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Query builder for custom queries
     */
    public function query()
    {
        return $this->model->newQuery();
    }
}
