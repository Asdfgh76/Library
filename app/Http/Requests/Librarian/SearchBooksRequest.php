<?php

namespace App\Http\Requests\Librarian;

use Illuminate\Foundation\Http\FormRequest;

class SearchBooksRequest extends FormRequest
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
            'val' => 'required|string|unique:books,title',
            'line' => 'required|string|unique:books,title',
            'search' => 'required|string|unique:books,title',
        ];
    }

    public function messages()
    {
        return[

        ];
    }
}
