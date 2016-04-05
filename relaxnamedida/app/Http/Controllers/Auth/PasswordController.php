<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Sarav\Multiauth\Foundation\ResetsPasswords;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PasswordController extends Controller
{
    use ResetsPasswords;

    protected $subject = 'Resetar Senha - Concurso Relax Na Medida';

    protected $redirectPath = '/';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = 'users';
        $this->middleware('guest');
    }

    public function getReset($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        return view('auth.password.reset')->with('token', $token);
    }
}
