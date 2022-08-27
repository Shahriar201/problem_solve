
@foreach ($array as $key => $value)
    @if ($value['speed'] > 60)
        {{ $value['speed'] }} <br>
    @endif
@endforeach
