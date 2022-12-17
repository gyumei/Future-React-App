<?php

namespace App\Http\Controllers\Future\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, int $id)
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
            $profiles = Profile::where('profiles_id', '=', $me)->get();
            return redirect()->route('future.mypage',['id' => $me])->with('me', $me)->with('mypage', $mypage)->with('profiles', $profiles);
        }
        else{
            $profiles = null;
            return redirect()->route('future.mypage',['id' => $me])->with('me', $me)->with('mypage', $mypage)->with('profiles', $profiles);
        }
    }
    public function put_display()
    {
        $my_record = auth()->id();
        $profile = Profile::where('profiles_id', '=', $my_record)->first();
        return view('future.update')->with('my_record', $my_record)->with('profile', $profile);
    }
    
}
