<?php
namespace App\Http\Controllers\Website;

use App\Domains\Participant as User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function putUpdate(Request $request)
    {

        $authUser   = \Auth::user('users');
        $authUserId = $authUser->id;

        $request->inputName = ('cityProfile' !== $request->inputName) ? $request->inputName : 'city';

        if ($authUser->{$request->inputName} == $request->inputValue) {
            return ['success' => 1, 'newInputValue' => $request->inputValue];
        }

        $userVerify = 0;

        if ('email' == $request->inputName or 'cpf' == $request->inputName) {
            $userVerify = User::where('id', '!=', $authUserId)
                ->where($request->inputName, '=', $request->inputValue)
                ->count();
        }

        if ($userVerify < 1) {
            if ('birthDate' === $request->inputName) {
                $birthDate = Carbon::createFromFormat('d/m/Y', $request->inputValue);
                $user      = $authUser->update([$request->inputName => $birthDate]);
            } else {
                $user = $authUser->update([$request->inputName => $request->inputValue]);
            }

            if ($user) {
                return ['success' => 1, 'newInputValue' => $request->inputValue];
            }
        }

        return ['success' => 0, 'newInputValue' => $request->inputValue];
    }
}
