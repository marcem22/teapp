<?php

namespace App\Http\Requests;

use App\Traits\ToastTrigger;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreActivityRequest extends FormRequest
{
    use ToastTrigger;
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.max' => 'El nombre no debe exceder los 255 caracteres',
            'description.required' => 'La descripción es requerida',
            'description.string' => 'La descripción debe ser una cadena de texto',
            'image.required' => 'La imagen es requerida',
            'image.image' => 'La imagen debe ser un archivo de imagen',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif, svg',
            'image.max' => 'La imagen no debe exceder los 2048 kilobytes',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $this->errorToast($validator->errors()->first());
        parent::failedValidation($validator);
    }
}
