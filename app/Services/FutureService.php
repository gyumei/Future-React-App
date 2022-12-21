<?php

namespace App\Services;

use App\Models\Future;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FutureService
{
    public function getFutures()
    {
        $me = auth()->id();
        $limit_count = 4;
        return Future::with('images')->orderBy('created_at', 'DESC')->where('user_id', '=', $me)->paginate($limit_count);
    }

    public function saveFuture(int $userId, string $content,  int $year, int $month, int $day, string $filename)
    {
        DB::transaction(function () use ($userId, $content,  $year, $month, $day, $filename){
            $future = new Future;
            $future->user_id = $userId;
            $future->content = $content;
            $future->year = $year;
            $future->month = $month;
            $future->day = $day;
            $future->save();

            // ファイル情報をDBに保存
            $image = new Image();
            Storage::putFile('public/images', $image);
            $image->name = $file_name;
            $image->path = 'storage/' . $dir . '/';
            $image->future_id = auth()->id();
            $image->save();
            $future->images()->attach($image->id);
            }
        );
    }
}
