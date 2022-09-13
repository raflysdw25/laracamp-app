@component('mail::message')
# Register Camp: {{ $checkout->camp->title }}

Hi, {{ $checkout->user->name }}
<br>
Thankyou for register on <b>{{ $checkout->camp->title }}</b>, please see payment instruction by click the button below

@component('mail::button', ['url' => route('dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent