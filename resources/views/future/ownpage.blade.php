<body>
    <div class="loose-leaf">
        <h1>タイムカプセル</h1>
        <div class="box5">
            <div class="sample_box3_2">
                <div class="fashionable-box3">
                    <p>{{ $ownpage->user->name }}さんの投稿です。</p>
                </div>
                <div class="fashionable-box3">
                    <p>{{ $ownpage->year }}年{{ $ownpage->month }}月{{ $ownpage->day }}日に公開されました。</p>
                </div>
                <div class="fashionable-box3">
                    <p>思い出の言葉<br>{{ $ownpage->content }}</p>
                </div>
                @foreach($ownpage->images as $image)
                @if(mb_substr($image->name, -3) == 'jpg' and (mb_substr($image->name, -3) == 'peg') and (mb_substr($image->name, -3) == 'gif') and (mb_substr($image->name, -3) == 'png'))
                <img src="{{ asset($image->path) }}" width="500px" height="300px">
                @elseif(mb_substr($image->name, -3) == 'mp4' and mb_substr($image->name, -3) == 'mov')
                <br>
                <video controls loop autoplay muted width="500px" height="300px">
                    <source src="{{ asset($image->path) }}" type="video">
                </video>
                @endif
                @endforeach
            </div>
        </div>
        <x-delete></x-delete>
    </div>
</body>

<style>
.loose-leaf{
  background: #f8f0d7;
  border-left: 5px dotted rgba(0,0,0,.1);
  box-shadow: 0 0 0 5 #f8f0d7;
  padding: 1em;
  margin: 1em 5px;
  text-align:center;
}

.loose-leaf p{
  margin: 0;
  padding: 0;
}
.fashionable-box3{
  margin: 1em 0;
  padding: 1em;
  box-shadow: 0 0 3px 3px #ffab40, 0 0 3px 2px #ffab40 inset;
  border-radius: 10px;
  background: #fff3e0;
  width:30%;
  margin-left:34%;
}

.fashionable-box3 p{
  margin: 0;
  padding: 0;
}
</style>