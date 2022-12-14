<div class="content">
<p>あなたがフォローしている人の一覧です</p>

@if($follows === null)
<p>あなたがフォローしている人はいません</p>

@else

@foreach($follows as $follow)
        <a href="{{route ('future.otherpage', ['id' => $follow->id])}}">{{ $follow->name }}</a>
@endforeach

@endif
</div>

<div class="back">
    <a href="{{ route('future.index') }}">戻る</a>
</div>


<style>
    .content{
        padding:50px;
    }
</style>