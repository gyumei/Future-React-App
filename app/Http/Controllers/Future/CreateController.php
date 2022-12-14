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
    public function __invoke(CreateRequest $request)
    {
        $future = new Future;
        $future->user_id = $request->user()->id;
        $future->content = $request->input('future');
        $future->year = $request->year;
        $future->month = $request->month;
        $future->day = $request->day;
        $future->save();
        
        $dir = 'sample';
        $images = $request->file('images', []);
        foreach ($images as $image){
            $file_name = $image->getClientOriginalName();
            // 取得したファイル名で保存
            Storage::putFileAs('public/sample', $image, $file_name);
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
