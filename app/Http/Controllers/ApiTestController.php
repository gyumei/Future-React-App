<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;

class ApiTestController extends Controller
{
    public function test()
    {
        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);

        $calendarId = env('GOOGLE_CALENDAR_ID');

        $event = new Google_Service_Calendar_Event(array(
            //タイトル
            'summary' => 'テスト',
            'start' => array(
                // 開始日時
                'dateTime' => '2022-12-23T11:00:00+09:00',
                'timeZone' => 'Asia/Tokyo',
            ),
            'end' => array(
                // 終了日時
                'dateTime' => '2022-12-23T12:00:00+09:00',
                'timeZone' => 'Asia/Tokyo',
            ),
        ));

        $event = $service->events->insert($calendarId, $event);
        
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
