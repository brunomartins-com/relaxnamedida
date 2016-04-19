<?php

namespace App\Http\Controllers\Admin;

use App\Domains\Phrase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhrasesController extends Controller
{

    private $uploadPath = '/assets/images/_upload/cupons/';

    public function index()
    {
        $phrases = Phrase::orderBy('id', 'DESC')->get();

        return view('admin.phrases.index')->with(compact('phrases'));
    }

    public function view($phraseId)
    {
        $phrase = Phrase::find($phraseId);

        return view('admin.phrases.view')->with(compact('phrase'));
    }

    public function changeStatus(Request $request)
    {

        $phrase         = Phrase::find($request->phraseId);
        $phrase->active = $request->active;
        $phrase->save();

        $success = "Status da frase editado com sucesso!";

        return redirect('/admin/frases')->with(compact('success'));
    }

    public function delete(Request $request)
    {
        $phrase = Phrase::find($request->get('phraseId'));

        if (is_file($this->uploadPath . $phrase->receipt)) {
            unlink($this->uploadPath . $phrase->receipt);
        }

        $phrase->delete();

        $success = "Frase excluído com sucesso.";

        return redirect('/admin/frases')->with(compact('success'));
    }
}
