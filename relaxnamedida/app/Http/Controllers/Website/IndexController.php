<?php
namespace App\Http\Controllers\Website;

use App\Helpers\JsonResources;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $websiteSettings = JsonResources::readFile("websiteSettings");

        return view('website.index')->with(compact('websiteSettings'));
    }
}
