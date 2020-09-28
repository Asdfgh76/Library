<?php

namespace App\Http\Controllers\Library\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class MainController extends AdminBaseController
{
    private $user;

    public function __construct()
    {
        $this->user = app(User::class);
    }
    public function index()
    {

    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.admin.main.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

    $user->login = $request->login;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $role = Role::find(2);
    $role->users()->save($user);
    return redirect('/admin/index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('blog.admin.main.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $user->login = $request->login;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();
        if(!$save){
            return back()
            ->withErrors(["msg" => "Ошибка сохранения"])
            ->withInput();
        }else{
            return redirect()
            ->route('blog.admin.index.edit',$id)
            ->with(['success' => 'Успешно сохранено']);
        }
        //return redirect('/admin/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->getDelete($id);

       return redirect('/admin/index');

    }
}

