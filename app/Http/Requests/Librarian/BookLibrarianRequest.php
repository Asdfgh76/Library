<?php

namespace App\Http\Requests\Librarian;

class BookLibrarianRequest extends LibrarianRequest {

    /**
     * С какой сущностью сейчас работаем (бренд каталога)
     * @var array
     */
    protected $entity = [
        'name' => 'title',
        'table' => 'books'
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return parent::authorize();
    }

    public function rules() {
        return parent::rules();
    }

    /**
     * Объединяет дефолтные правила и правила, специфичные для бренда
     * для проверки данных при добавлении нового бренда
     */
    protected function createItem() {

        $rules = [
            'genre_id' => [
                'required',
                'integer',
                'min:1'
            ],
            'publishing_id' => [
                'required',
                'integer',
                'min:1'
            ],
            'author_id' => [
                'required',
                'integer',
                'min:1'
            ],
            'image' => [
                'mimes:jpeg,jpg,png',
                'max:5000'
            ],
            'description' => [
                'string',
                'max:409'
            ]

        ];
        return array_merge(parent::createItem(), $rules);
    }

    /**
     * Объединяет дефолтные правила и правила, специфичные для бренда
     * для проверки данных при обновлении существующего бренда
     */
    protected function updateItem() {
        $rules = [
            'genre_id' => [
                'required',
                'integer',
                'min:1'
            ],
            'publishing_id' => [
                'required',
                'integer',
                'min:1'
            ],
            'author_id' => [
                'required',
                'integer',
                'min:1'
            ],
            'image' => [
                'mimes:jpeg,jpg,png',
                'max:5000'
            ],
            'description' => [
                'string'
            ]
        ];
        return array_merge(parent::updateItem(), $rules);
    }

    public function messages()
    {
        return[
            'required' => 'Обязательное для заполнения',
            'title.unique' => 'Такое название уже существует',
            'image.max' => 'Слишком большой файл',
            'image.mimes' => 'Проверьте формат файла'
        ];
    }
}
