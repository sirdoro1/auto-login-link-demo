@component('mail::message')
# Welcome on board

Use this link to sign-in immediately
{{$link}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
