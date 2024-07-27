<?php

namespace App\Modules\Profile\Services;

use App\Modules\Profile\Requests\ProfileUpdateRequest;
use App\Modules\Profile\Repositories\ProfileRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use stdClass;

class ProfileService
{
    public function __construct(
        protected ProfileRepositoryInterface $profileRepository
    ){}
    
    public function update(ProfileUpdateRequest $data): stdClass|null
    {
        if ($data->user()->isDirty('email')) {
            $data->user()->email_verified_at = null;
        }
        $data->user()->cpf = preg_replace('/[^0-9]/', '', $data->user()->cpf);

        return $this->profileRepository->update($data->user()->id, $data->toArray());
    }

    public function delete(int $id): bool
    {
        Auth::logout();
        
        $success = $this->profileRepository->delete($id);
        if(!$success) {
            return false;
        }
        return true;
    }
    // public function getAll(): array
    // {
    //     return $this->profileRepository->all();
    // }

    // public function getProfileById(int $id)
    // {
    //     return $this->profileRepository->findById($id);
    // }
}