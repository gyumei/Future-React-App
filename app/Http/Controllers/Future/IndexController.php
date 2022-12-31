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
use Inertia\Inertia;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Future $future)
    {
        $me = auth()->id();
        return Inertia::render("Index",["futures" => Future::with("images")->where('user_id', '=', $me)->get(), 'me'=>$me]);
    }

    //選択された投稿を返す
    public function ownpage($id)
    {
        $number = $id;
        $ownpage = Future::where('id', '=', $number)->first();
        return Inertia::render("Ownpage",['ownpage'=>$ownpage]);
    }

    //自分のマイページを返す
    public function mypage($id)
    {
        $me = $id;
        $mypage = User::where('id', '=', $me)->first();
        $profiles_one = Profile::where('profiles_id', '=', $me)->first();
        if(is_null($profiles_one)){
            $profiles_one = null;
            return Inertia::render("Mypage",['me'=>$me, 'mypage' => $mypage, 'profiles' => $profiles_one]);
        }
        else{
            return Inertia::render("Mypage",['me'=>$me, 'mypage' => $mypage, 'profiles' => $profiles_one]);
        }
    }

    public function otherpage($id)
    {
        $other = $id;
        $me = auth()->id();
        $otherpage = User::where('id', '=', $other)->first();
        $confirmation = Follow::where('followed', '=', $other)->where('follow', '=', $me)->first();
        $profile = Profile::where('profiles_id', '=', $other)->first();
        return Inertia::render("Otherpage",['otherpage'=>$otherpage, 'confirmation' => $confirmation, 'profile' => $profile]);
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
        return Inertia::render("Otherpage",['otherpage'=>$other_record, 'confirmation' => $confirmation, 'profile' => $profile]);
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
        return Inertia::render("Otherpage",['otherpage'=>$other_record, 'confirmation' => $follow_new, 'profile' => $profile]);
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
        return Inertia::render("Follow_display",['follows'=>$following]);
        }else{
        foreach ($follows as $follow){
        $following[] = User::where('id', '=', $follow->followed)->first();
        }
        return Inertia::render("Follow_display",['follows'=>$following]);
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
        return Inertia::render("Followed_display",['follows'=>$followed]);
        }
        else{
        foreach ($follows as $follow){
        $followed[] = User::where('id', '=', $follow->follow)->first();
            }
        return Inertia::render("Followed_display",['follows'=>$followed]);
        }
    }

    public function first_setting($id)
    {
        $my_id = $id;
        return Inertia::render("Setting",['my_id'=>$my_id]);
    }

    public function register()
    {
        $me = auth()->id();
        $followers = Follow::where('follow', '=', $me)->get();
        $followers_one = Follow::where('follow', '=', $me)->first();
        if(is_null($followers_one)){
            $follow_users = null;
            return Inertia::render("Future_register",['me'=>$me, 'follow_users'=>$follow_users]);
        }
        else{
        foreach ($followers as $follower){
        $follow_users[] = User::where('id', '=', $follower->followed)->first();
            }
        }
        return Inertia::render("Future_register",['me'=>$me, 'follow_users'=>$follow_users]);
    }
    
    //誰に共有したかをデータベースに登録します。
    public function share()
    {
        $me = auth()->id();
        //ページネーションの数を記載
        $limit_count = 4;
        //自分に共有されたレコードの取得
        $sharings_to_me = Share::where('shared_user', '=', $me)->get();
        //レコードがあるか確認するために一つ取得してチェックする
        $sharings_to_me_one = Share::where('shared_user', '=', $me)->first();
        if(is_null($sharings_to_me_one)){
            $futures = null;
            return Inertia::render("Share",['futures'=>$futures]);
        }
        else{
        foreach($sharings_to_me as $sharing_to_me){
        $futures[] = Future::with('images')->orderBy('created_at', 'DESC')->where('id', '=', $sharing_to_me->future_id)->first();
        }
        return Inertia::render("Share",['futures'=>$futures]);
        }
    }
    
    //概要ページにとばす
    public function outline()
    {
        return Inertia::render("Outline");
    }
}
