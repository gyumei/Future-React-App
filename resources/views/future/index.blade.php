<x-layout title="タイムカプセル" :me="$me">
<div class="title">あなたの思いを未来へ</div>
    
<x-message></x-message>
<x-photo></x-photo>
<x-search></x-search>
<x-time :futures="$futures" :year="$year" :month="$month" :day="$day"></x-time>

</x-layout>

<style>
@charset "utf-8";

/*==================================================
スライダーのためのcss
===================================*/
.slider {/*横幅94%で左右に余白を持たせて中央寄せ*/
   width:94%;
    margin:0 auto;
}

.slider img {
    width:100%;/*スライダー内の画像を横幅100%に*/
    height:auto;
}

/*slickのJSで書かれるタグ内、スライド左右の余白調整*/

.slider .slick-slide {
    margin:0 10px;
}

/*矢印の設定*/

/*戻る、次へ矢印の位置*/
.slick-prev, 
.slick-next {
    position: absolute;/*絶対配置にする*/
    top: 42%;
    cursor: pointer;/*マウスカーソルを指マークに*/
    outline: none;/*クリックをしたら出てくる枠線を消す*/
    border-top: 2px solid #666;/*矢印の色*/
    border-right: 2px solid #666;/*矢印の色*/
    height: 15px;
    width: 15px;
}

.slick-prev {/*戻る矢印の位置と形状*/
    left: -1.5%;
    transform: rotate(-135deg);
}

.slick-next {/*次へ矢印の位置と形状*/
    right: -1.5%;
    transform: rotate(45deg);
}

/*ドットナビゲーションの設定*/

.slick-dots {
    text-align:center;
  margin:20px 0 0 0;
}

.slick-dots li {
    display:inline-block;
  margin:0 5px;
}

.slick-dots button {
    color: transparent;
    outline: none;
    width:8px;/*ドットボタンのサイズ*/
    height:8px;/*ドットボタンのサイズ*/
    display:block;
    border-radius:50%;
    background:#ccc;/*ドットボタンの色*/
}

.slick-dots .slick-active button{
    background:#333;/*ドットボタンの現在地表示の色*/
}


/*========= レイアウトのためのCSS ===============*/
.form{
    position: absolute;
    top: 1170px;
    right: 30px;
}

.title{
    text-align:center;
    padding:200px 0;
    font-weight: bold;
    font-size: 50px;
    background: #fff2e4;/*背景色*/
}

.hoge{
border:0;
padding:10px;
font-size:1.3em;
font-family:Arial, sans-serif;
color:#aaa;
border:solid 1px #ccc;
margin:0 0 20px;
width:300px;
}
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
