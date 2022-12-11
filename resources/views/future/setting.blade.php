<form action="{{ route('future.settingregister',['id' => $my_record]) }}" method="post">
    @csrf
    <label for="search">プロフィール設定</label>
    <textarea type="text" id="name" name="setting"></textarea>
    <button class="mt-2 text-sm text-gray-500 hover:text-gray-800" type="submit">設定</button>
</form>

<a href="{{ route('future.index') }}">戻る</a>
