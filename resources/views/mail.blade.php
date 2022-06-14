@component('mail::message')

{!! $details['body'] !!}

@component('mail::button', ['url' => url('/')])
    Login SIM Diklit
@endcomponent

@endcomponent