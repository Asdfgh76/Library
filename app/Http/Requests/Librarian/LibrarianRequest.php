<?php

namespace App\Http\Requests\Librarian;

use App\Rules\CategoryParent;
use Illuminate\Foundation\Http\FormRequest;

abstract class LibrarianRequest extends FormRequest {

    /**
     * @var array
     */
    protected $entity = [];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        switch ($this->method()) {
            case 'POST':
                return $this->createItem();
            case 'PUT':
            case 'PATCH':
                $rules = $this->updateItem();
                return $rules;
        }
    }

    /**
     * Задает дефолтные правила для проверки данных при добавлении
     * категории, бренда или товара
     */
    protected function createItem() {

        return [
            $this->entity['name'] => [
                'required','string','unique:'.$this->entity['table'].','.$this->entity['name']
            ],
        ];
    }

    /**
     * Задает дефолтные правила для проверки данных при обновлении
     * категории, бренда или товара
     */
    protected function updateItem() {
        // получаем объект модели из маршрута: admin/entity/{entity}
        $model = $this->route($this->entity['name']);
        return [
            $this->entity['name'] => [
                'required','string',
            ],
        ];
    }

    public function messages()
    {
        return[
            'required' => 'Обязательное для заполнения',
            $this->entity['name'].'.unique' => 'Такое название уже существует',
        ];
    }
}
