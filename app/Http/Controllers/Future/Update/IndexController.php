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
        $me = $id;
        $my_record = $me;
        $profiles = Profile::where('profiles_id', '=', $me)->first();
        return view('future.update')->with('profile', $profiles)->with('my_record', $my_record);
    }
}
