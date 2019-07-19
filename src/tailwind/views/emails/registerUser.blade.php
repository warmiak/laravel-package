@component('mail::message')
## Welcome to {{ config('app.name') }}

Thank you for creating your account. To complete the registration process, please verify your e-mail address.
Verifying your e-mail address ensures that only you have access to your account information.


@component('mail::button', ['url' => env('APP_URL'). '/validate/email/' .$hash])
Click this link
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
