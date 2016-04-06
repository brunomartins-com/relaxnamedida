<?php
namespace App\Http\Controllers\Website;

use App\Domains\Participant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function postRegister(Request $request)
    {

        $participant = new Participant($request->all());
        $participant->save();

        $status = "Cadastrado com sucesso";
        return redirect('/')->with(compact('status'));
    }
}
