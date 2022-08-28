@if (filter_var($ip, FILTER_VALIDATE_IP))
    {{ dd('TRUE') }}
@else
    {{ dd('FALSE') }}
@endif
