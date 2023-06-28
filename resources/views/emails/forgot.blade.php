@component('mail::message')
Hello {{ $user->name }}
<p>Kami paham terkadang itu terjadi.</p>

@component('mail::button', ['url' => url('reset/ $user->remember_token')])
Reset Password Anda
<p>Terimakasih</p>
{{ config('app.name') }}
@endcomponent
