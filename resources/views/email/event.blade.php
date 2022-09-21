@component('mail::message')
Welcome to {{config('app.name')}}.

@component('mail::button', ['url' => $url])
Show Event
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
