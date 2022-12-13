<a href="{{ route('future.index.ownpage',['id' => $future->id]) }}">
    <div class="sample_box_title">
        <p class="data_text">
            <a href="{{ route('future.index.ownpage',['id' => $future->id]) }}">個人のタイムカプセル</a>
        </p>
        <hr>
        <p >{{ $future->user->name }}さんが{{ $future->year }}年{{ $future->month }}月{{ $future->day }}日に向けて投稿した思い出です。</p>
    </div>
</a>

<style>
    .data_text{
        background: #FFCC00;	/*背景色*/
        text-align:center;
        padding-top:100px;
</style>
