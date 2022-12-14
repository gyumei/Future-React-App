<div class="title-box3">
<div class="title-box3-title"><h1>検索一覧</h1></div>
  <p class="content">
@foreach($search_users as $search_user)
<p class="content">検索結果：[ <a href="{{ route('future.otherpage',['id' => $search_user->id]) }}">{{ $search_user->name }} </a>]</p>
@endforeach
  </p>
</div>

<div class="back">
<a href="{{ route('future.index') }}">戻る</a>
</div>

<style>
.title-box3{
  margin: 1em 0;
  background-color: #fff;
  border: 2px solid #333;
  letter-spacing: .3px;
}

.title-box3-title{
  color: #fff;
  font-weight: bold;
  background-color: #333;
  padding: 4px 6px;
  text-align: center;
}

.title-box3 p{
  margin: 0;
  padding: 1em;
}
.content{
    text-align: center;
}

.back{
    position:fixed;
    bottom:100px;
    right:5%;
}
</style>