<?php

namespace App\Http\Requests\Librarian;

class GenreLibrarianRequest extends LibrarianRequest {

    /**
     * С какой сущностью сейчас работаем (бренд каталога)
     * @var array
     */
    protected $entity = [
        'name' => 'title',
        'table' => 'genre'
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
        $rules = [];
        return array_merge(parent::createItem(), $rules);
    }

    /**
     * Объединяет дефолтные правила и правила, специфичные для бренда
     * для проверки данных при обновлении существующего бренда
     */
    protected function updateItem() {
        $rules = [];
        return array_merge(parent::updateItem(), $rules);
    }
}
