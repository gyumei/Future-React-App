<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@auth
    <div class="box5">
    @foreach($futures as $future)

    @if($future->number == 1)
    <x-message.before :future="$future"></x-message.before>

    @else
    <x-message.after :future="$future"></x-message.after>

    @endif

    @endforeach
    </div>
    <div  di="paginate" class="mt-1 mb-1 row justify-content-center text-danger">
            {{ $futures->links() }}
    </div>
@endauth

<style>
#paginate{
    text-align:center;
    display:inline;
    writing-mode: horizontal-tb;
    color:orange;
    
}
    .sample_box_title { 
    margin:0 auto;
    padding: 0.5em 0.5em 0.4em;
    text-align: center;
    font-size: 1.3em;/*タイトル文字サイズ*/
    background: #FFB74D	;/*タイトル文字背景色*/
    border-bottom: 3px solid #ff7f00;/*タイトル下線*/
    font-weight: bold;
    letter-spacing: 0.05em;
    width: 350px;
    height: 350px;
    border : solid 5px #333 ;
    border-radius: 50%;
}

.sample_box_title:hover{
    transform:scale(1.1,1.1);
}

.sample_box_title p {
    margin-bottom: 0;
}
.box5 {
    background-color: white;/*タイトル文字背景色*/
    display:flex;
    flex-wrap:wrap;
    float:left;
    justify-content: space-between;
    gap: 10px;
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