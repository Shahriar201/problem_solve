Total: ({{ $total }})“Total count of the speeds those crossed 60” <br><br>
List: <br><br>

@foreach ($array as $key => $value)
    @if ($value['speed'] > 60)
        {{ $value['speed'] }} <br>
    @endif
@endforeach
