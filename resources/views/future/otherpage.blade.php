<h1>他人のページです</h1>

<p>{{ $otherpage->name }}さんのページです</p>

@if(!$confirmation){
<a href="{{ route('future.follow',['id' => $otherpage->id]) }}">[フォロー]</a>
}@else{
<a href="#">フォロー解除</a>
}
@endif

<a href="{{ route('future.index') }}">戻る</a>

