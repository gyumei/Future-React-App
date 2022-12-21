<body>
<div class="sample_box5">
<h1>マイページです</h1>
<p>ようこそ!!<br>{{ $mypage->name }}さん</p>

@if(is_null($profiles))
<a href="{{ route('future.setting',['id' => $me]) }}">プロフィールを設定する</a>
@else
<a href="{{ route('future.settingregister.put',['id' => $me]) }}">編集する</a>
@endif

<br>

@if(is_null($profiles))
@else
@foreach($profiles as $profile)
    <div class="sample_box3_2">
        <p>{{ $profile->content }}</p>
    </div>
@endforeach
@endif

</div>
<x-delete></x-delete>
</body>

<style>
.sample_box5 a{
    color:red;
}
a{
  position: relative;
  display: inline-block;
  transition: .3s;
  text-decoration:none;
  font-size:  20px;
}
body{
    background-color:#FFB74D;
}
.sample_box5 {
    padding: 1em 1.5em;
    margin: 2em 0;
    background-color:#FF8C00;/*背景色*/
    border: 6px #ffa500;/*線*/
    color:#000000;/*文字色*/
    text-align:center;
    width:30%;
    margin:10% 35%;
}
.back{
    position:fixed;
    bottom:100px;
    right:5%;
}
</style>
