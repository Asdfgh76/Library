<?php

namespace App\Http\Requests\Librarian;

use Illuminate\Foundation\Http\FormRequest;

class BookAddRequest extends FormRequest
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
            'title' => 'required|string|unique:books,title',
            'genre_id' => 'required|integer|',
            'publishing_id' => 'required|integer|',
            'author_id' => 'required|integer|',
        ];
    }

    public function messages()
    {
        return[
            'required' => 'Обязательное для заполнения',
            'title.unique' => 'Такое название уже существует',
        ];
    }
}
