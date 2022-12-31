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
    <h1 class="header01-logo">タイムカプセル</h1>
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
        <li class="header01-item"><a href="{{ route('future.auth') }}"><div class="header01"> Google login</div></a></li>
        <li class="header01-item"><a href="{{ route('register') }}"><div class="header06">register</div></a></li>
        @endguest
    </ul>
    </nav>
</div>



<div class="title">memories to the future
<div class="form">
<form action="{{ route('future.search') }}" method="post">
    @csrf
    <label for="search">ユーザ検索</label>
    <input type="text" id="name" name="search" class="hoge">
    <button class="mt-2 text-sm text-gray-500 hover:text-gray-800" type="submit">検索</button>
</form>
</div>
</div>

<!--==============レイアウトを制御する独自のCSSを読み込み===============-->
<link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/css/6-1-6.css">

<ul class="slider">
  <li><img src="storage/sample/photosvn hafkvjamfvnkja.jpg" alt=""></li>
  <li><img src="storage/sample/sunsetfkjnvafjknva.jpg" alt=""></li>
  <li><img src="storage/sample/living-kjanvjak89j98n.jpg" alt=""></li>
  <li><img src="storage/sample/sunset-vnakjvn893.jpg" alt=""></li>
  <li><img src="storage/sample/walk-jvn82fh8r7yyhbyvh.jpg" alt=""></li>
  <li><img src="storage/sample/hd-havnakvvv738.jpg" alt=""></li>
<!--/slider--></ul>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/js/6-1-6.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<div class="content">

@auth
    <div class="box5">
    @foreach($futures as $future)

    @if($future->number == 1)
    <div class="sample_box_title">
    <div class="theme">個人のタイムカプセル</div>
    <hr>
        <p class="data_text">{{ $future->user->name }}さんが{{ $future->year }}に向けて投稿した思い出です。</p>
    </div>

    @else
    <div class="sample_box_title">
        <div class="data_text">
            <a href="{{ route('future.index.ownpage',['id' => $future->id]) }}">タイムカプセル</a>
        </div>
        <hr>
        <p>{{ $future->user->name }}さんが{{ $future->year }}に向けて投稿した思い出です。</p>
    </div>

    @endif

    @endforeach
    </div>
    <div  di="paginate" class="mt-1 mb-1 row justify-content-center text-danger">
            {{ $futures->links() }}
    </div>
@endauth

</div>

   
</body>
</html>

<style>

</style>

<script>
     $('.slider').slick({
    autoplay: true,//自動的に動き出すか。初期値はfalse。
    infinite: true,//スライドをループさせるかどうか。初期値はtrue。
    slidesToShow: 3,//スライドを画面に3枚見せる
    slidesToScroll: 3,//1回のスクロールで3枚の写真を移動して見せる
    prevArrow: '<div class="slick-prev"></div>',//矢印部分PreviewのHTMLを変更
    nextArrow: '<div class="slick-next"></div>',//矢印部分NextのHTMLを変更
    dots: true,//下部ドットナビゲーションの表示
    responsive: [
      {
      breakpoint: 769,//モニターの横幅が769px以下の見せ方
      settings: {
        slidesToShow: 2,//スライドを画面に2枚見せる
        slidesToScroll: 2,//1回のスクロールで2枚の写真を移動して見せる
      }
    },
    {
      breakpoint: 426,//モニターの横幅が426px以下の見せ方
      settings: {
        slidesToShow: 1,//スライドを画面に1枚見せる
        slidesToScroll: 1,//1回のスクロールで1枚の写真を移動して見せる
      }
    }
  ]
  });
</script>
