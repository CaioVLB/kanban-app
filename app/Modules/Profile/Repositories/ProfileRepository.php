<?php 

namespace App\Modules\Profile\Repositories;

use App\Modules\_BaseRepository\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProfileRepository extends BaseRepository implements ProfileRepositoryInterface
{
    public function __construct(protected Model $model)
    {
        parent::__construct($model);
    }
}