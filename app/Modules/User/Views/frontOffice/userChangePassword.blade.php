@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection



@section('header')

  @include('frontOffice.inc.header')

@endsection

@section('content')
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
                                  <div class="breadcrumbs"><a href="#">Accueil</a><a href="#">Dasboard</a><span>Changer Votre mot de passe</span></div>
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
                                              <div class="pass-input-wrap fl-wrap">
                                                  <label>Current Password</label>
                                                  <input type="password" class="pass-input" placeholder="" value=""/>
                                                  <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                              </div>
                                              <div class="pass-input-wrap fl-wrap">
                                                  <label>New Password</label>
                                                  <input type="password" class="pass-input" placeholder="" value=""/>
                                                  <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                              </div>
                                              <div class="pass-input-wrap fl-wrap">
                                                  <label>Confirm New Password</label>
                                                  <input type="password" class="pass-input" placeholder="" value=""/>
                                                  <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                              </div>
                                              <button class="btn  big-btn  color-bg flat-btn">Save Changes<i class="fa fa-angle-right"></i></button>
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

              </div>
          </div>
          <!-- wrapper end -->
@endsection
@section('footer')

  @include('frontOffice.inc.footer')

@endsection
