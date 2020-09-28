<?php

namespace App\Http\Controllers\Library\Admin;

use App\Http\Requests\Admin\AdminUserEditRequest;
use App\Http\Requests\Admin\AdminUserAddRequest;
use App\Http\Controllers\Library\Admin\AdminBaseController;
use App\Repositories\Admin\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\User;
use App\Models\UserRole;

/**
 * Контроллер админа для работы с данными клиентов
 */
class UserController extends AdminBaseController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = app(UserRepository::class);
    }
    /**
     * Вывод клиентов библиотеки.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->getAllUsers();

        return view('library.admin.main.index', compact('users'));
    }

    /**
     * Страница добавления клиента.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('library.admin.main.create');
    }

    /**
     * Добавление данных клиента в базу данных.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserAddRequest $request)
    {
        //dd($request->input());
        /*$user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);*/
        $user = User::create($request->input());

        if(!$user){
            return back()
            ->withFail('Ошибка!')
            ->withInput();
        }else{
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => 2
            ]);
            return redirect('/admin/users')
            ->withSuccess ('Пользователь добавлен');
        }
    }

    /**
     * Вывод на страницу для изменения данных клиента.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->getId($id);

        return view('library.admin.main.edit', compact('user'));
    }

    /**
     * Изменение данных клиента в базе данных.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserEditRequest $request, $id)
    {

        $user = $this->userRepository->getId($id);

        $request->password == null ? : $user->password = Hash::make($request->password);
        $save = $user->save();

        if(!$save){
            return back()
            ->withFail('Ошибка!')
            ->withInput();
        }else{
            return redirect()
            ->route('admin.users.edit',$id)
            ->withSuccess ('Пароль пользователя изменен');
        }

    }

    /**
     * Удаление клиента из базы данных.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->getDelete($id);

       return redirect('/admin/users')
       ->withSuccess ('Пользователь удален');
    }
}
