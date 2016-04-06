<?php
namespace App\Http\Controllers\Admin;

use App\Domains\WebsiteSettings;
use App\Helpers\JsonResources;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Image;

class WebsiteSettingsController extends Controller
{

    private $id = 1;

    public $folder;
    public $websiteSettingsId;
    public $faviconWidth;
    public $faviconHeight;
    public $avatarWidth;
    public $avatarHeight;
    public $appleTouchIconWidth;
    public $appleTouchIconHeight;

    public function __construct()
    {
        $this->folder               = "assets/images/_upload/dados-site/";
        $this->websiteSettingsId    = 1;
        $this->faviconWidth         = 48;
        $this->faviconHeight        = 48;
        $this->avatarWidth          = 230;
        $this->avatarHeight         = 230;
        $this->appleTouchIconWidth  = 129;
        $this->appleTouchIconHeight = 129;

    }

    public function index()
    {

        $imageDetails = [
            'folder'               => $this->folder,
            'faviconWidth'         => $this->faviconWidth,
            'faviconHeight'        => $this->faviconHeight,
            'avatarWidth'          => $this->avatarWidth,
            'avatarHeight'         => $this->avatarHeight,
            'appleTouchIconWidth'  => $this->appleTouchIconWidth,
            'appleTouchIconHeight' => $this->appleTouchIconHeight,
        ];

        $websiteSettings = WebsiteSettings::find($this->id);

        return view('admin.websiteSettings.index')->with(compact('websiteSettings', 'imageDetails'));
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

        if ($request->favicon) {
            //DELETE OLD FAVICON
            if ("" != $request->currentFavicon) {
                if (File::exists($this->folder . $request->currentFavicon)) {
                    File::delete($this->folder . $request->currentFavicon);
                }
            }
            $extension   = $request->favicon->getClientOriginalExtension();
            $nameFavicon = "favicon." . $extension;

            Image::make($request->file('favicon'))->resize($this->faviconWidth, $this->faviconHeight)->save($this->folder . $nameFavicon);

            $websiteSettings->favicon = $nameFavicon;
        }
        if ($request->avatar) {
            //DELETE OLD AVATAR
            if ("" != $request->currentAvatar) {
                if (File::exists($this->folder . $request->currentAvatar)) {
                    File::delete($this->folder . $request->currentAvatar);
                }
            }
            $extension  = $request->avatar->getClientOriginalExtension();
            $nameAvatar = "avatar." . $extension;

            $img = Image::make($request->file('avatar'));
            if ($request->avatarCropAreaW > 0 or $request->avatarCropAreaH > 0 or $request->avatarPositionX or $request->avatarPositionY) {
                $img->crop($request->avatarCropAreaW, $request->avatarCropAreaH, $request->avatarPositionX, $request->avatarPositionY);
            }
            $img->resize($this->avatarWidth, $this->avatarHeight)->save($this->folder . $nameAvatar);

            $websiteSettings->avatar = $nameAvatar;
        }
        if ($request->appleTouchIcon) {
            //DELETE OLD APPLE TOUCH ICON
            if ("" != $request->currentAppleTouchIcon) {
                if (File::exists($this->folder . $request->currentAppleTouchIcon)) {
                    File::delete($this->folder . $request->currentAppleTouchIcon);
                }
            }
            $extension          = $request->appleTouchIcon->getClientOriginalExtension();
            $nameAppleTouchIcon = "apple-touch-icon." . $extension;

            Image::make($request->file('appleTouchIcon'))->resize($this->appleTouchIconWidth, $this->appleTouchIconHeight)->save($this->folder . $nameAppleTouchIcon);

            $websiteSettings->appleTouchIcon = $nameAppleTouchIcon;
        }

        //WRITE JSON
        JsonResources::writeFile("websiteSettings", json_encode($websiteSettings));

        $websiteSettings->save();

        $success = "Dados do site editados com sucesso!";

        return redirect('/admin/dados-site')->with(compact('success'));
    }
}
