<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationsRequest extends FormRequest
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
    if ($this->isMethod('post')) {
      return $this->creationRules();
    }

    if ($this->isMethod('put') || $this->isMethod('patch')) {
      return $this->updateRules();
    }

    return [];
  }

  protected function creationRules(): array
  {
    return [
      'evaluation_name' => 'required|string|max:255',
    ];
  }

  protected function updateRules(): array
  {
    return [
      'collaborator_id' => 'required|integer|exists:collaborators,id',
      'date' => 'required|date|after:1900-01-01',
      'weight' => 'nullable|numeric|min:0|max:999.99',
      'height' => 'nullable|numeric|min:0|max:3.00',
      'physical_activity' => 'nullable|boolean',
      'diagnosis' => 'nullable|string',
      'main_complaint' => 'nullable|string',
      'history_current_disease' => 'nullable|string',
      'history_previous_disease' => 'nullable|string',
      'associated_diseases' => 'nullable|string',
      'details_physical_activity' => 'nullable|string',
      'habits_vices' => 'nullable|string',
      'medications' => 'nullable|string',
      'additional_observations' => 'nullable|string',
      'blood_pressure' => 'nullable|string|max:255',
      'heart_rate' => 'nullable|string|max:255',
      'respiratory_rate' => 'nullable|string|max:255',
      'physical_assessment' => 'nullable|string',
      'inspection_assessment' => 'nullable|string',
      'muscle_trophism_characteristic' => 'nullable|string',
      'muscle_tone_characteristic' => 'nullable|string',
      'pain_intensity' => 'nullable|string|max:100',
      'details_affected_local' => 'nullable|string',
      'family_historic' => 'nullable|string',
      'complementary_exams' => 'nullable|string',
      'hospitalization' => 'nullable|string',
    ];
  }

  public function messages(): array
  {
    return [
      'evaluation_name.required' => 'O nome da ficha é obrigatório.',
      'collaborator_id.required' => 'Selecione um profissional responsável pela avaliação válido.',
      'date.required' => 'É obrigatório fornecer a data da avaliação.',

      'evaluation_name.string' => 'O nome da ficha deve ser um texto válido.',
      'evaluation_name.max' => 'O nome da ficha não pode ter mais que 255 caracteres.',
      'collaborator_id.exists' => 'O colaborador informado não existe.',
      'date.date' => 'A data deve ser uma data válida.',

      'weight.numeric' => 'O peso deve ser um valor numérico.',
      'weight.min' => 'O peso não pode ser negativo.',
      'weight.max' => 'O peso não pode ser maior que 999.99 kilos.',
      'height.numeric' => 'A altura deve ser um valor numérico.',
      'height.min' => 'A altura não pode ser negativa.',
      'height.max' => 'A altura não pode ser maior que 3 metros.',
      'blood_pressure.max' => 'O campo Pressão Arterial deve conter no máximo 255 caracteres.',
      'heart_rate.max' => 'O campo Frequência Cardíaca deve conter no máximo 255 caracteres.',
      'respiratory_rate.max' => 'O campo Frequência Respiratória deve conter no máximo 255 caracteres.',

      'physical_activity.boolean' => 'A atividade física deve ser selecionada como sim ou não.',
    ];
  }

}
