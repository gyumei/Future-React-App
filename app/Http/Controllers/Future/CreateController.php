<?php

namespace App\Http\Controllers\Future;

use App\Models\Image;
use App\Models\Future;
use App\Models\Share;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Future\CreateRequest;
use App\Services\FutureService;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $future = new Future;
        $future->title = $request->input('title');
        $future->user_id = $request->user()->id;
        $content = $request->input('future');
        if(is_null($content)){
            $future->content = "投稿はありませんでした。";
        }else{
            $future->content = $content;
        }
        $future->year = $request->input('year');
        $register_time = new Carbon($request->input('year'));
        $now_time = new Carbon();
        if(($register_time->gte($now_time)) == true){
            $future->number = 1;
        }else{
            $future->number = 0;
        }

        $future->save();
        
        $sharings = $request->input('select_user');
        if(is_null($sharings)){
        }
        else{
        foreach ($sharings as $key => $value){
            $share = new Share;
            $share->future_id = $future->id;
            $share->share_user = auth()->id();
            $share->shared_user = $key;
            $share->save();
        }
        }
        
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
        
        $new_register_time = $register_time->addHour(4);
        $register_time_one = $new_register_time->addHours(5);
        
        $google_calendar = $request->input('google');
        if(is_null($google_calendar)){
        }
        else{
            $client = $this->getClient();
            $service = new Google_Service_Calendar($client);
            $calendarId = env('GOOGLE_CALENDAR_ID');
            $event = new Google_Service_Calendar_Event(array(
            //タイトル
            'summary' => $request->input('title'),
            'start' => array(
                // 開始日時
                'dateTime' => $new_register_time,
                'timeZone' => 'Asia/Tokyo',
            ),
            'end' => array(
                // 終了日時
                'dateTime' => $register_time_one,
                'timeZone' => 'Asia/Tokyo',
            ),
        ));

        $event = $service->events->insert($calendarId, $event);
        }
        return redirect()->route('future.index');
    }
    
    private function getClient()
    {
        $client = new Google_Client();

        //アプリケーション名
        $client->setApplicationName('GoogleCalendarAPIのテスト');
        //権限の指定
        $client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);
        //JSONファイルの指定
        $client->setAuthConfig(storage_path('app/api-key/my-project-368607-864cfcca36a3.json'));

        return $client;
    }
}
