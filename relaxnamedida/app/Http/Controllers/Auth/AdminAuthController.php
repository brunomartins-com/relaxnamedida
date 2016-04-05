<?php

namespace App\Http\Controllers\Auth;

use App\Domains\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Sarav\Multiauth\Foundation\AuthenticatesAndRegistersUsers;

class AdminAuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectAfterLogout = '/admin/auth/login';

    protected $redirectTo = '/admin/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = "admin";
        $this->middleware('admin.guest', ['except' => 'getLogout']);
    }

    public function getLogin()
    {
        return view('admin.auth.login');
    }

}
