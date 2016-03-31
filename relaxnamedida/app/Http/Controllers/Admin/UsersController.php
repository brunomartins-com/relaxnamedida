<?php
namespace App\Http\Controllers\Admin;

use App\Domains\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('email', '!=', 'hello@brunomartins.com')
            ->orderBy('name', 'ASC')
            ->addSelect('id')
            ->addSelect('name')
            ->addSelect('email')
            ->get();

        return view('admin.users.index')->with(compact('users'));
    }

    public function getNew()
    {
        return view('admin.users.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|max:100',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6|max:12',
        ],
            [
                'name.required'      => 'O nome do responsável é obrigatório',
                'name.max'           => 'O nome do responsável não deve ser maior que :max caracteres',
                'email.required'     => 'O e-mail é obrigatório',
                'email.email'        => 'O e-mail é inválido.',
                'email.unique'       => 'O e-mail já está cadastrado.',
                'password.required'  => 'Informe uma senha',
                'password.min'       => 'A senha não deve ser menor que :min caracteres',
                'password.max'       => 'A senha não deve ser maior que :max caracteres',
                'password.confirmed' => 'As senhas não conferem',
            ]);

        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        $success = "Usuário cadastrado com sucesso.";

        return redirect('/admin/usuarios')->with(compact('success'));
    }

    public function getEdit($id)
    {

        $user = User::where('id', '=', $id)->first();

        return view('admin.users.edit')->with(compact('user'));
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'name'     => 'required|max:100',
            'email'    => 'required|email|max:255',
            'password' => 'confirmed|min:6|max:12',
        ],
            [
                'name.required'      => 'O nome do usuário é obrigatório',
                'name.max'           => 'O nome do usuário não deve ser maior que :max caracteres',
                'email.required'     => 'O e-mail é obrigatório',
                'email.email'        => 'O e-mail é inválido.',
                'password.min'       => 'A senha não deve ser menor que :min caracteres',
                'password.max'       => 'A senha não deve ser maior que :max caracteres',
                'password.confirmed' => 'As senhas não conferem',
            ]);

        $user = User::find($request->userId);

        if ($user->email != $request->email) {
            $this->validate(
                $request,
                ['email' => 'unique:users'],
                ['email.unique' => 'Este email já esta sendo utilizado por outro usuário.']
            );
        }

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        $success = "Usuário editado com sucesso!";

        return redirect('/admin/usuarios')->with(compact('success'));
    }

    public function delete(Request $request)
    {

        User::find($request->get('userId'))->delete();

        $success = "Usuário excluído com sucesso.";

        return redirect('/admin/usuarios')->with(compact('success'));
    }
}
