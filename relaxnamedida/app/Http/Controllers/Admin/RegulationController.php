<?php

namespace App\Http\Controllers\Admin;

use App\Domains\Texts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    private $textsId;

    public function __construct()
    {
        $this->textsId = 'regulation';
    }

    public function index()
    {
        $texts = Texts::find($this->textsId);

        return view('admin.regulation.index')->with(compact('texts'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
        ],
            [
                'text.required' => 'Informe o texto',
            ]
        );

        $text       = Texts::find($this->textsId);
        $text->text = $request->text;
        $text->save();

        $success = "Texto editado com sucesso!";

        return redirect('/admin/regulamento')->with(compact('success'));
    }
}
