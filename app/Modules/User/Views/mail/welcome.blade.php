Bonjour {{ $user->first_name }},
@if(isset($password))
    Votre mot de passe est : {{$password}}
@endif
Cliquez sur le lien ci-dessous pour activer votre compte. :

<a href="{{ $validationLink }}">Activate your account !</a>

<!-- todo email template-->