Kliknij żeby zresetować hasło
<a href="{{ $link = url('password/reset', $token).
'?email='.urlencode($user->getEmailForPasswordReset()) }}">
    {{ $link }} </a>
