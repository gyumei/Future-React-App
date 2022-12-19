    <div class="sample_box_title">
        <div class="data_text">
            <a href="{{ route('future.index.ownpage',['id' => $future->id]) }}">タイムカプセル</a>
        </div>
        <hr>
        <p>{{ $future->user->name }}さんが{{ $future->year }}年{{ $future->month }}月{{ $future->day }}日に向けて投稿した思い出です。</p>
    </div>

<style>
.data_text{
    text-align:center;
    padding-top:100px;
}
.data_text a{
    color:#37474F;
}
</style>
