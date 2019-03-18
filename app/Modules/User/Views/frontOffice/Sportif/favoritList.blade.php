@extends('frontOffice.layout')

@section('head')

    @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection

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
                        <div class="breadcrumbs"><a href="{{route('showHome')}}">Accueil</a><span>Profile</span></div>
                    </div>
                    <div class="row">
                        @include('User::frontOffice.inc.asideProfile')
                        <div class="col-md-9">
                            <!-- profile-edit-container-->
                            <div class="profile-edit-container">
                                <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                    <h4>Salut , <span>{{Auth::user()->first_name}} {{Auth::user()->last_name}} </span>
                                    </h4>
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

                                                <div class="statistic-item-numder">{{$userTerrains->count()}}</div>
                                                <h5>Terrains</h5>
                                            </div>
                                        </div>

                                        <div class="statistic-item-wrap">
                                            <div class="statistic-item gradient-bg fl-wrap">

                                                <div class="statistic-item-numder">{{$userClubs->count()}}</div>
                                                <h5>Clubs</h5>
                                            </div>
                                        </div>
                                        <!-- statistic-item-wrap end-->

                                    @endif
                                <!-- statistic-item-wrap end-->
                                    <!-- statistic-item-wrap-->

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
                                                        <div class="dashboard-list">
                                                            <div class="dashboard-message">
                                                                <div class="dashboard-listing-table-image">
                                                                    <a href="{{route('showTerrainDetails',$wishlist->wished->id)}}"> <img src="@if ($wishlist->wished->medias->count() > 0)
                                                                        {{  $terrain->medias->first()->link}}
                                                                        @else
                                                                        {{  asset('images/all/9.jpg')}}
                                                                        @endif
                                                                                " alt=""></a>
                                                                </div>
                                                                <div class="dashboard-listing-table-text">
                                                                    <h4><a href="{{route('showTerrainDetails',$wishlist->wished->id)}}">{{$wishlist->wished->name}}</a></h4>
                                                                    <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#">{{$wishlist->wished->complex->address->address}}</a></span>
                                                                    <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="5">
                                                                        <span>({{$wishlist->wished->reviews->count()}} reviews)</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endif
                                                    @if ($wishlist->wished_type == "App\Modules\Infrastructures\Models\Club")
                                                            <div class="dashboard-list">
                                                                <div class="dashboard-message">
                                                                    <div class="dashboard-listing-table-image">
                                                                        <a href="{{route('showClubDetails',$wishlist->wished->id)}}"> <img src="@if ($wishlist->wished->medias->count() > 0)
                                                                            {{  $wishlist->wished->medias->first()->link}}
                                                                            @else
                                                                            {{  asset('images/all/9.jpg')}}
                                                                            @endif
                                                                                    " alt=""></a>
                                                                    </div>
                                                                    <div class="dashboard-listing-table-text">
                                                                        <h4><a href="{{route('showTerrainDetails',$wishlist->wished->id)}}">{{$wishlist->wished->name}}</a></h4>
                                                                        <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#">{{$wishlist->wished->terrain->complex->address->address}}</a></span>
                                                                        <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="5">

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                @if (checkProfessionnelRole(Auth::user()))
                                    @foreach ($userTerrains as $terrain)
                                        @foreach ($terrain->wishlists as $wishlist)

                                            <div class="dashboard-list">
                                                <div class="dashboard-message">
                                                    <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                                    <div class="dashboard-message-text">


                                                        <p><i class="fa fa-heart"></i>{{$wishlist->wisher->first_name}}
                                                            a aimé <a
                                                                    href="{{route('showTerrainDetails',$wishlist->wished->id)}}">{{$wishlist->wished->name}}</a>
                                                            listing!</p>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach

                                    @foreach ($userClubs as $club)
                                        @foreach ($club->wishlists as $wishlist)

                                            <div class="dashboard-list">
                                                <div class="dashboard-message">
                                                    <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                                    <div class="dashboard-message-text">


                                                        <p><i class="fa fa-heart"></i>{{$wishlist->wisher->first_name}}
                                                            a aimé <a
                                                                    href="{{route('showClubDetails',$wishlist->wished->id)}}">{{$wishlist->wished->name}}</a>
                                                            listing!</p>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach

                                <!-- dashboard-list end-->
                                    <!-- dashboard-list end-->

                                    @foreach ($userTerrains as $terrain)
                                        @foreach ($terrain->reviews as $review)

                                            <div class="dashboard-list">
                                                <div class="dashboard-message">
                                                    <span class="new-dashboard-item"><i class="fa fa-times"></i></span>
                                                    <div class="dashboard-message-text">
                                                        <p>
                                                            <i class="fa fa-comments-o"></i>{{$review->reviewer->first_name}}
                                                            a Commanté <a
                                                                    href="{{route('showTerrainDetails',$review->reviewed->id)}}">{{$review->reviewed->name}}</a>
                                                            listing!</p>

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

@section('header')

    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'','faq'=>'','profile'=>'act-link']])

@endsection
@section('content')
@endsection
@section('footer')

    @include('frontOffice.inc.footer')

@endsection
