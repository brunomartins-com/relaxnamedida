<?php
namespace App\Http\Controllers\Admin;

use App\Domains\Winners;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WinnersController extends Controller
{

    public function getIndex()
    {

        $winners = Winners::orderBy('position', 'ASC')->get();

        return view('admin.winners.index')->with(compact('winners'));
    }

    public function getEdit($winnersId)
    {

        $winner = Winners::find($winnersId);

        return view('admin.winners.edit')->with(compact('winner'));
    }

    public function putEdit(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required|max:100',
            'city'   => 'required|max:100',
            'state'  => 'required|max:2|min:2',
            'phrase' => 'required|max:350',
        ],
            [
                'name.required'   => 'Informe o nome do ganhador',
                'name.max'        => 'O nome do ganhador não pode passar de :max caracteres',
                'city.required'   => 'Informe o nome da cidade do ganhador',
                'city.max'        => 'O nome da cidade não pode passar de :max caracteres',
                'state.required'  => 'Informe o Estado do ganhador',
                'state.max'       => 'O UF do Estado deve ter apenas :max caracteres',
                'state.min'       => 'O UF do Estado deve ter no minimo :min caracteres',
                'phrase.required' => 'Informe a Frase',
                'phrase.max'      => 'A Frase deve ter apenas :max caracteres',
            ]);

        $winner         = Winners::find($request->winnersId);
        $winner->name   = $request->name;
        $winner->city   = $request->city;
        $winner->state  = $request->state;
        $winner->phrase = $request->phrase;

        $winner->save();

        $success = "Ganhador editado com sucesso";

        return redirect(action('Admin\WinnersController@getIndex'))->with(compact('success'));

    }
}
