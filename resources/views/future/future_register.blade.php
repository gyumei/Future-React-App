<!DOCTYPE html>
<html lang="ja">
    <div class="box8">
    <title>タイムカプセル</title>
    @auth
    <h1>投稿場所</h1>


    <p>投稿フォーム</p>
    <form action="{{ route('future.create') }}" method="post" enctype="multipart/form-data">
        @csrf     
        
        <input type="text" name="title" placeholder="ここにタイトルを入力">
        
        <input type="datetime-local" name="year" min="2023-00-00T00:00" max="2100-12-31T23:59">

        <div class="text">
        <label for="future-content">入力</label>
            <span>500字まで自由に入力してください</span><br>
            <textarea id="future-content" maxlength="500" type="text" name="future" placeholder="テキストを入力" required></textarea>
            <div>👇現在の文字数</div>
            <div id="current-length"></div>
        </div>
        
        @if(is_null($follow_users))
        @else
        
        <p>この投稿をシェアしたいユーザーを選択してください</p>
        <table>
        <thead>
            <tr>
                <td></td>
                <th scope="col">チェック</th>
                <th scope="col">名前</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($follow_users as $follow_user)
            <tr>
                <th>{{ $follow_user->id }}</th>
                <td><input type="checkbox" name="select_user[{{ $follow_user->id }}]"></td>
            <td>{{ $follow_user->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>   
        @endif
        
        <div class="file">
            <p>思い出の画像、動画ファイルを選択してください</p>
            <div id="target">
                <label class="upload-label">
                    ファイルを選択
                <input type="file" id="fileBox" name="images[]" accept="image/gif,image/jpeg,image/png,video/mp4" multiple required>
                </label>
                <button onclick="clickEvent()" class="c-button">注意</button>
                <p id="msg"></p>
                <br>
            </div>
        </div>
      
      <div class="checkbox">
      <fieldset>
        <legend>Google Calendarにこの投稿を登録する場合はここにチェックをつけてください</legend>
        <div>
          <input type="checkbox" id="scales" name="google" checked>
        </div>
      </fieldset>
      </div>

        <button type="submit" class="button btn btn-warning" id="submit_button">提出</button>
    </form>
    <x-delete></x-delete>

    @endauth
    </div>
</html>

<style>
#date2{
    margin-top:-20px;
}
#date3{
    margin-top:-20px;
}
textarea {
  width: 20%; /* 幅 */
  margin: 1em 0; /* 周囲の余白 */
  padding: 0.5em; /* 枠線内の余白 */
  font-size: 1em; /* フォントサイズ */
  border: solid 2px #e1e3e8; /* 枠線のスタイル */
  border-radius: 4px; /* 角丸に */
  resize: none; /* リサイズ不可に */
  height:100px;
}
/* フォーカス時のスタイル */
textarea:focus {
  border-color: #56a9ff;
  outline: 0;
}
table {
  border-collapse: collapse;
  margin: 0 auto;
  padding: 0;
  width: 350px;
}
table tr {
  background-color: #fff;
  border-bottom: 2px solid #fff;
}
table tr:nth-child(even){
  background-color: #eee;
}
table th,
table td {
  padding: .35em 1em;
}
table thead th {
    font-size: .85em;
    padding: 1em;
}
table thead tr{
  background-color: #FFB74D;
  color:#fff;
}
table tbody th {
  text-align: left;
  font-size: .8em;
}
.txt{
   text-align: left;
   font-size: .75em;
}
.price{
  text-align: right;
  color: #FF7043;
  font-weight: bold;
}
@media screen and (max-width: 600px) {
  table {
    border: 0;
    width:100%
  }
  table th{
    background-color: #fd6767;
    display: block;
    border-right: none;
  }
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  table tr {
    display: block;
    margin-bottom: .625em;
    border: 1px solid #fd6767;
  }
  table td {
    border-bottom: 1px dotted #bbb;
    display: block;
    font-size: .8em;
    text-align: right;
    position: relative;
    padding: 1.5em 1em 1.5em 4em;
    border-right: none;
  }
  
  table td::before {
    content: attr(data-label);
    font-weight: bold;
    position: absolute;
    left: 10px;
    color: #000;
  }
  table td:last-child {
    border-bottom: 0;
  }
  table tbody th {
    color: #fff;
    padding: 1em
}
  table tr:nth-child(even){
  background-color: #fff;
}
}
/* labelをボタンらしく */
.upload-label {
  display: inline-block;
  cursor: pointer; /* カーソルを指に */
  margin: 1em 0; /* まわりの余白 */
  padding: .7em 1em; /* 文字まわりの余白 */
  line-height: 1.4; /* 行間 */
  background: #3e8bff; /* 背景色 */
  color: #FFF; /* 文字色 */
  font-size: 0.95em; /* フォントサイズ */
  border-radius: 2.5em; /* 角の丸み */
  transition: 0.2s; /* ホバーをなめらかに */
}
/* ホバー時 */
.upload-label:hover {
  box-shadow: 0 8px 10px -2px rgba(0, 0, 0, 0.2); /* 影を表示 */
}
/* inputは隠す */
.upload-label input {
  display: none;
}

