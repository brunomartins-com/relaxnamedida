<?php
namespace App\Http\Controllers\Website;

use App\Helpers\JsonResources;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Mail;

class ContactController extends Controller
{

    public function post(Request $request)
    {
        $websiteSettings = JsonResources::readFile("websiteSettings");

        $this->validate($request, [
            'name'    => 'required|max:100',
            'email'   => 'required|email|max:120',
            'phone'   => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        array_set($request, "date", Carbon::now()->format('d/m/Y'));

        Mail::send('emails.contact', ['request' => $request], function (Message $message) use ($websiteSettings) {
            $message->from('webmaster@teuto.com.br', 'Teuto/Pfizer')
                ->subject('Contato pelo Site [concursonamedida.com.br]')
                ->to('vieirasantosn@gmail.com');
            //->to($websiteSettings['email']);
        });

        $status = "Contato enviado com sucesso!";
        return redirect(url('/'))->with(compact('status'));
    }
}
