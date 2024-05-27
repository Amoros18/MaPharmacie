<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicamentRequest extends FormRequest
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
            'nom'=>'required|string',
            'principe_actif'=>'nullable|string',
            'id_categorie'=>'nullable|string',
            'code_cip'=>'nullable|string',
            'description'=>'nullable|string',
        ];
    }
}