.data{
    margin: 5%;
}
.text{
    margin: 5%;
}
.file{
    margin: 5%;
}
.box8 {
    padding: 0.5em 1em;
    margin: 2em 0;
    color: #232323;
    background: #fff8e8;
    border-left: solid 10px #ffc06e;
    text-align:center;

}
.table{
    margin-left:45%;
}
.c-button {
  appearance: none;
  border: 0;
  border-radius: 5px;
  background: #FF3366;
  color: #fff;
  padding: 8px 16px;
  font-size: 16px;
}
#submit_button{
  appearance: none;
  border: 0;
  border-radius: 5px;
  background: #4676D7;
  color: #fff;
  padding: 8px 16px;
  font-size: 16px;
}
.cp_ipselect {
  overflow: hidden;
  width:7%;
  margin: 2em auto;
  text-align: center;
}
.cp_ipselect select {
  width: 100%;
  padding-right: 1em;
  cursor: pointer;
  text-indent: 0.01px;
  text-overflow: ellipsis;
  border: none;
  outline: none;
  background: transparent;
  background-image: none;
  box-shadow: none;
  -webkit-appearance: none;
  appearance: none;
}
.cp_ipselect select::-ms-expand {
    display: none;
}
.cp_ipselect.cp_sl01 {
  position: relative;
  border-radius: 2px;
  border: 2px solid skyblue;
  border-radius: 50px;
  background: #ffffff;
}
.cp_ipselect.cp_sl01::before {
  position: absolute;
  top: 0.8em;
  right: 0.8em;
  width: 0;
  height: 0;
  padding: 0;
  content: '';
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-top: 6px solid skyblue;
  pointer-events: none;
}
.cp_ipselect.cp_sl01 select {
  padding: 8px 38px 8px 8px;
  color: black;
}
.checkbox{
  width:300px;
  margin-left:670px;
  margin-bottom:100px;
}
</style>
</style>
<script>
// textarea要素オブジェクト
const textareaElem = document.getElementById("future-content");
// 値を埋め込む先
const currentLengthElem = document.getElementById("current-length");

textareaElem.addEventListener('input', (event) => {
  currentLengthElem.innerText = event.target.value.length;
});

    function changeFile(){
  let files = fileBox.files;
  let filenames = "";

  for(let i = 0 ; i < files.length ; i++){
  	if (i > 0){
      filenames += ', ';
  	}

    filenames += files[i].name;
  }

  msg.innerText = '選択しているファイルは ' + filenames + ' です';
}

let fileBox = document.getElementById('fileBox');
fileBox.addEventListener('change', changeFile);
let msg = document.getElementById('msg');

function clickEvent() {
        alert('ctrlキーを押しながら選択すると複数ファイル選択することができます。');
    }
</script>