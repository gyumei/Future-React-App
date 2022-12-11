<h1>検索一覧</h1>
@foreach($search_users as $search_user)
<p>検索結果：[ <a href="{{ route('future.otherpage',['id' => $search_user->id]) }}">{{ $search_user->name }} </a>]</p>
@endforeach

<a href="{{ route('future.index') }}">戻る</a>