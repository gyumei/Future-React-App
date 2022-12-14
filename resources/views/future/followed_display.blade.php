
<p>あなたのフォロワー一覧です</p>
@if($follows === null)
<p>あなたをフォローしている人はいません</p>

@else

@foreach($follows as $follow)
         <a href="{{route ('future.otherpage', ['id' => $follow->id])}}">{{ $follow->name }}</a>
@endforeach

@endif

<div class="back">
    <a href="{{ route('future.index') }}">戻る</a>
</div>
