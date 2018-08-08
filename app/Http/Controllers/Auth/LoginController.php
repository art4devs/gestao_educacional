<?php

namespace Educacional\Http\Controllers\Auth;

use Educacional\Http\Controllers\Controller;
use Educacional\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Sobreposicao para definir o tipo de busca que sera feito, se
     * por email ou enrolment.
     *
     * @Override
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(), 'password');

        if ($this->isEmail($data['username'])) {
            $data['email'] = $data['username'];
        } else {
            $data['enrolment'] = $data['username'];
        }
        // define que so admins podem logar na area administrativa
        $data['userable_type'] = Admin::class;

        unset($data['username']);

        return $data;
    }

    /**
     * Valida se o tipo de input eh um email.
     *
     * @param string $input
     * @return mixed
     */
    protected function isEmail(string $input)
    {
        return filter_var($input, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Sobreposicao para definir o nome do input de login para username.
     *
     * @Override
     * @return string
     */
    public function username()
    {
        return 'username';
    }
}
