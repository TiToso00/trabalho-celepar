<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoltRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'proprietario_id' => 'required|integer',
            'status' => 'nullable|boolean',
            'anexos' => 'max:2',
            'anexos.*' => 'nullable|file'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'proprietario_id' => 'Proprietário'
        ];
    }

    public function messages()
    {
        return [
            'anexos.max' => 'O campo Anexos não pode ter mais que :max arquivos.'
        ];
    }
}
