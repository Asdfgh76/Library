<?php

namespace App\Repositories\Admin;

use App\Repositories\CoreRepository;

use App\Models\Admin\User as Model;


class UserRepository extends CoreRepository
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Вывод всех клиентов библиотеки
     *
     * @return void
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllUsers()
    {
        $users = Model::whereHas('roles', function ($query) {
            $query->where('role_id', '=', 2);
          })
          ->paginate(10);

        return $users;
    }

}
