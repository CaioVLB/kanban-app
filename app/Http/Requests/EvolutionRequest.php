<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvolutionRequest extends FormRequest
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
          'evolution_date' => 'required|date|before_or_equal:today|after:1900-01-01',
          'observations' => 'required|string',
          'next_steps' => 'nullable|string',
      ];
  }

  public function messages(): array
  {
    return [
      'observations.required' => "O preenchimento do campo 'Descrição do Caso' é obrigatório.",
      'evolution_date.required' => 'Selecione a data da evolução.',

      'observations.string' => "O campo 'Descrição do Caso' precisa ser preenchido com um texto válido.",
      'next_steps.string' => "O campo 'Próximas Etapas' precisa ser preenchido com um texto válido.",

      'evolution_date.before_or_equal' => 'A data da evolução deve ser anterior ou igual à data atual.',
      'evolution_date.after' => 'A data da evolução deve ser posterior a 01/01/1900.',
    ];
  }
}
