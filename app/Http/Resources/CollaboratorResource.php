<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CollaboratorResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'id' => $this->id,
      'name' => $this->user->name,
      'cpf' => $this->user->cpf,
      'email' => $this->user->email,
      'active' => $this->active,
      'paper_id' => $this->paper_id,
      'paper' => $this->paper->paper ?? '---',
      'phone_number' => $this->phones->isNotEmpty()
        ? $this->phones->first()->phone_number
        : '---',
    ];
  }
}
