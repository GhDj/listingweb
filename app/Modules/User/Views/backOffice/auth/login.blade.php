@extends('backOffice.layout')

@section('head')
    @include('backOffice.inc.head',
    ['title' => 'Jobifier',
    'description' => 'Espace Administratif - Jobifier'
    ])
@endsection

@section('content')
    <style>
        .app-footer
        {
            display:none;
        }
    </style>
<div class="auth-layout-wrap" style="background-image: url(http://gull-html-laravel.ui-lib.com/assets/images/photo-wide-4.jpg)">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6 col-md-offset-4">
                    <div class="p-4">
                        <div class="">
                            <img src="{{ asset('images/logo.png') }}" alt="">
                        </div>
                        <br/>
                        <h1 class="mb-3 text-18">Connexion</h1>
                        <form method="POST" action="{{route('handleAdminLogin')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" required placeholder="Email" class="form-control form-control-rounded" type="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input id="password" placeholder="Mot de passe" name="password" class="form-control form-control-rounded" type="password">
                            </div>
                            <button class="btn btn-rounded btn-block mt-2" style="background-color:#4ebaff">Sign In</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
    <script>
        $(".sidenav-open.d-flex").attr("class","");
    </script>
@endsection