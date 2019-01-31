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
                                      <h4>Salut , <span>{{Auth::user()->first_name}} {{Auth::user()->last_name}} </span></h4>
                                  </div>
                                        <!-- statistic-container-->
                                  <div class="statistic-container fl-wrap">
                                  <!-- statistic-item-wrap-->
                                  @if (checkProfessionnelRole(Auth::user()))


                                    <div class="statistic-item-wrap">
                                    <div class="statistic-item gradient-bg fl-wrap">
                                        <i class="fa fa-map-marker"></i>
                                          <div class="statistic-item-numder">{{Auth::user()->complexes->count()}}</div>
                                          <h5>Complexe</h5>
                                      </div>
                                      </div>
                                  <!-- statistic-item-wrap end-->
                                  <!-- statistic-item-wrap-->
                                    <div class="statistic-item-wrap">
                                    <div class="statistic-item gradient-bg fl-wrap">

                                          <div class="statistic-item-numder">{{$terrains->count()}}</div>
                                          <h5>Terrains</h5>
                                      </div>
                                      </div>

                                      <div class="statistic-item-wrap">
                                      <div class="statistic-item gradient-bg fl-wrap">

                                            <div class="statistic-item-numder">{{$clubs->count()}}</div>
                                            <h5>Clubs</h5>
                                        </div>
                                        </div>
                                    <!-- statistic-item-wrap end-->

                                    @endif
                                  <!-- statistic-item-wrap end-->
                                  <!-- statistic-item-wrap-->
                                  @if (checkInternauteRole(Auth::user()))
                                    <div class="statistic-item-wrap">
                                    <div class="statistic-item gradient-bg fl-wrap">
                                        <i class="fa fa-comments-o"></i>
                                          <div class="statistic-item-numder">{{Auth::user()->reviews->count()}}</div>
                                          <h5>Total Commantaires</h5>
                                      </div>
                                      </div>
                                  <!-- statistic-item-wrap end-->
                                  <!-- statistic-item-wrap-->
                                    <div class="statistic-item-wrap">
                                    <div class="statistic-item gradient-bg fl-wrap">
                                        <i class="fa fa-heart-o"></i>
                                          <div class="statistic-item-numder">{{Auth::user()->wishlists->count()}}</div>
                                          <h5>Aimé</h5>
                                      </div>
                                      </div>
                                    @endif
                                  <!-- statistic-item-wrap end-->
                                  </div>
                <!-- statistic-container end-->
                              </div>
                              <!-- profile-edit-container end-->

                              <div class="dashboard-list-box fl-wrap activities">
                                  <div class="dashboard-header fl-wrap" style="color:black;">
                                      <h3>Recent Activities</h3>
                                  </div>

                                  <!-- dashboard-list end-->
                                  @if (checkInternauteRole(Auth::user()))
                                  @foreach (Auth::user()->wishlists as $wishlist)
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                            <div class="dashboard-message-text">

                                          @if ($wishlist->wished_type == "App\Modules\Infrastructures\Models\Terrain")
                                            <p><i class="fa fa-heart"></i>vous avez aimé <a href="{{route('showTerrainDetails',$wishlist->wished->id)}}">{{$wishlist->wished->name}}</a> listing!</p>
                                          @endif
                                          @if ($wishlist->wished_type == "App\Modules\Infrastructures\Models\Club")
                                            <p><i class="fa fa-heart"></i>vous avez aimé <a href="{{route('showClubDetails',$wishlist->wished->id)}}">{{$wishlist->wished->name}}</a> listing!</p>
                                          @endif

                                            </div>
                                        </div>
                                    </div>
                                  @endforeach

                                  <!-- dashboard-list end-->
                                  <!-- dashboard-list end-->
                              @foreach (Auth::user()->reviews as $review)
                                  <div class="dashboard-list">
                                      <div class="dashboard-message">
                                          <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                          <div class="dashboard-message-text">
                                              @if ($review->reviewed_type == "App\Modules\Infrastructures\Models\Terrain")
                                              <p><i class="fa fa-comments-o"></i> Vous Avez commenté sur <a href="{{route('showTerrainDetails',$review->reviewed->id)}}">{{$review->reviewed->name}}</a> </p>
                                            @endif
                                            @if ($review->reviewed_type ==  "App\Modules\Infrastructures\Models\Club")
                                              <p><i class="fa fa-heart"></i>vous avez aimé <a href="{{route('showClubDetails',$review->reviewed->id)}}">{{$review->reviewed->name}}</a> listing!</p>
                                            @endif

                                          </div>
                                      </div>
                                  </div>
                                @endforeach
                              @endif

                              @if (checkProfessionnelRole(Auth::user()))
                              @foreach ($terrains as $terrain)
                                @foreach ($terrain->wishlists as $wishlist)

                                  <div class="dashboard-list">
                                      <div class="dashboard-message">
                                          <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                          <div class="dashboard-message-text">


                                          <p><i class="fa fa-heart"></i>{{$wishlist->wisher->first_name}} a aimé <a href="{{route('showTerrainDetails',$wishlist->wished->id)}}">{{$wishlist->wished->name}}</a> listing!</p>

                                          </div>
                                      </div>
                                  </div>
                                @endforeach
                              @endforeach

                              @foreach ($clubs as $club)
                                @foreach ($club->wishlists as $wishlist)

                                  <div class="dashboard-list">
                                      <div class="dashboard-message">
                                          <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                          <div class="dashboard-message-text">


                                          <p><i class="fa fa-heart"></i>{{$wishlist->wisher->first_name}} a aimé  <a href="{{route('showClubDetails',$wishlist->wished->id)}}">{{$wishlist->wished->name}}</a> listing!</p>

                                          </div>
                                      </div>
                                  </div>
                                @endforeach
                              @endforeach

                              <!-- dashboard-list end-->
                              <!-- dashboard-list end-->

                              @foreach ($terrains as $terrain)
                                @foreach ($terrain->reviews as $review)

                                  <div class="dashboard-list">
                                      <div class="dashboard-message">
                                          <span class="new-dashboard-item"><i class="fa fa-times"></i></span>
                                          <div class="dashboard-message-text">
                                          <p><i class="fa fa-comments-o"></i>{{$review->reviewer->first_name}} a Commanté <a href="{{route('showTerrainDetails',$review->reviewed->id)}}">{{$review->reviewed->name}}</a> listing!</p>

                                          </div>
                                      </div>
                                  </div>
                                @endforeach
                              @endforeach

                          @endif
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
          <!--  section end -->
            <div class="limit-box fl-wrap"></div>
</div>
  </div>

@endsection
@section('footer')

  @include('frontOffice.inc.footer')

@endsection
