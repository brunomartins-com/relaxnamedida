<?php
namespace App\Http\Controllers\Website;

use App\Domains\Participant;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function postRegister(Request $request)
    {
        parse_str($request->get('form1'), $form1);
        parse_str($request->get('form2'), $form2);

        $dados = array_merge($form1, $form2);

        $dados['zipCode']   = $dados['zipcode'] . $dados['tdp'];
        $dados['password']  = bcrypt($dados['password']);
        $dados['birthDate'] = Carbon::createFromFormat('d/m/Y', $dados['birthDate']);

        if (count(Participant::where('email', $dados['email'])->get()) > 0) {
            return [
                'success' => 0,
                'message' => 'O E-mail já está sendo utilizado.',
            ];
        }

        if (count(Participant::where('cpf', $dados['cpf'])->get()) > 0) {
            return [
                'success' => 0,
                'message' => 'O CPF já esta sendo utilizado',
            ];
        }

        $participant = new Participant($dados);
        $participant->save();

        return [
            'success' => 1,
        ];
    }
}
