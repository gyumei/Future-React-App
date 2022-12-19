<body>
    <h1>このアプリの概要</h1>
<div class="sample_box5">
    このアプリは未来の自分に対してや自分以外の家族や友達に何かメッセージや思い出を埋め込むことで日常の中に非日常を埋め込むことを目的としています。
    画像やテキストを投稿して特定の時期にタイムカプセルを設定することができます。
    また将来の自分に対して何か質問を設定して、将来の自分が答え合わせもすることができます。
</div>
<div class="back">
    <a href="{{ route('future.index') }}">戻る</a>
</div>
</body>

<style>
body{
    background-color:#FFB74D;
}
    .sample_box5 {
    padding: 1em 1.5em;
    margin: 2em 0;
    background-color:#ffffe0;/*背景色*/
    border: dotted 6px #ffa500;/*線*/
    color:#000000;/*文字色*/
    text-align:center;
    width:30%;
    margin:10% 35%;
}
.back{
    position:fixed;
    bottom:100px;
    right:5%;
}
</style>