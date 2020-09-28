<?php

namespace App\Http\Requests\Librarian;

use Illuminate\Foundation\Http\FormRequest;

class GenreAddRequest extends FormRequest
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
            'title' => 'required|string|unique:genre,title',
        ];
    }

    public function messages()
    {
        return[
            'required' => 'Обязательное для заполнения',
            'title.unique' => 'Такой жанр уже существует',
        ];
    }
}
