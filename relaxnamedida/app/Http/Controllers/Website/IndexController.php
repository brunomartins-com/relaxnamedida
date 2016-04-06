<?php
namespace App\Http\Controllers\Website;

use App\Domains\LastWinners;
use App\Domains\Product;
use App\Domains\Texts;
use App\Helpers\JsonResources;
use App\Http\Controllers\Controller;

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

        $texts = Texts::all();
        $temp  = [];
        foreach ($texts as $text) {
            $temp[$text->id] = $text->text;
        }
        $texts = $temp;
        unset($temp);

        $websiteSettings = JsonResources::readFile("websiteSettings");

        return view('website.index')
            ->with(compact('websiteSettings', 'lastWinnersFolder', 'winners2015', 'winners2014', 'texts',
                'productsFolder', 'products'));
    }
}
