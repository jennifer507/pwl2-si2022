@component('mail::message')
# Register Camp: {{ $checkout->camp->title }}

Hi {{ $checkout->user->name }},
<br>Thank you for registering on <b>{{ $checkout->camp->title }}</b>. Please see payment instructions by clicking the button below!

@component('mail::button', ['url' => route('user.checkout.invoice', $checkout->id)])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
