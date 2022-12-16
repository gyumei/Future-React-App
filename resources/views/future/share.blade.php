@auth
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
    <div class='paginate'>
            {{ $futures->links() }}
    </div>
    </div>
@endauth
