<?php

namespace App\Services;

use App\Enums\ProfileEnum;
use App\Models\Collaborator;
use App\Models\CollaboratorFile;
use App\Models\CollaboratorPhone;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CollaboratorService {

  public function __construct(
    protected User $user,
    protected Collaborator $collaborator,
    protected CollaboratorFile $cf,
    protected CollaboratorPhone $cp,
  )
  {}

  public function storeCollaborator(array $data): Collaborator
  {
    return DB::transaction(function () use ($data) {
      $user = $this->user->create([
        'name' => $data['name'],
        'cpf' => $data['cpf'],
        'email' => $data['email'],
        'password' => Hash::make('password'),
        'company_id' => $data['company_id'],
        'profile_id' => ProfileEnum::COLLABORATOR,
        'is_active' => true
      ]);

      $collaborator = $user->collaborators()->create([
        'paper_id' => $data['paper_id']
      ]);

      $collaborator->phones()->create([
        'main' => true,
        'identifier' => $user->name,
        'phone_number' => $data['phone_number'],
      ]);

      return $collaborator;
    });
  }

  public function updateCollaborator(Collaborator $collaborator, array $data): void
  {
    $userData = Arr::only($data, ['name', 'cpf', 'email']);
    $collaboratorData = Arr::only($data, [
      'birthdate',
      'gender',
      'nationality',
      'marital_status',
      'hire_date',
      'paper_id',
    ]);
    $mainPhoneNumber = $data['main_phone_number'];
    $mainAddress = $data['main_address'] ?? null;

    DB::transaction(function () use ($collaborator, $userData, $collaboratorData, $mainPhoneNumber, $mainAddress) {
      $collaborator->fill($collaboratorData);
      $user = $collaborator->user->fill($userData);

      if($user->isDirty()) {
        $user->save();
      }

      if ($collaborator->isDirty()) {
        $collaborator->save();
      }

      $collaborator->updateMainPhone($mainPhoneNumber);

      if (!empty($mainAddress)) {
        $collaborator->updateMainAddress($mainAddress);
      }
    });
  }

  public function resetPassword(User $user, array $data)
  {
    if (Hash::check($data['password'], $user->password)) {
      throw ValidationException::withMessages(['error' => 'A nova senha não pode ser igual à senha antiga.']);
    }

    $user->update([
      'password' => Hash::make($data['password'])
    ]);
  }

  public function storePhone(array $data, int $collaborator_id): void
  {
    $this->cp->create([
      'collaborator_id' => $collaborator_id,
      'main' => false,
      'identifier' => $data['identifier'],
      'phone_number' => $data['phone_number'],
    ]);
  }

  public function storeFile(array $data, int $collaborator_id): void
  {
    $collaborator = $this->collaborator->with(['user:id,email', 'company:id,name'])->select('id', 'user_id', 'company_id')->findOrFail($collaborator_id);

    $file = $data['file_input'];
    $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
    $extension = $file->getClientOriginalExtension();
    $hashedname = hash('sha256', $filename . now()) . '.' . $extension;
    $companyName = strtolower(preg_replace('/[^A-Za-z0-9_-]/', '_', $collaborator->company->name));
    $email = strtolower($collaborator->user->email);

    $path = $file->storeAs("{$companyName}/collaborator/{$email}", $hashedname, 'private');

    $this->cf->create([
      'collaborator_id' => $collaborator->id,
      'by_user_id' => auth()->id(),
      'content' => $data['content'],
      'original_name' => "{$filename}.{$extension}",
      'hashed_name' => $hashedname,
      'path' => $path,
      'type' => $file->getClientMimeType(),
      'size' => $file->getSize()
    ]);
  }
}
