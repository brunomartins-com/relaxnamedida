<?php namespace App\Http\Controllers\Website;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $websiteSettings = \App\Exceptions\Handler::readFile("websiteSettings.json");

        return view('website.index')->with(compact('websiteSettings'));
    }
}