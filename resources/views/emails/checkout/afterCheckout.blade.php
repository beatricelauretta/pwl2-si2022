@component('mail::message')
# Register Camp: {{$checkout->camp->title}}

Hi {{$checkout->user->name}},
<br>Thank you for registering for <b>{{$checkout->camp->title}}</b>. 
Please see the payment instructions by clicking the button below!

@component('mail::button', ['url' => route('user.checkout.invoice', $checkout->id)])
Login here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
