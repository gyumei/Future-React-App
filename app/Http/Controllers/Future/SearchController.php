<?php

namespace App\Http\Controllers\Future;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use App\Http\Requests\Future\SearchRequest;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SearchRequest $request)
    {
        $username = $request->input('search');
        $me = auth()->id();
        $search_users = User::where('name', 'like', "%$username%")->where('id', '!=', $me)->get();
        return Inertia::render("Collect",['search_users' => $search_users]);
    }
}
