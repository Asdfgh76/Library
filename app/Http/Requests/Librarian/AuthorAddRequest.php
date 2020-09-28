<?php

namespace App\Http\Requests\Librarian;

use Illuminate\Foundation\Http\FormRequest;

class AuthorAddRequest extends FormRequest
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
            'name' => 'required|string|unique:author,name',
        ];
    }

    public function messages()
    {
        return[
            'required' => 'Обязательное для заполнения',
            'name.unique' => 'Такой автор уже существует',
        ];
    }
}
