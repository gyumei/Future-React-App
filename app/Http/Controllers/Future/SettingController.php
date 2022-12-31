<?php

namespace App\Http\Controllers\Future;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Inertia\Inertia;

class SettingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, int $id)
    {
        $me = $id;
        $mypage = User::where('id', '=', $me)->first();
        $setting = new Profile;
        $setting->profiles_id = auth()->id();
        $setting->content = $request->input('setting');
        $setting->save();
        $profiles = Profile::where('profiles_id', '=', $me)->get();
        return Inertia::render("Mypage",['mypage'=>$mypage, 'me' => $id, 'profiles' => $profile]);
    }
}
