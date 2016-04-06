<?php

namespace App\Http\Controllers\Admin;

use App\Domains\Texts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StartBannerController extends Controller
{
    public function index()
    {
        $texts = Texts::all();
        $temp  = [];
        foreach ($texts as $text) {
            $temp[$text->id] = $text->text;
        }
        $texts = $temp;
        unset($temp);

        return view('admin.start-banner.index')->with(compact('texts'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'frase1' => 'required',
            'frase2' => 'required',
            'frase3' => 'required',
            'botao1' => 'required',
            'botao2' => 'required',
        ],
            [
                'frase1.required' => 'Informe o texto para a Frase 1',
                'frase2.required' => 'Informe o texto para a Frase 2',
                'frase3.required' => 'Informe o texto para a Frase 3',
                'botao1.required' => 'Informe o texto para o Botao 1',
                'botao2.required' => 'Informe o texto para a Botao 2',
            ]
        );

        $texts = ['frase1', 'frase2', 'frase3', 'botao1', 'botao2'];

        foreach ($texts as $textName) {
            $text       = Texts::find($textName);
            $text->text = $request->{$textName};
            $text->save();
        }

        $success = " editado com sucesso!";

        return redirect(action('Admin\StartBannerController@index'))->with(compact('success'));
    }
}
