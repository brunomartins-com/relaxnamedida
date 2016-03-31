<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Sarav\Multiauth\Foundation\ResetsPasswords;

class PasswordController extends Controller
{

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
