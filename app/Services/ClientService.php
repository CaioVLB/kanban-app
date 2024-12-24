<?php

namespace App\Services;

use App\Models\Client;
use App\Models\ClientFile;
use App\Models\ClientPhone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientService {

  public function __construct(
    protected Client $client,
    protected ClientFile $cf,
    protected ClientPhone $cp,
  )
  {}

  public function storeClient(array $data): Client
  {
    return DB::transaction(function () use ($data) {
      $client = $this->client->create([
        'name' => $data['name'],
        'cpf' => $data['cpf'],
        'email' => $data['email']
      ]);

      $client->phones()->create([
        'main' => true,
        'identifier' => $client->name,
        'phone_number' => $data['phone_number'],
      ]);

      return $client;
    });
  }

  public function updateClient(Client $client, array $data): void
  {
    DB::transaction(function () use ($client, $data) {
      // Atualiza os dados básicos
      $client->fill($data);

      if ($client->isDirty()) {
        $client->save();
      }

      // Atualiza o telefone principal
      $client->updateMainPhone($data['main_phone_number']);

      // Atualiza o endereço principal (se fornecido)
      if (!empty($data['main_address'])) {
        $client->updateMainAddress($data['main_address']);
      }
    });
  }

  public function storeFile(array $data, int $client_id): void
  {
    $client = $this->client->with(['company:id,name'])->select('id', 'email', 'company_id')->findOrFail($client_id);

    $file = $data['file_input'];
    $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
    $extension = $file->getClientOriginalExtension();
    $hashedname = hash('sha256', $filename . now()) . '.' . $extension;
    $companyName = strtolower(preg_replace('/[^A-Za-z0-9_-]/', '_', $client->company->name));
    $email = strtolower($client->email);

    $path = $file->storeAs("{$companyName}/{$email}", $hashedname, 'private');

    $this->cf->create([
      'client_id' => $client->id,
      'by_user_id' => auth()->id(),
      'content' => $data['content'],
      'original_name' => "{$filename}.{$extension}",
      'hashed_name' => $hashedname,
      'path' => $path,
      'type' => $file->getClientMimeType(),
      'size' => $file->getSize()
    ]);
  }

  public function storePhone(array $data, int $client_id): void
  {dd($data, $client_id);
    $this->cp->create([
      'client_id' => $client_id,
      'main' => false,
      'identifier' => $data['identifier'],
      'phone_number' => $data['phone_number'],
    ]);
  }
}
