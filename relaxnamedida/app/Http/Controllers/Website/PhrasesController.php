<?php

namespace App\Http\Controllers\Website;

use App\Domains\Phrase;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class PhrasesController extends Controller
{
    private $folder = 'assets/images/_upload/cupons/';

    public function create(Request $request)
    {

        $phrase = new Phrase();

        $phrase->participantId = \Auth::user('users')->id;

        $phrase->message = $request->message;
        $phrase->date    = new Carbon();
        $phrase->active  = 0;

        //IMAGE
        $extension = $request->receipt->getClientOriginalExtension();
        $nameImage = Carbon::now()->format('YmdHis') . "." . $extension;
        $receipt   = Image::make($request->file('receipt'));
        $receipt->save($this->folder . $nameImage);

        $phrase->receipt = $nameImage;

        $phrase->save();

        $status = 'Frase eviada para análise com sucesso!';
        return redirect(url('/'))->with(compact('status'));
    }
}
