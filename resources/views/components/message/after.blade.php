<a href="{{ route('future.index.ownpage',['id' => $future->id]) }}">
    <div class="sample_box_title">
        <p>
            <a href="{{ route('future.index.ownpage',['id' => $future->id]) }}">個人のタイムカプセル</a>
        </p>
        <p>{{ $future->user->name }}さんが{{ $future->year }}年{{ $future->month }}月{{ $future->day }}日に向けて投稿した思い出です。</p>
    </div>
</a>
