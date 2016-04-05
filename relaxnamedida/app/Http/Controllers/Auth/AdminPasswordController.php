<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Sarav\Multiauth\Foundation\ResetsPasswords;

class AdminPasswordController extends Controller
{
    use ResetsPasswords;

    protected $subject = 'Resetar Senha - Concurso Relax Na Medida';

    protected $redirectPath = '/admin/';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = "admin";
        $this->middleware('admin.guest');
    }

    public function getEmail()
    {
        return view('admin.auth.password');
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function getReset($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        return view('admin.auth.reset')->with('token', $token);
    }
}
