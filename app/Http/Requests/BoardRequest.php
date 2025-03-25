<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoardRequest extends FormRequest
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
      'title' => 'required|string|max:255',
      'description' => 'required|string|max:500',
    ];
  }

  public function messages(): array
  {
    return [
      'title.required' => 'O preenchimento do campo título do quadro é obrigatório',
      'title.max' => 'O campo título do quadro pode ter no máximo 255 caracteres',
      'description.required' => 'O preenchimento do campo descrição é obrigatório',
      'description.max' => 'O campo descrição pode ter no máximo 500 caracteres',
    ];
  }
}
