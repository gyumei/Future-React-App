<?php

namespace App\Http\Controllers\Future;

use App\Models\Image;
use App\Models\Future;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Future\CreateRequest;
use App\Services\FutureService;
use Illuminate\Support\Facades\Storage;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $future = new Future;
        $future->user_id = $request->user()->id;
        $future->content = $request->input('future');
        $future->year = $request->input('year');
        $future->month = $request->input('month');
        $future->day = $request->input('day');
        $future->save();
        
        $dir = 'sample';
        $images = $request->file('images');
        foreach ($images as $image){
            $file_name = $image->getClientOriginalName();
            // 取得したファイル名で保存
            Storage::putFile('public/sample', $image);
            // ファイル情報をDBに保存
            $image = new Image();
            $image->name = $file_name;
            $image->path = 'storage/' . $dir . '/' . $file_name;
            $image->future_id = auth()->id();
            $image->save();
            $future->images()->attach($image->id);
        }
        return redirect()->route('future.index');
    }
}
