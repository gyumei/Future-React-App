<?php

namespace App\Http\Controllers\Future\Update;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\services\FutureService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Inertia\Inertia;

class PutController extends Controller
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
        $future = Profile::where('profiles_id', '=', $me)->first();
        $future->content = $request->input('setting');
        $future->save();
        $mypage = User::where('id', '=', $me)->first();
        $profiles = Profile::where('profiles_id', '=', $me)->first();
        return Inertia::render("Mypage",['me'=>$me, 'mypage'=>$mypage, 'profiles'=>$profiles]);
    }
}
