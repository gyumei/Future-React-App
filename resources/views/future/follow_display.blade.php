@if($follows === null)
<div class="fashionable-box1">
  <p>あなたがフォローしている人はいません</p>
</div>

@else

<div class="title-box3">
<div class="title-box3-title"><p>あなたがフォロー中の人の一覧です</p></div>
@foreach($follows as $follow)
  <p><a href="{{route ('future.otherpage', ['id' => $follow->id])}}">{{ $follow->name }}</a></p>
@endforeach
</div>

@endif

<div class="back">
    <a href="{{ route('future.index') }}">戻る</a>
</div>

<style>
.fashionable-box1{
  margin: 1em 10px;
  padding: 1em;
  background-color: #fff8e1;
  border: dashed 3px #ffc107;
  box-shadow: 0 0 0 10px #fff8e1;
  border-radius: 5px;
}

.fashionable-box1 p{
  margin: 0;
  padding: 0;
}
.title-box3{
  margin: 1em 0;
  background-color: #fff3e0;
  border: 2px solid #ffa726;
  letter-spacing: .3px;
  text-align:center;
}

.title-box3-title{
  color: #fff;
  font-weight: bold;
  background-color: #ffa726;
  padding: 4px 6px;
  text-align: center;
}

.title-box3 p{
  margin: 0;
  padding: 1em;
}
.back{
    position:fixed;
    bottom:100px;
    right:5%;
}
</style>