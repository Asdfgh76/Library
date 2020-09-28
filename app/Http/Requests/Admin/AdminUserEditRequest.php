<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUserEditRequest extends FormRequest
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
            'password' => 'nullable|string|min:8|max:20',
        ];
    }

    public function messages()
    {
        return[
            'password.min' => 'Минимальная длина пароля 3 символа',
            'password.max' => 'Максимальная длина пароля 20 символа',
        ];
    }
}
