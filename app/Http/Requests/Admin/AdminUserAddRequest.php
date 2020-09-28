<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserAddRequest extends FormRequest
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
        //dd($_POST);
        //$id = $_POST['id'];

        return [
            'login' => 'required|min:3|max:20|string|unique:users,login',
            'email' => [
            'required',
            'string',
            'email',
            'max:255',
            'unique:users,email',
            ],
            'password' => 'string|min:8|max:20',
        ];
    }

    public function messages()
    {
        return[
            'login.min' => 'Минимальная длина логина 3 символа',
            'login.max' => 'Максимальная длина логина 20 символа',
            'login.unique' => 'Логин занят',
            'email.unique' => 'Такой email уже занят',
        ];
    }
}
