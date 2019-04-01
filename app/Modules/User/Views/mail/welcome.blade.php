Hi {{ $user->first_name }},
@if($password)
    Votre mot de passe est : {{$password}}
@endif
Click the link below to activate your account :

<a href="{{ $validationLink }}">Activate your account !</a>

<!-- todo email template-->