@component('mail::message')
# Register Camp: {{$Checkout->camp->title}}

Hi {{$checkout->user->name}}
<br>Thankyou For Register on<b>{{$Checkout->camp->title}}</b>,
please see payment instruction by click the button below!

@component('mail::button', ['url' => route('user.checkout.invoice', $checkout->id)])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent