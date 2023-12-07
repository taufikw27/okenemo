<!-- resources/views/emails/user-registered.blade.php -->

@component('mail::message')
# Welcome to Our Site


@component('mail::button', ['url' => 'http://127.0.0.1:8000/password-baru'])
New Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
