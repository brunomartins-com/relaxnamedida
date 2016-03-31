<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {

        $user = \Auth::getUser('admin');

        return view('admin.profile.index')->with(compact('user'));
    }

    public function update(Request $request)
    {

        $this->validate(
            $request,
            [
                'name'     => 'required|max:100',
                'email'    => 'required|email|max:100',
                'password' => 'confirmed|min:6|max:12',
            ],
            [
                'name.required'      => 'O seu nome é obrigatório',
                'name.max'           => 'O nome não deve ser maior que :max caracteres',
                'email.required'     => 'O e-mail é obrigatório',
                'email.email'        => 'O e-mail é inválido.',
                'password.min'       => 'A senha não deve ser menor que :min caracteres',
                'password.max'       => 'A senha não deve ser maior que :max caracteres',
                'password.confirmed' => 'As senhas não conferem',
            ]
        );

        $user = \Auth::getUser('admin');

        if ($user->email != $request->email) {
            $this->validate(
                $request,
                ['email' => 'unique:users'],
                ['email.unique' => 'Este email já esta sendo utilizado por outro usuário.']
            );
        }

        $user->name  = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        $success = "Dados editados com sucesso!";

        return redirect('/admin/meus-dados')->with(compact('success'));
    }
}
