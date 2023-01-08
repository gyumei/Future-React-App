<?php

namespace App\Http\Controllers\Future;

use App\Models\Image;
use App\Models\Future;
use App\Models\Share;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Future\CreateRequest;
use App\Services\FutureService;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Inertia\Inertia;
use Illuminate\Support\Facades\File;
use Cloudinary;
use App\Services\Make_json;


class CreateController extends Controller
{

    public function __invoke(CreateRequest $request,)
    {

        $future = new Future;
        $future->user_id = $request->user()->id;
        $username = User::where('id', '=', $request->user()->id)->first();
        $future->username = $username->name;
        $future->title = $request->input('title');
        $content = $request->input('content');
        if(is_null($content)){
            $future->content = "投稿はありませんでした。";
        }else{
            $future->content = $content;
        }
        $future->year = $request->input('year');
        $future->save();
        
        //選択されたユーザーごとにshareテーブルに登録する
        $sharings = $request->input('select_user');
        if(is_null($sharings)){
        }
        else{
        foreach ($sharings as $sharing){
            $share = new Share;
            $share->future_id = $future->id;
            $share->share_user = auth()->id();
            $share->shared_user = $sharing;
            $share->save();
        }
        }
        
        $dir = 'sample';
        $images = $request->file('images');
        
        if(is_null($images)){
        }else{
        foreach ($images as $image){
            //ファイル名の取得
            $file_name = $image->getClientOriginalName();
            
            //画像のURLを画面に表示
            $image_url = Cloudinary::upload($image->getRealPath())->getSecurePath();
            
             // ファイル情報をDBに保存
            $image = new Image();
            $image->name = $file_name;
            
            $image->path = $image_url;
            
            //拡張子の取得
            $image->extension = File::extension($image->path);
            
            $image->future_id = auth()->id();
            
            $image->save();
            
            $future->images()->attach($image->id);
        }
    }
        $register_time = new Carbon($request->input('year'));
        $new_register_time = $register_time->addHour(4);
        $register_time_one = $new_register_time->addHours(5);
        
        //Google CalendarのAPI連携を実装しました。
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
    
    //クライアントの取得
    private function getClient()
    {
        $client = new Google_Client();
        //アプリケーション名
        $client->setApplicationName('GoogleCalendarAPIのテスト');
        //権限の指定
        $client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);
        //JSONファイルの指定
        $make_json = new Make_json();
        $json = $make_json->get_json();
        $client->setAuthConfig(storage_path($json));

        return $client;
    }
}
