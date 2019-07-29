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
<div class="auth-layout-wrap" style="background-image: url(https://www.wildwoodsportscomplex.com/wp-content/uploads/2018/10/Sports_Complex_2-1.jpg)">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6 col-md-offset-4">
                    <div class="p-4">
                        <div class="">
                            <img src="{{ asset('images/logo.png') }}" alt="">
                        </div>
                        <br/>
                        <h1 class="mb-3 text-18">Se Connecter</h1>
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
                            <button class="btn btn-rounded btn-block mt-2" style="background-color:#4ebaff">Connexion</button>

                        </form>
                    </div>
                </div>

                <div class="col-md-6 text-center " style="background-size: cover;background-image: url(https://www.gemblouxomnisport.be/wp-content/uploads/2016/08/terrain-1010x500.jpg">
                    <div class="pr-3 auth-right">

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