<body>
@if($follows === null)
<div class="title-box3">
  <p>あなたがフォローしている人はいません</p>
  <x-delete></x-delete>
</div>

@else

<div class="box8">
  <div class="title-box3">
    <div class="title-box3-title"><p>あなたがフォロー中の人の一覧です</p></div>
    @foreach($follows as $follow)
    <div class="follow_name"><p><a href="{{route ('future.otherpage', ['id' => $follow->id])}}">{{ $follow->name }}</a></p></div>
    @endforeach
  </div>
  <x-delete></x-delete>
</div>

@endif

</body>

<style>
.follow_name{
  font-size:20px;
}
.title-box3 a{
  text-decoration:none;
  color:black;
}
.box8 {
    padding: 0.5em 1em;
    color: #232323;
    background: #fff8e8;
    border-left: solid 10px #ffc06e;
    width:100%;
    height:900px;
    text-align:center;
}
.fashionable-box1{
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
  margin-bottom: 100px;
  background-color: #fff3e0;
  border: 2px solid #ffa726;
  letter-spacing: .3px;
  text-align:center;
  width:30%;
  margin:10% 40%;
}

.title-box3-title{
  font-weight: bold;
  background-color: #ffa726;
  padding: 4px 6px;
  text-align: center;
}

.title-box3 p{
  margin: 0;
  padding: 1em;
}

</style>