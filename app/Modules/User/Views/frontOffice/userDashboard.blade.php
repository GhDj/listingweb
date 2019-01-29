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
                          <h2>User Profile</h2>
                          <div class="breadcrumbs"><a href="#">Accueil</a><span>Profile</span></div>
                      </div>
                      <div class="row">
                        @include('User::frontOffice.inc.asideProfile')
                          <div class="col-md-9">
                              <!-- profile-edit-container-->
                              <div class="profile-edit-container">
                                  <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                      <h4>Salut , <span>Alisa </span></h4>
                                  </div>
                                  <div class="notification success fl-wrap">
                                      <p>Your listing <a href="#">Fitness Center Brooklyn</a> has been approved!</p>
                                      <a class="notification-close" href="#"><i class="fa fa-times"></i></a>
                                  </div>
                                        <!-- statistic-container-->
                                  <div class="statistic-container fl-wrap">
                                  <!-- statistic-item-wrap-->
                                    <div class="statistic-item-wrap">
                                    <div class="statistic-item gradient-bg fl-wrap">
                                        <i class="fa fa-map-marker"></i>
                                          <div class="statistic-item-numder">21</div>
                                          <h5>Active Listings</h5>
                                      </div>
                                      </div>
                                  <!-- statistic-item-wrap end-->
                                  <!-- statistic-item-wrap-->
                                    <div class="statistic-item-wrap">
                                    <div class="statistic-item gradient-bg fl-wrap">
                                        <i class="fa fa fa-eye"></i>
                                          <div class="statistic-item-numder">1054</div>
                                          <h5>Listing Views</h5>
                                      </div>
                                      </div>
                                  <!-- statistic-item-wrap end-->
                                  <!-- statistic-item-wrap-->
                                    <div class="statistic-item-wrap">
                                    <div class="statistic-item gradient-bg fl-wrap">
                                        <i class="fa fa-comments-o"></i>
                                          <div class="statistic-item-numder">675</div>
                                          <h5>Total Reviews</h5>
                                      </div>
                                      </div>
                                  <!-- statistic-item-wrap end-->
                                  <!-- statistic-item-wrap-->
                                    <div class="statistic-item-wrap">
                                    <div class="statistic-item gradient-bg fl-wrap">
                                        <i class="fa fa-heart-o"></i>
                                          <div class="statistic-item-numder">154</div>
                                          <h5>Times Bookmarked</h5>
                                      </div>
                                      </div>
                                  <!-- statistic-item-wrap end-->
                                  </div>
                <!-- statistic-container end-->
                              </div>
                              <!-- profile-edit-container end-->

                              <div class="dashboard-list-box fl-wrap activities">
                                  <div class="dashboard-header fl-wrap">
                                      <h3>Recent Activities</h3>
                                  </div>
                                  <!-- dashboard-list end-->
                                  <div class="dashboard-list">
                                      <div class="dashboard-message">
                                          <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                          <div class="dashboard-message-text">
                                              <p><i class="fa fa-check"></i> Your listing <a href="#">Luxury Restourant</a> has been approved! </p>

                                          </div>
                                      </div>
                                  </div>
                                  <!-- dashboard-list end-->
                                  <!-- dashboard-list end-->
                                  <div class="dashboard-list">
                                      <div class="dashboard-message">
                                          <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                          <div class="dashboard-message-text">
                                              <p><i class="fa fa-heart"></i>Someone bookmarked your <a href="#">Event In City Mol</a> listing!</p>

                                          </div>
                                      </div>
                                  </div>
                                  <!-- dashboard-list end-->
                                  <!-- dashboard-list end-->
                                  <div class="dashboard-list">
                                      <div class="dashboard-message">
                                          <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                          <div class="dashboard-message-text">
                                              <p><i class="fa fa-comments-o"></i> Someone left a review on <a href="#">Gym in the Center</a> listing!</p>

                                          </div>
                                      </div>
                                  </div>
                                  <!-- dashboard-list end-->
                                  <!-- dashboard-list end-->
                                  <div class="dashboard-list">
                                      <div class="dashboard-message">
                                          <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                          <div class="dashboard-message-text">
                                              <p><i class="fa fa-check"></i> Your listing <a href="#">Luxury Restourant</a> has been approved! </p>

                                          </div>
                                      </div>
                                  </div>
                                  <!-- dashboard-list end-->
                                  <!-- dashboard-list end-->
                                  <div class="dashboard-list">
                                      <div class="dashboard-message">
                                          <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                          <div class="dashboard-message-text">
                                              <p><i class="fa fa-heart"></i>Someone bookmarked your <a href="#">Event In City Mol</a> listing!</p>

                                          </div>
                                      </div>
                                  </div>
                                  <!-- dashboard-list end-->
                                  <!-- dashboard-list end-->
                                  <div class="dashboard-list">
                                      <div class="dashboard-message">
                                          <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                          <div class="dashboard-message-text">
                                              <p><i class="fa fa-comments-o"></i> Someone left a review on <a href="#">Gym in the Center</a> listing!</p>

                                          </div>
                                      </div>
                                  </div>
                                  <!-- dashboard-list end-->
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

@endsection
@section('footer')

  @include('frontOffice.inc.footer')

@endsection
