<!-- resources/views/emails/user-registered.blade.php -->

@component('mail::message')
# Welcome to Our Site

Thank you for registering. We're excited to have you on board!

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Login Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
