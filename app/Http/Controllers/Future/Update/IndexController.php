<?php

namespace App\Http\Controllers\Future\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Inertia\Inertia;
use App\Http\Requests\Future\SettingRequest;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SettingRequest $request, int $id)
    {
        $profile_id = $id; 
        $me = auth()->id();
        $mypage = User::where('id', '=', $me)->first();
        $future = Profile::where('id','=', $profile_id)->first();
        if(is_null($future)){
            $profile = new Profile;
            $profile->profiles_id = $me;
            $profile->content = $request->input('setting');
            $profile->save();
            $profiles = Profile::where('profiles_id', '=', $me)->first();
            return Inertia::render("Mypage",['me'=>$me, 'mypage'=>$mypage, 'profiles'=>$profiles]);
        }
        else{
            $profiles = null;
            return Inertia::render("Mypage",['me'=>$me, 'mypage'=>$mypage, 'profiles'=>$profiles]);
        }
    }

    public function put_display()
    {
        $me = auth()->id();
        $profile = Profile::where('profiles_id', '=', $me)->first();
        return Inertia::render("Update",['me'=>$me, 'profile'=>$profile]);
    }
}
