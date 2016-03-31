<?php
namespace App\Http\Controllers\Admin;

use App\Domains\WebsiteSettings;
use App\Helpers\JsonResources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteSettingsController extends Controller
{

    private $id = 1;

    public function index()
    {
//        if (!ACL::hasPermission('websiteSettings', 'edit')) {
        //            return redirect(route('home'))->withErrors(['Você não tem permissão para acessar os dados do site.']);
        //        }

        $websiteSettings = WebsiteSettings::find($this->id);

        return view('admin.websiteSettings.index')->with(compact('websiteSettings'));
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'title'   => 'required|max:100',
            'email'   => 'required|email',
            'teuto'   => 'required',
            'partner' => 'required',
        ]);

        $websiteSettings = WebsiteSettings::find($this->id);

        $websiteSettings->title           = $request->title;
        $websiteSettings->email           = $request->email;
        $websiteSettings->avatar          = $request->avatar;
        $websiteSettings->favicon         = $request->favicon;
        $websiteSettings->appleTouchIcon  = $request->appleTouchIcon;
        $websiteSettings->facebook        = $request->facebook;
        $websiteSettings->instagram       = $request->instagram;
        $websiteSettings->twitter         = $request->twitter;
        $websiteSettings->googleAnalytics = $request->googleAnalytics;
        $websiteSettings->certificate     = $request->certificate;
        $websiteSettings->teuto           = $request->teuto;
        $websiteSettings->partner         = $request->partner;
        $websiteSettings->siteAvailable   = $request->siteAvailable;
        $websiteSettings->allowSignUp     = $request->allowSignUp;
        $websiteSettings->showWinners     = $request->showWinners;

        //WRITE JSON
        JsonResources::writeFile("websiteSettings", json_encode($websiteSettings));

        $websiteSettings->save();

        $success = "Dados do site editados com sucesso!";

        return redirect('/admin/dados-site')->with(compact('success'));
    }
}
