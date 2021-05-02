@component('mail::message')
# Welcome on board

Use this link to sign-in immediately

@component('mail::button', ['url' => $link])
Auto Login
@endcomponent

P.S: Ensure to change password the moment you are logged in.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
