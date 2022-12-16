<!DOCTYPE html>
<html lang="ja">
    <div class="box8">
    <title>タイムカプセル</title>
    @auth
    <h1>投稿場所</h1>


    <p>投稿フォーム</p>
    <form action="{{ route('future.create') }}" method="post" enctype="multipart/form-data">
        @csrf        

        <div class="data">
            <label for="date">公開日</label>
            <x-form.year></x-form.year>
            <x-form.month></x-form.month>
            <x-form.day></x-form.day>
        </div>

        <div class="text">
        <label for="future-content">入力</label>
            <span>言葉を未来に</span><br>
            <textarea id="future-content" type="text" name="future" placeholder="テキストを入力"></textarea>
        </div>
        
        @if(is_null($follow_users))
        @else
        <table border="1" class="table">

        <tr>
            <th>チェックボックス</th>
            <th>id</th>
            <th>name</th>
        </tr>
        @foreach ($follow_users as $follow_user)
        <tr>
            <td><input type="checkbox" name="select_user[{{ $follow_user->id }}]"></td>
            <td>{{ $follow_user->id }}</td>
            <td>{{ $follow_user->name }}</td>
        </tr>
        @endforeach
        </table>
        @endif
        
        <div class="file">
            <button id="add">Add!</button>
            <div id="target">
                <input type="file" name="images[]" accept="image/gif,image/jpeg,image/png,video/mp4" required>
            </div>
        </div>
        <button type="submit" class="button btn btn-warning">提出</button>
    </form>


    @endauth
    </div>
    <div class="back">
        <a href="{{ route('future.index') }}">戻る</a>
    </div>
</html>

<style>
.data{
    margin: 5%;
}
.text{
    margin: 5%;
}
.file{
    margin: 5%;
}
.button{
    margin: 2%;
}
.back{
    position:fixed;
    bottom:100px;
    right:5%;
}
.box8 {
    padding: 0.5em 1em;
    margin: 2em 0;
    color: #232323;
    background: #fff8e8;
    border-left: solid 10px #ffc06e;
    text-align:center;
    height: 900px;

}
.table{
    margin-left:45%;
}
</style>

<script type="text/javascript">
            // 要素をコピー＆追加する関数
            function addExample() {
                let elements = document.getElementById("target");
                let copied = elements.lastElementChild.cloneNode(true);
                elements.appendChild(copied);
            }
            
            // ボタンにイベントハンドラをセット
            const btn = document.getElementById("add");
            btn.addEventListener("click", addExample, false);
</script>
