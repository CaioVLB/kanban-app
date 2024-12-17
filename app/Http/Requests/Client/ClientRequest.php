<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
        'cpf' => ['required', 'string', 'max:14'],
        'phone_number' => ['required', 'string', 'min:11', 'max:15'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(Client::class)->ignore($this->route('id'))],
      ];
    }
}
