<?php

namespace App\Http\Controllers\Admin;

use App\Domains\Phrase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhrasesController extends Controller
{
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
        Phrase::find($request->get('userId'))->delete();

        //TODO: Implements the user phrases delete

        $success = "Frase excluído com sucesso.";

        return redirect('/admin/frases')->with(compact('success'));
    }
}
