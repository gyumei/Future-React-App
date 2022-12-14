@auth
    <div class='paginate'>
            {{ $futures->links() }}
    </div>
    <div class="box5">
    @foreach($futures as $future)

    @if($future->year > $year)
    <x-message.before :future="$future"></x-message.before>

    @elseif($future->year == $year && $future->month > $month)
    <x-message.before :future="$future"></x-message.before>

    @elseif($future->year == $year && $future->month == $month && $future->day <= $day)
    <x-message.after :future="$future"></x-message.after>

    @elseif($future->year == $year && $future->month == $month && $future->day > $day)
    <x-message.before :future="$future"></x-message.before>

    @elseif($future->year == $year && $future->month < $month)
    <x-message.after :future="$future"></x-message.after>

    @elseif($future->year < $year)
    <x-message.after :future="$future"></x-message.after>

    @endif

    @endforeach
    </div>
@endauth

<style>
    .sample_box_title { 
    margin:0 auto;
    padding: 0.5em 0.5em 0.4em;
    text-align: center;
    font-size: 1.3em;/*タイトル文字サイズ*/
    background: #FFCC33	;/*タイトル文字背景色*/
    border-bottom: 3px solid #ff7f00;/*タイトル下線*/
    font-weight: bold;
    letter-spacing: 0.05em;
    width: 23%;
    height: 30%;
    border : solid 5px #333 ;
}

.sample_box_title:hover{
    transform:scale(1.1,1.1);
}

.sample_box_title p {
    margin-bottom: 0;
}
.box5 {
    display:flex;
    flex-wrap:wrap;
    float:left;
    justify-content: space-between;
    gap:10px;
    padding: 0.5em 1em;
    margin: 2em 0;
    border: double 10px #696969;
    width:100%;
}
.box5 p {
    margin: 0; 
    padding: 0;
    height: 100px;
}
</style>