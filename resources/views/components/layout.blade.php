<!DOCTYPE html>
<html lang="ja">
<head>
<title>タイムカプセル</title>
<meta name="description" charset=”UTF-8” content="思い出を未来に残します">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<div class="flex justify-center" id="first_header">
    <nav class="header01-nav">
    <h1 class="header01-logo">{{ $title ?? 'タイムカプセル' }}</h1>
    <ul class="header01-list">
        @auth
        <li class="header01-item"><a href="{{ route('future.register') }}" ><div class="header01">post</div></a></li>
         <li class="header01-item"><a href="#"><div class="header05">Question</div></a></li>
        <li class="header01-item"><a href="{{ route('future.followeddisplay') }}"><div class="header02">Follower</div></a></li>
        <li class="header01-item"><a href="{{ route('future.followdisplay') }}"><div class="header03">follow</div></a></li>
        <li class="header01-item"><a href="{{ route('future.mypage',['id' => $me]) }}"><div class="header04">mypage</div></a></li>
        <li class="header01-item"><a href="{{ route('future.share') }}"><div class="header06">share</div></a></li>
        <li class="header01-item"><a href="{{ route('future.outline') }}" ><div class="header01">outline</div></a></li>
        <li class="header01-item"><a href="#"><div class="header02">Q</div></a></li>
        <li class="header01-item"><a href=""><div class="header05">
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <div>
                    <button
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        >logout
                    </button>
                </div>
            </form></div>
        </a>
        </li>
        @endauth
        @guest
        <li class="header01-item"><a href="{{ route('login') }}"><div class="header05">login</div></a></li>
        <li class="header01-item"><a href="{{ route('register') }}"><div class="header06">register</div></a></li>
        @endguest
    </ul>
    </nav>
</div>

    {{ $slot }}
</body>
</html>

<style>
/*メニューブロック*/
.header01-item{
    text-align: center;
}

body {
    background-color:#FF8C00;
}
#first_header {
    background-color:#FF8C00;
    padding:10px;
    height:7%;
}
a {
  text-decoration: none;
}
.header01{
  width: 150px;
  height: 100px;
  background: #008080;
  line-height: 100px;
  margin-top:21%;
  font-family:Comic Sans MS;
  color:black;
}
.header01:hover{
    background-color: #5F9EA0;
}

.header02{
  width: 150px;
  height: 100px;
  background: #A52A2A;
  line-height: 100px;
  margin-top:21%;
  font-family:Comic Sans MS;
  color:black;
}
.header02:hover{
    background-color:#FF4500;
}

.header03{
  width: 150px;
  height: 100px;
  background: #708090;
  line-height: 100px;
  margin-top:21%;
  font-family:Comic Sans MS;
  color:black;
}
.header03:hover{
    background-color:#C0C0C0;
}

.header04{
  width: 150px;
  height: 100px;
  background: #ffd700;
  line-height: 100px;
  margin-top:21%;
  font-family:Comic Sans MS;
  color:black;
}
.header04:hover{
    background-color:#FFE4B5;
}

.header05{
  width:150px;
  height: 100px;
  background: #D2691E;
  line-height: 100px;
  margin-top:21%;
  font-family:Comic Sans MS;
  color:black;
}
.header05:hover{
    background-color:#F4A460;
}

.header06{
  width: 150px;
  height: 100px;
  background: #9932CC;
  line-height: 100px;
  margin-top:21%;
  font-family:Comic Sans MS;
  color:black;
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
  gap: 1px;
  font-size: 20px;
  font-weight: bold;
  margin-top: -5%;
}
</style>