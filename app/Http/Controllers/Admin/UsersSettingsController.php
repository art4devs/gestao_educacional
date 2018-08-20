<?php

namespace Educacional\Http\Controllers\Admin;

use Educacional\Http\Requests\UsersUpdatePasswordRequest;
use Educacional\Http\Controllers\Controller;
use Educacional\Repositories\UsersRepository;
use Illuminate\Support\Facades\Session;

class UsersSettingsController extends Controller
{
    private $usersRepository;

    /**
     * UsersSettingsController constructor.
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function editPassword()
    {
        return view('admin.users.update-password');
    }

    public function updatePassword(UsersUpdatePasswordRequest $request)
    {
        $data = $request->only(['password']);
        $data['password'] = bcrypt($data['password']);
        $this->usersRepository->update($data, \Auth::user()->id);
        Session::flash('success', "Senha alterada com sucesso!");
        return redirect()->route('admin.users.password.edit');
    }
}
