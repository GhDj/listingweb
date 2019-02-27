@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection



@section('header')

    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'','faq'=>'','profile'=>'act-link']])

@endsection

@section('content')
  <style media="screen">
    .test span{
      margin-top: 0px;
      position: static !important;
    }
  </style>
  <!-- wrapper -->
          <div id="wrapper">
              <!--content -->
              <div class="content">
                  <!--section -->
                  <section id="sec1">
                      <!-- container -->
                      <div class="container">
                          <!-- profile-edit-wrap -->
                          <div class="profile-edit-wrap">
                              <div class="profile-edit-page-header">
                                  <h2>Changer Votre mot de passe</h2>
                                  <div class="breadcrumbs"><a href="#">Accueil</a><a href="#">Profile</a><span>Changer Votre mot de passe</span></div>
                              </div>
                              <div class="row">
                                  @include('User::frontOffice.inc.asideProfile')
                                  <div class="col-md-9">
                                      <!-- profile-edit-container-->
                                      <div class="profile-edit-container">
                                          <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                              <h4>Changer votre mot de passe</h4>
                                          </div>
                                          <div class="custom-form no-icons">
                                            <form  action="{{route('handleUpdateUserPassword')}}" method="post">
                                              {{ csrf_field() }}
                                              <div class="pass-input-wrap fl-wrap" style="margin-bottom:20px;">
                                                  <label>Actuelle mot de passe</label>
                                                  <input type="password" class="pass-input" placeholder="" name = "oldPassword" style="margin-bottom:0px"/>
                                                  <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                                  <div class="test">
                                                    @if ($errors->has('oldPassword'))
                                                    <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('oldPassword') }}</strong>
                                                    </span>
                                                    @endif
                                                  </div>
                                              </div>
                                              <div class="pass-input-wrap fl-wrap">
                                                  <label>Nouveau mot de passe</label>
                                                  <input id="password" type="password" class="pass-input" name="password" style="margin-bottom:0px"/>
                                                  <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                                <div class="test">
                                                  @if ($errors->has('password'))
                                                  <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                  </span>
                                                  @endif
                                                </div>
                                              </div>
                                              <div class="pass-input-wrap fl-wrap">
                                                  <label>Confirmation Mot de Passe</label>
                                                  <input id="password_confirm" type="password" class="pass-input" name="password_confirmation"/>
                                                  <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                                  <div class="test">
                                                    @if ($errors->has('password_confirmation'))
                                                    <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                    </span>
                                                    @endif
                                                  </div>
                                              </div>
                                              <button class="btn  big-btn  color-bg flat-btn">Save Changes<i class="fa fa-angle-right"></i></button>
                                            </form>

                                          </div>
                                      </div>
                                      <!-- profile-edit-container end-->
                                  </div>
                              </div>
                          </div>
                          <!--profile-edit-wrap end -->
                      </div>
                      <!--container end -->
                  </section>
                  <!-- section end -->
                      <div class="limit-box fl-wrap"></div>
              </div>
          </div>
          <!-- wrapper end -->
@endsection
@section('footer')

  @include('frontOffice.inc.footer')

@endsection
