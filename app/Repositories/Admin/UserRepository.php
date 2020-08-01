<?php

namespace App\Repositories\Admin;

use App\Repositories\CoreRepository;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\User as Model;
use App\Models\Role;

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
        $users = $this->startConditions()
        ->select('id','login','email')
        ->join('user_roles', function ($join) {
            $join->on('users.id', '=', 'user_roles.user_id')
                 ->where('user_roles.role_id', '=', 2);
        })
        ->orderBy('users.id')
        ->toBase()
        ->paginate(10);
        return $users;
    }

}
