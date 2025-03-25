<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneRequest extends FormRequest
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
      'identifier' => ['required', 'string', 'max:255'],
      'phone_number' => ['required', 'string', 'min:11', 'max:15'],
    ];
  }

  public function messages(): array
  {
    return [
      'identifier.required' => 'O preenchimento do campo titular do número é obrigatório.',
      'identifier.max' => 'O campo titular do número suporta no máximo 255 caracteres.',
      'phone_number.required' => 'O preenchimento do campo número de telefone é obrigatório.',
    ];
  }
}
