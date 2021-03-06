@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection



@section('header')

@section('header')
    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'','faq'=>'','profile'=>'act-link','associations'=>'','infrastructure'=>'']])

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
                          @isset($userTerrains)
                            <h2>List de votre Terrain </h2>
                            <div class="breadcrumbs"><a href="#">Accueil</a><a href="#">Profile</a><span>Votre Terrains</span></div>
                            @endisset
                            @isset($userClubs)
                              <h2>List de votre Clubs </h2>
                              <div class="breadcrumbs"><a href="#">Accueil</a><a href="#">Profile</a><span>Votre Clubs</span></div>
                            @endisset

                        </div>
                        <div class="row">
                          @include('User::frontOffice.inc.asideProfile')
                            <div class="col-md-9">
                                <div class="dashboard-list-box fl-wrap">
                                    <div class="dashboard-header fl-wrap">

                                        @isset($userTerrains)
                                          <h3>Terrains</h3>
                                            <a class="btn btn-primary pull-right" href="{{route('showUserAddTerrain')}}" ><i
                                                            class="fa fa-plus-square-o"></i> Ajouter Des Terrains</a>
                                            @endisset
                                      @isset($userClubs)
                                        <h3>Clubs</h3>
                                      @endisset


                                    </div>
                                    <!-- dashboard-list end-->



                                      @isset($userTerrains)

                                          @foreach ($userTerrains as $terrain)
                                            <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <div class="dashboard-listing-table-image">
                                                     <a href="{{route('showTerrainDetails',$terrain->id)}}">
                                                         <img src="@if ($terrain->medias->count() > 0)
                                                                {{  $terrain->medias->first()->link}}
                                                                @else
                                                                {{  asset('images/all/9.jpg')}}
                                                                @endif
                                                              " alt=""></a>
                                                </div>
                                                <div class="dashboard-listing-table-text">
                                                    <h4>
                                                        <a href="{{route('showTerrainDetails',$terrain->id)}}">{{$terrain->name}}</a>
                                                    </h4>
                                                    <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i>
                                                        <a  href="#">{{$terrain->complex->address->address}}</a>
                                                    </span>
                                                    <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2=" {{ $terrain->reviews->avg('note') }}">
                                                        <span>({{$terrain->reviews->count()}} reviews)</span>
                                                    </div>
                                                    <ul class="dashboard-listing-table-opt  fl-wrap">
                                                        <li><a href="{{route('showUserEditTerrain',$terrain->id)}}">Modifier <i class="fa fa-pencil-square-o"></i></a></li>
                                                        <li><a href="#" class="del-btn">Supprimer <i class="fa fa-trash-o"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            </div>
                                          @endforeach

                                          {{--{{$userTerrains->links()}}--}}
                                          @endisset




                                        @isset($userClubs)
                                          @foreach ($userClubs as $club)
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
                                          {{$userClubs->links()}}
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
