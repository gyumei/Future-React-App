<hr>
<br>
<div class="form">
<form action="{{ route('future.search') }}" method="post">
    @csrf
    <label for="search">ユーザ検索</label>
    <input type="text" id="name" name="search" class="hoge">
    <button class="mt-2 text-sm text-gray-500 hover:text-gray-800" type="submit">検索</button>
</form>
</div>
<br>