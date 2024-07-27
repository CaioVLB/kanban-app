<?php

namespace App\Modules\_BaseRepository;

use stdClass;

interface BaseRepositoryInterface {
    public function all(): array;
    public function findById(int $id): stdClass|null;
    public function create(array $data): stdClass;
    public function update(int $id, array $data): stdClass|null;
    public function delete(int $id): bool;
}