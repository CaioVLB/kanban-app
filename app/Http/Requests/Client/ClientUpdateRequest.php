<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
use Carbon\Carbon;
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
    $rules = [
      'name' => ['required', 'string', 'max:255'],
      'cpf' => ['required', 'string', 'min:11', 'max:14'],
      'email' => ['required', 'string', 'email', 'max:255', Rule::unique(Client::class)->ignore($this->route('client_id'))],
      'birthdate' => ['nullable', 'date', 'before_or_equal:today', 'after:1900-01-01'],
      'gender' => ['nullable', Rule::in(['Masculino', 'Feminino', 'Outro', 'Não informado'])],
      'nationality' => ['nullable', 'string', 'max:100'],
      'marital_status' => ['nullable', Rule::in(['Solteiro', 'Casado', 'União estável', 'Divorciado', 'Viúvo'])],
      'occupation' => ['nullable', 'string', 'max:255'],
      'main_phone_number' => ['required', 'int', 'exists:client_phones,id'],
      'main_address' => ['nullable', 'int', 'exists:client_addresses,id'],
    ];

    if ($this->filled('birthdate')) {
      $birthdate = Carbon::parse($this->input('birthdate'));
      $age = $birthdate->age;

      if ($age < 18) {
        $rules['legal_responsible'] = ['required', 'string', 'max:255'];
        $rules['cpf_legal_responsible'] = ['required', 'string', 'min:11', 'max:14'];
      }
    }

    return $rules;
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
      'nationality.max' => 'O campo nacionalidade suporta no máximo 100 caracteres.',
      'occupation.max' => 'O campo profissão suporta no máximo 255 caracteres.',
      'main_phone_number.required' => 'O preenchimento do campo telefone é obrigatório.',
      'main_address.required' => 'O preenchimento do campo endereço é obrigatório.',
      'legal_responsible.required' => 'O preenchimento do campo responsável legal é obrigatório para menores de idade.',
      'cpf_legal_responsible.required' => 'O preenchimento do CPF do responsável legal é obrigatório para menores de idade.',
      'birthdate.before_or_equal' => 'A data de nascimento deve ser anterior ou igual à data atual.',
      'birthdate.after' => 'A data de nascimento deve ser posterior a 01/01/1900.',
    ];
  }

}
