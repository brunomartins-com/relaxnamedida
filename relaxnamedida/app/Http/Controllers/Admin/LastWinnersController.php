<?php
namespace App\Http\Controllers\Admin;

use App\Domains\LastWinners;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use Image;

class LastWinnersController extends Controller
{
    public $folder;

    public function __construct()
    {
        $this->folder = "assets/images/_upload/ganhadores-anteriores/";
    }

    public function getIndex()
    {

        $winners = LastWinners::orderBy('year', 'ASC')->orderBy('position', 'ASC')->get();

        return view('admin.last-winners.index')->with(compact('winners'));
    }

    public function getEdit($winnersId)
    {

        $imageDetails = [
            'folder' => $this->folder,
        ];

        $winner = LastWinners::find($winnersId);

        return view('admin.last-winners.edit')->with(compact('winner', 'imageDetails'));
    }

    public function putEdit(Request $request)
    {

        $this->validate($request, [
            'name'   => 'required|max:100',
            'city'   => 'required|max:100',
            'state'  => 'required|max:2|min:2',
            'motel'  => 'required|max:100',
            'phrase' => 'required|max:300',
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

        $winner         = LastWinners::find($request->winnersId);
        $winner->name   = $request->name;
        $winner->city   = $request->city;
        $winner->state  = $request->state;
        $winner->motel  = $request->motel;
        $winner->phrase = $request->phrase;

        if ($request->image) {
            //DELETE OLD IMAGE
            if ("" != $request->currentImage) {
                if (File::exists($this->folder . $request->currentImage)) {
                    File::delete($this->folder . $request->currentImage);
                }
            }
            //IMAGE
            $extension = $request->image->getClientOriginalExtension();
            $nameImage = Carbon::now()->format('YmdHis') . "." . $extension;
            $image     = Image::make($request->file('image'));
            $image->save($this->folder . $nameImage);

            $winner->image = $nameImage;
        }

        $winner->save();

        $success = "Ganhador editado com sucesso";

        return redirect(action('Admin\LastWinnersController@getIndex'))->with(compact('success'));

    }
}
