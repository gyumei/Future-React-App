@if($follows === null)
<p>あなたがフォローしている人はいません</p>

@else

@foreach($follows as $follow)
        <p>{{ $follow->name }}</p>
@endforeach

@endif

<div class="back">
    <a href="{{ route('future.index') }}">戻る</a>
</div>