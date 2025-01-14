<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
      'service' => ['required', 'string', 'max:255'],
      'price' => ['required',
        'regex:/^R\$?\s?(\d{1,3}(\.\d{3}){0,2}|0),\d{2}$/'
      ],
    ];
  }

  public function messages(): array
  {
    return [
      'service.required' => 'Preencha o campo serviço corretamente.',
      'service.max' => 'O nome do serviço excedeu o limite de 255 caracteres.',
      'price.required' => 'Preencha o campo preço corretamente.',
      'price.regex' => 'O preço inserido é inválido.',
      //'price.regex' => 'O preço não pode exceder R$ 999 milhões (até R$ 999.999.999,99).',
    ];
  }
}
