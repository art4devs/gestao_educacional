<?php

namespace Educacional\Http\Controllers\Admin;

use Educacional\Events\UserCreatedEvent;
use Educacional\Http\Controllers\Controller;
use Educacional\Http\Requests\UsersCreateRequest;
use Educacional\Http\Requests\UsersUpdateRequest;
use Educacional\Models\User;
use Educacional\Models\UserEnrolment;
use Educacional\Models\UserPassword;
use Educacional\Repositories\UsersRepository;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    private $usersRepository;

    /**
     * UsersController constructor.
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->usersRepository->all();

        return view('admin.users.index', compact([
            'users'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * @param UsersCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UsersCreateRequest $request)
    {
        $data = $request->only(['name', 'email', 'send_mail']);
        $data['password']  = UserPassword::makePassword();
        $data['enrolment'] = UserEnrolment::makeEnrolment(3);

        $user = $this->usersRepository->store($data);

        event(new UserCreatedEvent($user, $data));

        Session::flash('success', "Usuário {$user->name} criado com sucesso!");
        Session::flash('user_created', [
            'newUserId' => $user->id,
            'cleanPassword' => $data['password']
        ]);

        return redirect()->route('admin.users.show_details_new_user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->usersRepository->get($id);

        return view('admin.users.show', compact([
            'user'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->usersRepository->get($id);

        return view('admin.users.edit', compact([
            'user'
        ]));
    }

    /**
     * @param UsersUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UsersUpdateRequest $request, $id)
    {
        $data = $request->only(['name', 'email']);
        $this->usersRepository->update($data, $id);
        Session::flash('success', "Atualização concluída!");

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->usersRepository->destroy($id);
        Session::flash('success', "Exclusão concluída!");

        return redirect()->route('admin.users.index');
    }

    public function showDetailsNewUser()
    {
        $userId        = Session::get('user_created')['newUserId'];
        $cleanPassword = Session::get('user_created')['cleanPassword'];

        $user          = $this->usersRepository->get($userId);

        return view('admin.users.show_details_new_user', compact([
            'user',
            'cleanPassword'
        ]));
    }
}
