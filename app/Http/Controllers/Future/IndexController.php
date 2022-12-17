<?php

namespace App\Http\Controllers\Future;

use App\Http\Controllers\Controller;
use App\Models\Future;
use App\Models\User;
use App\Models\Profile;
use App\Models\Follow;
use App\Models\Share;
use Illuminate\Http\Request;
use App\Services\FutureService;
use App\Http\Requests\Future\CreateRequest;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke(Request $request, FutureService $futureService)
    {
        $futures = $futureService->getFutures();
        $thisyear = $futureService->getYear();
        $thismonth = $futureService->getMonth();
        $thisday = $futureService->getDay();
        $me = auth()->id();
        return view('future.index', ['futures'=> $futures, 'year'=> $thisyear, 'month'=>$thismonth, 'day'=>$thisday, 'me'=>$me]);
    }

    public function ownpage($id)
    {
        $number = $id;
        $ownpage = Future::where('id', '=', $number)->first();
        return view('future.ownpage')->with('ownpage', $ownpage);
    }

    public function mypage($id)
    {
        $me = $id;
        $mypage = User::where('id', '=', $me)->first();
        $profiles = Profile::where('profiles_id', '=', $me)->get();
        $profiles_one = Profile::where('profiles_id', '=', $me)->first();
        if(is_null($profiles_one)){
            $profiles = null;
            return view('future.mypage')->with('me', $me)->with('mypage', $mypage)->with('profiles', $profiles);
        }
        else{
            return view('future.mypage')->with('me', $me)->with('mypage', $mypage)->with('profiles', $profiles);
        }
    }

    public function otherpage($id)
    {
        $other = $id;
        $me = auth()->id();
        $otherpage = User::where('id', '=', $other)->first();
        $confirmation = Follow::where('followed', '=', $other)->where('follow', '=', $me)->first();
        $profile = Profile::where('profiles_id', '=', $other)->first();
        return view('future.otherpage')->with('otherpage', $otherpage)->with('confirmation', $confirmation)->with('profile', $profile);
    }

    public function follow($id)
    {
        $other = $id;
        $me = auth()->id();
        $other_record = User::where('id', '=', $other)->first();
        $follow = new Follow();
        //フォローされた人のidを登録
        $follow->followed = $other_record->id;
        //フォローした人はログインしてる人
        $follow->follow = auth()->id();
        $follow->save();
        $confirmation = Follow::where('followed', '=', $other)->where('follow', '=', $me)->first();
        $profile = Profile::where('profiles_id', '=', $other)->first();
        return view('future.otherpage')->with('otherpage', $other_record)->with('confirmation', $confirmation)->with('profile', $profile);
    }
    
    //フォロー解除します。
    public function follow_delete($id)
    {
        $other = $id;
        $me = auth()->id();
        $follow = Follow::where('followed', '=', $other)->where('follow', '=', $me)->first();
        $follow->delete();
        $other_record = User::where('id', '=', $other)->first();
        $follow_new = Follow::where('followed', '=', $other)->where('follow', '=', $me)->first();
        $profile = Profile::where('profiles_id', '=', $other)->first();
        return view('future.otherpage')->with('otherpage', $other_record)->with('confirmation', $follow_new)->with('profile', $profile);
    }

   //フォローしてる人のデータ一覧の返却
    public function following_display()
    {
        $me = auth()->id();
        $follows = Follow::where('follow', '=', $me)->get();
        //データを一つ取り出してそのデータが存在しているかどうかのチェック
        $follows_one = Follow::where('follow', '=', $me)->first();
        //データが存在していなければそのまま遷移
        if(is_null($follows_one)){
        $following = null;
        return view('future.follow_display')->with('follows', $following);
        }else{
        foreach ($follows as $follow){
        $following[] = User::where('id', '=', $follow->followed)->first();
        }
        return view('future.follow_display')->with('follows', $following);
        }
    }

    //フォローしてくれてる人のデータを一覧の返却
    public function followed_display()
    {
        $me = auth()->id();
        $follows = Follow::where('followed', '=', $me)->get();
        //データを一つ取り出してそのデータが存在しているかどうかのチェック
        $follows_one = Follow::where('followed', '=', $me)->first();
        //データが存在していなければそのまま遷移
        if(is_null($follows_one)){
        $followed = null;
        return view('future.followed_display')->with('follows', $followed);
        }
        else{
        foreach ($follows as $follow){
        $followed[] = User::where('id', '=', $follow->follow)->first();
            }
        return view('future.followed_display')->with('follows', $followed);
        }
    }

    public function setting($id)
    {
        $myid = $id;
        $my_record = User::where('id', '=', $myid)->first();
        return view('future.setting')->with('my_record', $my_record);
    }

    public function register()
    {
        $me = auth()->id();
        $followers = Follow::where('follow', '=', $me)->get();
        $followers_one = Follow::where('follow', '=', $me)->first();
        if(is_null($followers_one)){
            $follow_users = null;
            return view('future.future_register')->with('me', $me)->with('follow_users', $follow_users);
        }
        else{
        foreach ($followers as $follower){
        $follow_users[] = User::where('id', '=', $follower->followed)->first();
            }
        }
        return view('future.future_register')->with('me', $me)->with('follow_users', $follow_users);
    }
    //誰に共有したかをデータベースに登録します。
    public function share()
    {
        $me = auth()->id();
        $limit_count = 4;
        $year = date('Y');
        $month = date('n');
        $day = date('j');
        $sharings_to_me = Share::where('shared_user', '=', $me)->get();
        $sharings_to_me_one = Share::where('shared_user', '=', $me)->first();
        if(is_null($sharings_to_me_one)){
            return view('future.share');
        }
        else{
        foreach($sharings_to_me as $sharing_to_me){
        $futures[] = Future::with('images')->orderBy('created_at', 'DESC')->where('id', '=', $sharing_to_me->future_id)->first();
        }
        return view('future.share')->with('futures', $futures)->with('year', $year)->with('month', $month)->with('day', $day);
        }
    }
}
