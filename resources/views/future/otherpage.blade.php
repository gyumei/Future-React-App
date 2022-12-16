<div class="sample_box5">
<h1>{{ $otherpage->name }}さんのページです</h1>


@if(!$confirmation){
<a href="{{ route('future.follow',['id' => $otherpage->id]) }}">[フォロー]</a>
}@else{
<a href="{{ route('future.follow_delete' ,['id' => $otherpage->id]) }}">フォロー解除</a>
}
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
<div class="back">
<a href="{{ route('future.index') }}">戻る</a>
</div>

<style>
.sample_box5 {
    padding: 1em 1.5em;
    margin: 2em 0;
    background-color:#ffffe0;/*背景色*/
    border: dotted 6px #ffa500;/*線*/
    color:#000000;/*文字色*/
    text-align:center;
}
.back{
    position:fixed;
    bottom:100px;
    right:5%;
}
</style>
