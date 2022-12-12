<?php

namespace App\Http\Controllers\Future;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $username = $request->input('search');
        $search_users = User::where('name', 'like', "%$username%")->get();
        return view('future.collect')->with('search_users', $search_users);
    }
}
