<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientUpdateRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'name' => ['required', 'string', 'max:255'],
      'cpf' => ['required', 'string', 'min:11', 'max:14'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(Client::class)->ignore($this->route('client_id'))],
      'birthdate' => ['nullable', 'date', 'before_or_equal:today'],
      'gender' => ['nullable', Rule::in(['Masculino', 'Feminino', 'Outro', 'Não informado'])],
      'nationality' => ['nullable', 'string', 'max:20'],
      'marital_status' => ['nullable', Rule::in(['Solteiro', 'Casado', 'União estável', 'Divorciado', 'Viúvo'])],
      'occupation' => ['nullable', 'string', 'max:255'],
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'O preenchimento do campo nome é obrigatório.',
      'name.max' => 'O campo nome suporta no máximo 255 caracteres.',
      'email.required' => 'O preenchimento do campo e-mail é obrigatório.',
      'email.max' => 'O campo e-mail suporta no máximo 255 caracteres.',
      'cpf.required' => 'O preenchimento do campo CPF é obrigatório.',
      'cpf.max' => 'O campo CPF suporta no máximo 14 caracteres.',
      'cpf.min' => 'O campo CPF precisa ter no mínimo 11 caracteres.',
      'nationality.max' => 'O campo nacionalidade suporta no máximo 20 caracteres.',
      'occupation.max' => 'O campo profissão suporta no máximo 255 caracteres.',
    ];
  }

}
