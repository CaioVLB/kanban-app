<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
      'description' => ['required', 'string', 'max:255'],
      'zipcode' => ['required', 'string', 'min:8', 'max:9'],
      'street' => ['required', 'string', 'max:100'],
      'number' => ['nullable', 'string', 'max:10'],
      'neighborhood' => ['required', 'string', 'max:100'],
      'city' => ['required'],
      'state' => ['required'],
    ];
  }

  public function messages(): array
  {
    return [
      'description.required' => 'O preenchimento do campo descrição é obrigatório.',
      'description.max' => 'O campo descrição suporta no máximo 255 caracteres.',
      'zipcode.required' => 'O preenchimento do campo CEP é obrigatório.',
      'zipcode.max' => 'O campo CEP suporta no máximo 9 caracteres.',
      'zipcode.min' => 'O campo CEP precisa ter no mínimo 8 caracteres.',
      'street.required' => 'O preenchimento do campo logradouro é obrigatório.',
      'street.max' => 'O campo logradouro suporta no máximo 100 caracteres.',
      'number.max' => 'O campo CEP suporta no máximo 10 caracteres.',
      'neighborhood.required' => 'O preenchimento do campo bairro é obrigatório.',
      'neighborhood.max' => 'O campo bairro suporta no máximo 100 caracteres.',
      'city.required' => 'Selecione corretamente uma cidade.',
      'state.required' => 'Selecione corretamente um estado.',
    ];
  }
}
