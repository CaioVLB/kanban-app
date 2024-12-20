<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientService {

  public function storeClient(array $data): Client
  {
    return DB::transaction(function () use ($data) {
      $client = Client::create([
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
}
