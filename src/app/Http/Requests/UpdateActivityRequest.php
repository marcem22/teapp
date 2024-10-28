<?php
namespace App\Http\Requests;

use App\Traits\ToastTrigger;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UpdateActivityRequest extends FormRequest
{
    use ToastTrigger;
    public function authorize()
    {
        return true;
    }

    public function rules(): array
{
    return [
        'name' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string'],
        'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
    ];
}
protected function failedValidation(Validator $validator)
    {
        $this->errorToast($validator->errors()->first());
        parent::failedValidation($validator);
    }
}
