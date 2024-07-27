<?php

namespace App\Modules\_BaseRepository;

use Illuminate\Database\Eloquent\Model;
use stdClass;

abstract class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(
        protected Model $model
    ){}

    public function all(): array
    {
        return $this->model->all()->toArray();
    }

    public function findById(int $id): stdClass|null
    {
        if(!$response = $this->model->find($id)) {
            return null;
        }
        return (object) $response->toArray();
    }

    public function create(array $data): stdClass
    {
        $response = $this->model->create($data);
        return (object) $response->toArray();
    }

    public function update(int $id, array $data): stdClass|null
    {
        if(!$response = $this->model->find($id)) {
            return null;
        }
        $response->update($data);
        return (object) $response->toArray();
    }

    public function delete(int $id): bool
    {
        if(!$response = $this->model->find($id)) {
            return false;
        }
        return $response->destroy($id);
    }
}