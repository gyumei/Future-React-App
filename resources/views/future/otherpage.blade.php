<title>他人のページです</title>
<div class="sample_box5">
<h1>{{ $otherpage->name }}さんのページです</h1>


@if(!$confirmation)
<div class="button004">
<a href="{{ route('future.follow',['id' => $otherpage->id]) }}">フォロー</a>
</div>
@else
<div class="button004">
<a href="{{ route('future.follow_delete' ,['id' => $otherpage->id]) }}">フォロー解除</a>
</div>
@endif

@if(is_null($profile))
<div>
    <p>自己紹介文はありませんでした</p>
</div>
@else
<div>
    <p>自己紹介文</p>
    <p>{{ $profile->content }}</p>
</div>
@endif
<br>
</div>
<x-delete></x-delete>

<style>
.button004 a {
    background: #eee;
    border-radius: 50px;
    position: relative;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin: 0 auto;
    max-width: 260px;
    padding: 10px 25px;
    color: #313131;
    transition: 0.3s ease-in-out;
    font-weight: 500;
    text-decoration:none;
}
.button004 a:after {
    position: absolute;
    top: 50%;
    right: 20px;
    border-radius: 1px;
    transition: 0.2s ease-in-out;
    content: "\f0da";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    transform: translateY(-50%);
}
.button004 a:hover {
    background: #313131;
    color: #FFF;
}
.sample_box5 {
    padding: 1em 1.5em;
    margin: 2em 0;
    background-color:#FF8C00;/*背景色*/
    border: 6px #ffa500;/*線*/
    border-color:black;
    color:#000000;/*文字色*/
    text-align:center;
    width:50%;
    margin-left:450px;
    margin-top:50px;
    padding-top:200px;
    padding-bottom:200px;
}
</style>
