@foreach($follows as $follow)
        <p>{{ $follow->name }}</p>
@endforeach
<div class="back">
    <a href="{{ route('future.index') }}">戻る</a>
</div>