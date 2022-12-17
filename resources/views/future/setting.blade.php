<form action="{{ route('future.settingregister',['id' => $my_record]) }}" method="post">
    @csrf
    <label for="search">プロフィール設定</label>
    <textarea type="text" id="name" name="setting"></textarea>
    <button type="submit">設定</button>
</form>

<a href="{{ route('future.index') }}">戻る</a>
