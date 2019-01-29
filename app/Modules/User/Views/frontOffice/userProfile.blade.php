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
              <section>
                  <!-- container -->
                  <div class="container">
                      <!-- profile-edit-wrap -->
                      <div class="profile-edit-wrap">
                          <div class="profile-edit-page-header">
                              <h2>Edit profile</h2>
                              <div class="breadcrumbs"><a href="#">Accueil</a><a href="#">Profile</a><span>Votre Profile</span></div>
                          </div>
                          <div class="row">
                            @include('User::frontOffice.inc.asideProfile')
                              <div class="col-md-7">
                                  <!-- profile-edit-container-->
                                  <div class="profile-edit-container">
                                      <div class="profile-edit-header fl-wrap">
                                          <h4>My Account</h4>
                                      </div>
                                      <div class="custom-form">
                                          <label>Your Name <i class="fa fa-user-o"></i></label>
                                          <input type="text" placeholder="AlisaNoory" value=""/>
                                          <label>Email Address<i class="fa fa-envelope-o"></i>  </label>
                                          <input type="text" placeholder="AlisaNoory@domain.com" value=""/>
                                          <label>Phone<i class="fa fa-phone"></i>  </label>
                                          <input type="text" placeholder="+7(123)987654" value=""/>
                                          <label> Adress <i class="fa fa-map-marker"></i>  </label>
                                          <input type="text" placeholder="USA 27TH Brooklyn NY" value=""/>
                                          <label> Website <i class="fa fa-globe"></i>  </label>
                                          <input type="text" placeholder="themeforest.net" value=""/>
                                          <label> Notes</label>
                                          <textarea cols="40" rows="3" placeholder="About Me"></textarea>
                                      </div>
                                  </div>
                                  <!-- profile-edit-container end-->
                                  <!-- profile-edit-container-->
                                  <div class="profile-edit-container add-list-container">
                                      <div class="profile-edit-header fl-wrap">
                                          <h4>Tariff plan</h4>
                                      </div>
                                      <div class="custom-form">
                                          <div class="row">
                                              <!--col -->
                                              <div class="col-md-4">
                                                  <div class="add-list-media-header">
                                                      <label class="radio inline">
                                                      <input type="radio" name="gender">
                                                      <span>Basic 99$</span>
                                                      </label>
                                                  </div>
                                              </div>
                                              <!--col end-->
                                              <!--col -->
                                              <div class="col-md-4">
                                                  <div class="add-list-media-header">
                                                      <label class="radio inline">
                                                      <input type="radio" name="gender"  checked>
                                                      <span>Extended 99$</span>
                                                      </label>
                                                  </div>
                                              </div>
                                              <!--col end-->
                                              <!--col -->
                                              <div class="col-md-4">
                                                  <div class="add-list-media-header">
                                                      <label class="radio inline">
                                                      <input type="radio" name="gender">
                                                      <span>Professional 149$</span>
                                                      </label>
                                                  </div>
                                              </div>
                                              <!--col end-->
                                          </div>
                                      </div>
                                  </div>
                                  <!-- profile-edit-container end-->
                                  <!-- profile-edit-container-->
                                  <div class="profile-edit-container">
                                      <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                          <h4>My Socials</h4>
                                      </div>
                                      <div class="custom-form">
                                          <label>Facebook <i class="fa fa-facebook"></i></label>
                                          <input type="text" placeholder="https://www.facebook.com/" value=""/>
                                          <label>Twitter<i class="fa fa-twitter"></i>  </label>
                                          <input type="text" placeholder="https://twitter.com/" value=""/>
                                          <label>Vkontakte<i class="fa fa-vk"></i>  </label>
                                          <input type="text" placeholder="vk.com" value=""/>
                                          <label> Whatsapp <i class="fa fa-whatsapp"></i>  </label>
                                          <input type="text" placeholder="https://www.whatsapp.com" value=""/>
                                          <button class="btn  big-btn  color-bg flat-btn">Save Changes<i class="fa fa-angle-right"></i></button>
                                      </div>
                                  </div>
                                  <!-- profile-edit-container end-->
                              </div>
                              <div class="col-md-2">
                                  <div class="edit-profile-photo fl-wrap">
                                      <img src="images/avatar/4.jpg" class="respimg" alt="">
                                      <div class="change-photo-btn">
                                          <div class="photoUpload">
                                              <span><i class="fa fa-upload"></i> Upload Photo</span>
                                              <input type="file" class="upload">
                                          </div>
                                      </div>
                                  </div>
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
