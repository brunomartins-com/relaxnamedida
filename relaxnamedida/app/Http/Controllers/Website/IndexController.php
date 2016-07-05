<?php
namespace App\Http\Controllers\Website;

use App\Domains\LastWinners;
use App\Domains\Phrase;
use App\Domains\Product;
use App\Domains\Texts;
use App\Domains\WebsiteSettings;
use App\Helpers\JsonResources;
use App\Http\Controllers\Controller;
use Auth;

class IndexController extends Controller
{
    public function redirectIndex()
    {
        return redirect('/');
    }

    public function index()
    {

        $lastWinnersFolder = "assets/images/_upload/ganhadores-anteriores/";
        $productsFolder    = "assets/images/_upload/products/";

        $winners2015 = LastWinners::where('year', 2015)->orderBy('position', 'ASC')->get();
        $winners2014 = LastWinners::where('year', 2014)->orderBy('position', 'ASC')->get();

        $products = Product::orderBy('sortOrder', 'ASC')->get();

        $allPhrases = Phrase::where('active', '=', 1)->orderBy('date', 'ASC')->get();

        $texts = Texts::all();
        $temp  = [];
        foreach ($texts as $text) {
            $temp[$text->id] = $text->text;
        }
        $texts = $temp;
        unset($temp);

//        if (JsonResources::hasFile('websiteSettings')) {
//            $websiteSettings = JsonResources::readFile('websiteSettings');
//        } else {
            $websiteSettings = WebsiteSettings::find(1);
//        }

        if (Auth::check('users') && Auth::user('users')->active == 0) {
            Auth::logout('users');
            $status = 'Seu email ainda não foi confimado, verifique sua caixa de email.';

            return redirect('/')->with(compact('status'));
        }

        return view('website.index')
            ->with(compact('websiteSettings', 'lastWinnersFolder', 'winners2015', 'winners2014', 'texts',
                'productsFolder', 'products', 'allPhrases'));
    }
}
