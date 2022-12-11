<h1>他人のページです</h1>

<p>あなたは{{ $otherpage->name }}です</p>

<a href="{{ route('future.follow',['id' => $otherpage->id]) }}">[フォロー]</a>
<br>

<br>
<button class="btn">フォローする</button>

<a href="{{ route('future.index') }}">戻る</a>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$('.btn').on('click', function () {
  if ($(this).text() === 'フォローする') {
    $(this).text('解除する');
  } else {
    $(this).text('フォローする');
  }
});
</script>
