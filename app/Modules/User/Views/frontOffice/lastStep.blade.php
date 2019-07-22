@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection



@section('header')

    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'','faq'=>'','profile'=>'act-link','associations' =>'','infrastructure'=>'']])

@endsection

@section('content')
  <style media="screen">
    .custom-form .custom-select{
      background-color: DodgerBlue;
      color: white;
      width: 100%;
      margin-bottom: 15px;

    }

    .custom-select {
      -webkit-tap-highlight-color: transparent;
      border-radius: 5px;
      border: solid 1px #e8e8e8;
      box-sizing: border-box;
      clear: both;
      cursor: pointer;
      display: block;
      float: left;
      font-family: inherit;
      font-size: 13px;
      font-weight: normal;
      font-weight: 400;
      height: 48px;
      line-height: 48px;
      outline: none;
      padding-left: 18px;
      padding-right: 30px;
      position: relative;
      text-align: left !important;
      -webkit-transition: all 0.2s ease-in-out;
      transition: all 0.2s ease-in-out;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      white-space: nowrap;
      width: auto;
    }

    .main-register-form input {
      margin-bottom: 0;
    }

    .invalid-feedback strong{
        color: red;
    }

    .form-group{
      margin-bottom:20px;
    }

  .custum-form label{
  color: red;
  }
  </style>

  <div id="wrapper">

      <!--content -->
      <div class="content">
          <!--section -->
          <section id="sec1">
              <!-- container -->
              <div>

                <div class="custom-form">
                  <form method="post" name="registerform" class="main-register-form complete-profile" id="main-register-form2" action="{{ route('handleUserCompleteProfile') }}">
                    {{ csrf_field() }}

                <div class="form-group row">

                    <h3>Inscription Comme * </h3>


                    <div class="row">
                        <!--col -->
                        <div class="form-group col-md-6">

                                <label class="radio inline">
                                    <input type="radio" name="role" value="2" checked>
                                    <span>Responsable Complexe privé</span>
                                </label>

                        </div>
                        <!--col end-->
                        <!--col -->
                        <div class="form-group col-md-6">

                                <label class="radio inline">
                                    <input type="radio" name="role" value="5">
                                    <span>Sportif</span>
                                </label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">

                                <label class="radio inline">
                                    <input type="radio" name="role" value="3">
                                    <span>Responsable Complexe public</span>
                                </label>

                        </div>

                        <div class="form-group col-md-6">

                                <label class="radio inline">
                                    <input type="radio" name="role" value="4">
                                    <span>Responsable club</span>
                                </label>

                        </div>
                        <!--col end-->
                    </div>

                </div>

                    <div class="form-group row">
                      <label for="lastName"> Nom * </label>
                      <div class="col-md-12">
                        <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{Auth::user()->first_name}}" value="" onClick="this.select()" required>
                        @if ($errors->has('lastName'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('lastName') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="firstName"> Prénom * </label>
                      <div class="col-md-12">
                        <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{Auth::user()->last_name}}" onClick="this.select()" required>
                        @if ($errors->has('firstName'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('firstName') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>



                    <div class="form-group row">
                      <label for="lastName"> Email * </label>
                      <div class="col-md-12">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" onClick="this.select()" required>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>

                    <h3> Genre </h3>

                          <div class="row form-group">
                              <label class="radio">
                                  <input type="radio" name="gender" value="1"> <span>Homme</span> </label>
                          </div>
                          <div class="row form-group">
                              <label class="radio">
                                  <input type="radio" name="gender"  value="2"> <span>Femme</span> </label></div>


                    <input type="hidden" name="latitude" id="latitude">

                    <input type="hidden" name="longitude" id="longitude">

                    <input type="hidden" name="city" id="city">

                    <input type="hidden" name="country" id="country">

                    <input type="hidden" name="code" id="code">

                    <input type="hidden" name="street" id="street">

                    <input type="hidden" name="locality" id="locality">
                    <div class="form-group row">
                      <label for ="ad">Adresse * </label>
                      <div class="col-md-12">
                        <input  id="autocomplete-input" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" />
                        @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>

                    {{--<div class="form-group row">
                      <label for="password"> Mot de passe * </label>
                      <div class="col-md-12">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" onClick="this.select()" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="password_confirm">Veuillez Confirmez Votre Mode De Passe</label>
                      <div class="col-md-12">
                        <input id="password_confirm" type="password" name="password_confirmation" onClick="this.select()" required>
                      </div>
                    </div>--}}

                    <button type="submit" class="log-submit-btn"><span>Enregistrer</span></button>
                  </form>
                </div>

              </div>

            </section>

          </div>

          <div>

@endsection
