<?php

namespace App\Http\Controllers\Admin;

use App\Domains\Participant as User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'DESC')
            ->addSelect('id')
            ->addSelect('name')
            ->addSelect('email')
            ->addSelect('city')
            ->addSelect('state')
            ->addSelect('active')
            ->get();

        return view('admin.registered.index')->with(compact('users'));
    }

    public function view($usersId)
    {

        $user = User::find($usersId);
        array_set($user, 'birthDate', Carbon::createFromFormat('Y-m-d', $user->birthDate)->format('d/m/Y'));

        return view('admin.registered.view')->with(compact('user'));
    }

    public function changeStatus(Request $request)
    {

        $user         = User::find($request->userId);
        $user->active = $request->active;
        $user->save();

        $success = "Status do cadastrado editado com sucesso!";

        return redirect('/admin/participantes')->with(compact('success'));
    }

    public function delete(Request $request)
    {
        User::find($request->get('userId'))->delete();

        //TODO: Implements the user phrases delete

        $success = "Cadastrado excluído com sucesso.";

        return redirect('/admin/participantes')->with(compact('success'));
    }
}
