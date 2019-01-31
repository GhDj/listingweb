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
                            <h2>Listings </h2>
                            <div class="breadcrumbs"><a href="#">Accueil</a><a href="#">Profile</a><span>lists</span></div>
                        </div>
                        <div class="row">
                          @include('User::frontOffice.inc.asideProfile')
                            <div class="col-md-9">
                                <div class="dashboard-list-box fl-wrap">
                                    <div class="dashboard-header fl-wrap">
                                        <h3>Indox</h3>
                                        @isset($terrains)
                                          <h3>Terrains</h3>
                                            @endisset
                                      @isset($clubs)
                                        <h3>Clubs</h3>
                                      @endisset


                                    </div>
                                    <!-- dashboard-list end-->



                                      @isset($terrains)

                                          @foreach ($terrains as $terrain)
                                            <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <div class="dashboard-listing-table-image">
                                                     <a href="{{route('showTerrainDetails',$terrain->id)}}"> <img src="@if ($terrain->medias->count() > 0)
                                                                {{  $terrain->medias->first()->link}}
                                                                @else
                                                                {{  asset('images/all/9.jpg')}}
                                                                @endif
                                                              " alt=""></a>
                                                </div>
                                                <div class="dashboard-listing-table-text">
                                                    <h4><a href="{{route('showTerrainDetails',$terrain->id)}}">{{$terrain->name}}</a></h4>
                                                    <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#">{{$terrain->complex->address->address}}</a></span>
                                                    <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="5">
                                                        <span>({{$terrain->reviews->count()}} reviews)</span>
                                                    </div>

                                                </div>
                                            </div>
                                            </div>
                                          @endforeach

                                          {{$terrains->links()}}
                                          @endisset




                                        @isset($clubs)
                                          @foreach ($clubs as $club)
                                            <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <div class="dashboard-listing-table-image">
                                                    <a href="{{route('showClubDetails',$club->id)}}"> <img src="@if ($club->medias->count() > 0)
                                                              {{  $club->medias->first()->link}}
                                                              @else
                                                              {{  asset('images/all/9.jpg')}}
                                                              @endif
                                                            " alt=""></a>
                                                </div>
                                                <div class="dashboard-listing-table-text">
                                                    <h4><a href="{{route('showTerrainDetails',$club->id)}}">{{$club->name}}</a></h4>
                                                    <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#">{{$club->terrain->complex->address->address}}</a></span>
                                                    <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="5">

                                                    </div>

                                                </div>
                                            </div>
                                            </div>
                                          @endforeach
                                          {{$clubs->links()}}
                                        @endisset




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
                <div class="limit-box fl-wrap"></div>
        </div>
    </div>
    <!-- wrapper end -->

@endsection

@section('footer')

  @include('frontOffice.inc.footer')

@endsection
