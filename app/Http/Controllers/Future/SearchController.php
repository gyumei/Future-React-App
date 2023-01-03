<?php

namespace App\Http\Controllers\Future;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;

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
<<<<<<< HEAD
        $search_users = User::where('name', 'like', "%$username%")->get();
=======
        $me = auth()->id();
        $search_users = User::where('name', 'like', "%$username%")->where('id', '!=', $me)->get();
>>>>>>> 3759a0a (react導入後初めてのコミット)
        return Inertia::render("Collect",['search_users' => $search_users]);
    }
}
