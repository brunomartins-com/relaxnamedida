<?php
namespace App\Http\Controllers\Website;

use App\Domains\Participant;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Mail;

class RegistrationController extends Controller
{
    private function makeConfirmationToken($email)
    {
        return md5('relaxnamedida-' . $email);
    }

    public function getConfirmation($email, $token = null)
    {
        if ($this->makeConfirmationToken($email) === $token) {
            $participant = Participant::where('email', '=', $email)->first();

            $participant->active = 1;
            $participant->save();

            return redirect(url('/', ['status' => 'Seu cadastro foi confirmado com sucesso!']));
        }

        return redirect(url('/'), ['status' => 'Token de confirmação inválido ou já utilizado!']);
    }

    public function postRegister(Request $request)
    {
        parse_str($request->get('form1'), $form1);
        parse_str($request->get('form2'), $form2);

        $dados = array_merge($form1, $form2);

        $dados['zipCode']   = $dados['zipcode'] . $dados['tdp'];
        $dados['password']  = bcrypt($dados['password']);
        $dados['birthDate'] = Carbon::createFromFormat('d/m/Y', $dados['birthDate']);
        $dados['active']    = 0;

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

        $contact = [
            'name'  => $participant->name,
            'email' => $participant->email,
            'token' => $this->makeConfirmationToken($participant->email),
        ];

        Mail::send('emails.participant-activation', ['contact' => $contact], function (Message $message) use ($contact) {
            $message->from('concursos@teuto.com.br', 'Concurso Relax Na Medida')
                ->subject('Confirmação de Cadastro')
                ->to($contact['email']);
        });

        return [
            'success' => 1,
        ];
    }
}
