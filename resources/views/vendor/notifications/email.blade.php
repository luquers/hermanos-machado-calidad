@component('mail::message')

**¡Hola!**
        
@lang('You are receiving this email because we received a password reset request for your account.')

@component('mail::button', ['url' => $url])
@lang('Reset Password')
@endcomponent

@lang('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')])
<br><br>
@lang('If you did not request a password reset, no further action is required.')
<br><br>
@lang('Regards'),<br>
{{ config('app.name') }}
@endcomponent