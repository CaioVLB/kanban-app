<?php

namespace App\Http\Requests\Collaborator;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CollaboratorUpdateRequest extends FormRequest
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
      'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class, 'email')->ignore($this->route('user_id'))],
      'birthdate' => ['nullable', 'date', 'before_or_equal:today', 'after:1900-01-01'],
      'gender' => ['nullable', Rule::in(['Masculino', 'Feminino', 'Outro', 'Não informado'])],
      'nationality' => ['nullable', 'string', 'max:100'],
      'marital_status' => ['nullable', Rule::in(['Solteiro', 'Casado', 'União estável', 'Divorciado', 'Viúvo'])],
      'hire_date' => ['nullable', 'date', 'before_or_equal:today', 'after:1900-01-01'],
      'paper_id' => ['required', 'int'],
      'main_phone_number' => ['required', 'int', 'exists:collaborator_phones,id'],
      'main_address' => ['nullable', 'int', 'exists:collaborator_addresses,id'],
    ];

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
      'birthdate.before_or_equal' => 'A data de nascimento deve ser anterior ou igual à data atual.',
      'birthdate.after' => 'A data de nascimento deve ser posterior a 01/01/1900.',
      'hire_date.before_or_equal' => 'A data de contratação deve ser anterior ou igual à data atual.',
      'hire_date.after' => 'A data de contratação deve ser posterior a 01/01/1900.',
      'paper_id.required' => 'Selecione um cargo válido para o colaborador.',
    ];
  }

}
