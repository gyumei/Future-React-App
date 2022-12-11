<body>
    <h1>タイムカプセル</h1>
    <div class="box5">

    <div class="sample_box3_2">
        <p>{{ $ownpage->content }}</p>
        <p>{{ $ownpage->year }}年{{ $ownpage->month }}月{{ $ownpage->day }}日</p>
        <p>{{ $ownpage->user->name }}</p>
        @foreach($ownpage->images as $image)
        <img src="{{ asset($image->path) }}" width="500px" height="300px">
        <br>
        <video controls loop autoplay muted width="500px" height="300px">
            <source src="{{ asset($image->path) }}" type="video/mp4">
        </video>
        @endforeach
    </div>
    <br><br>
    </div>
</body>

<a href="{{ route('future.index') }}">戻る</a>
