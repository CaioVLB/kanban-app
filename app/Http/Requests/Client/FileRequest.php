<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class FileRequest extends FormRequest
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
      'content' => ['required', 'string', 'max:255'],
      'file_input' => [
        'required',
        //File::image()->types(['jpeg', 'jpg', 'png'])->max(8000)
        File::types(['jpeg', 'jpg', 'png', 'pdf'])->max(8000)
      ],
    ];
  }

  public function messages(): array
  {
    return [
      'content.required' => 'O preenchimento do campo descrição é obrigatório.',
      'content.max' => 'O campo descrição suporta no máximo 255 caracteres.',
      'file_input.required' => 'O campo arquivo é obrigatório.',
      'file_input.mimes' => 'Somente é aceito arquivo com as extensões :values.',
      'file_input.max' => 'O arquivo deve ter no máximo 8 MB.',
    ];
  }
}
