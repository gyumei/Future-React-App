<!DOCTYPE html>
<html lang="ja">
<head>
<title>タイムカプセル</title>
<meta name="description" charset=”UTF-8” content="思い出を未来に残します">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<div class="flex justify-center" id="first_header">
<nav class="header01-nav">
<h1 class="header01-logo">{{ $title ?? 'タイムカプセル' }}</h1>
    <ul class="header01-list">
        @auth
        <li class="header01-item"><a href="{{ route('future.register') }}" ><div class="header01">投稿場所</div></a></li>
        <li class="header01-item"><a href="{{ route('future.followeddisplay') }}"><div class="header02">フォロワー</div></a></li>
        <li class="header01-item"><a href="{{ route('future.followdisplay') }}"><div class="header03">フォロー中</div></a></li>
        <li class="header01-item"><a href="{{ route('future.mypage',['id' => $me]) }}"><div class="header04">マイページ</div></a></li>
        <li class="header01-item"><a href=""><div class="header05">
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <div class="flex justify-end p-4">
                    <button
                        class="mt-2 text-sm text-gray-500 hover:text-gray-800"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        >ロウアウト
                    </button>
                </div>
            </form>
        </a>
        </li>
        @endauth
        @guest
        <li class="header01-item"><a href="{{ route('login') }}"><div class="header05">ログイン</div></a></li>
        <li class="header01-item"><a href="{{ route('register') }}"><div class="header06">会員登録</div></a></li>
        @endguest
    </ul>
</nav>
</div>
</div>
</head>
<body>
    {{ $slot }}
</body>
</html>

<style>
.header01-item{
    text-align: center;
}

#first_header {
    background-color:#FF8C00;
    padding:10px;
}
a {
  text-decoration: none;
  color: black;
}
.header01{
  width: 200px;
  height: 200px;
  background: #008080;
  line-height: 200px;
  margin-top:21%;
}
.header01:hover{
    background-color: #5F9EA0;
}

.header02{
  width: 200px;
  height: 200px;
  background: #A52A2A;
  line-height: 200px;
  margin-top:21%;
}
.header02:hover{
    background-color:#FF4500;
}

.header03{
  width: 200px;
  height: 200px;
  background: #708090;
  line-height: 200px;
  margin-top:21%;
}
.header03:hover{
    background-color:#C0C0C0;
}

.header04{
  width: 200px;
  height: 200px;
  background: #ffd700;
  line-height: 200px;
  margin-top:21%;
}
.header04:hover{
    background-color:#FFE4B5;
}

.header05{
  width: 200px;
  height: 200px;
  background: #D2691E;
  line-height: 200px;
  margin-top:21%;
}
.header05:hover{
    background-color:#F4A460;
}

.header06{
  width: 200px;
  height: 200px;
  background: #9932CC;
  line-height: 200px;
  margin-top:21%;
}
.header06:hover{
    background-color:#DA70D6;
}

.header01-logo {
  font-weight: bold;
  font-size: 20px;
}

.header01-list {
  list-style:none;
  display: flex; 
  justify-content: flex-end;
  align-items: flex-end;
  align-items: center;
  gap: 2px;
  font-size: 20px;
  font-weight: bold;
  margin-top: -5%;
  margin-right: -1%;
}
</style>