<!DOCTYPE html>
<html lang="ja">
<body>
@if($follows === null)
<div class="box8">
  <div class="text_box">あなたをフォローしている人はいません。</div>
  <x-delete></x-delete>
</div>
@else

<div class="title-box3">
<div class="title-box3-title"><p>あなたのフォロワー一覧です</p></div>
@foreach($follows as $follow)
  <p><a href="{{route ('future.otherpage', ['id' => $follow->id])}}">{{ $follow->name }}</a></p>
@endforeach
<x-delete></x-delete>
</div>
@endif

</body>

</html>

<style>
.box8 {
    padding: 0.5em 1em;
    margin: 2em 0;
    color: #232323;
    background: #fff8e8;
    border-left: solid 10px #ffc06e;
    width:100%;
    height:900px;
    text-align:center;
}
.box8 p {
    margin: 0; 
    padding: 0;
}
.text_box{
  line-height:50;
}
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

</style>