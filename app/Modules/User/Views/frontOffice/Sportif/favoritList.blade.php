@extends('frontOffice.layout')

@section('head')

    @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection


@section('header')

    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'','faq'=>'','profile'=>'act-link','associations'=>'','infrastructure'=>'']])


@endsection
@section('content')
    <style>
        .dashboard-list-box.activities .dashboard-message-text i
        {
            padding:0!important;
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
                            <h2>Mes Favoris</h2>
                            <div class="breadcrumbs"><a href="{{route('showHome')}}">Accueil</a><a href="#">Profile</a><span>Favoris</span></div>
                        </div>
                        <div class="row">
                            @include('User::frontOffice.inc.asideProfile')
                            <div class="col-md-9">
                                <div class="scroll-nav-wrapper fl-wrap" style="z-index: auto; position: relative; top: 0px;">
                                    <div class="container">
                                        <nav class="scroll-nav scroll-init">
                                            <ul>
                                                <li><a class="act-scrlink" href="#Equipements">Equipements</a></li>
                                                <li><a href="#Clubs" class="">Clubs</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="dashboard-list-box fl-wrap activities">
                                    <div class="dashboard-header fl-wrap">
                                        <h3>Equipements</h3>
                                    </div>

                                    <!-- dashboard-list end-->
                                    <div id="Equipements" >
                                        @foreach (Auth::user()->wishlists as $wishlist)





                                                        @if ($wishlist->wished_type == "App\Modules\Complex\Models\Terrain")
                                                            <div class="dashboard-list" id="element{{ $wishlist->wished->id }}">
                                                                <div class="dashboard-message">
                                                                    <div class="dashboard-listing-table-image">
                                                                        <a href="{{route('showTerrainDetails',$wishlist->wished->id)}}"> <img src="@if ($wishlist->wished->medias->count() > 0)
                                                                            {{  $wishlist->wished->medias->first()->link}}
                                                                            @else
                                                                            {{  asset('images/all/9.jpg')}}
                                                                            @endif
                                                                                    " alt=""></a>
                                                                    </div>
                                                                    <div class="dashboard-listing-table-text">
                                                                        <h4><a href="{{route('showTerrainDetails',$wishlist->wished->id)}}">{{$wishlist->wished->name}}</a></h4>

                                                                        <ul class="list-author-widget-contacts list-item-widget-contacts">
                                                                            <li>
                                                                                <span class=""><i class="fa fa-map-marker"></i><a  href="#">{{$wishlist->wished->complex->address->address}}</a></span>
                                                                            </li>
                                                                            <li>
                                                                                <span class=""><i class="fa fa-envelope-o"></i><a  href="#">{{$wishlist->wished->complex->email}}</a></span>
                                                                            </li>
                                                                            <li>
                                                                                <span class=""><i class="fa fa-phone"></i><a  href="#">{{$wishlist->wished->complex->phone}}</a></span>
                                                                            </li>
                                                                            <li>
                                                                                <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="{{$wishlist->wished->reviews->count()}}">
                                                                                    <span>@if($wishlist->wished->reviews->count() > 0)({{$wishlist->wished->reviews->count()}} reviews) @endif</span>
                                                                                </div>
                                                                            </li>
                                                                        </ul>





                                                                        <ul class="dashboard-listing-table-opt  fl-wrap">
                                                                            <li>
                                                                                <a href="{{route('showTerrainDetails',$wishlist->wished->id)}}" class="voir-btn">Voir <i class="fa fa-eye"></i></a>
                                                                            </li>

                                                                            <li>
                                                                                <a href="#" data-terrain="{{ $wishlist->wished->id }}" class="del-btn">Supprimer <i class="fa fa-trash-o"></i></a>
                                                                            </li>
                                                                        </ul>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                                <div class="dashboard-list-box fl-wrap activities">
                                    <div class="dashboard-header fl-wrap">
                                        <h3>Clubs</h3>
                                    </div>
                                    <div id="Clubs" >
                                    @foreach (Auth::user()->wishlists as $wishlist)

                                @if ($wishlist->wished_type == "App\Modules\Complex\Models\Club")
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



                                                                        <ul class="list-author-widget-contacts list-item-widget-contacts">
                                                                            <li>
                                                                                <span class=""><i class="fa fa-map-marker"></i><a  href="#">{{$wishlist->wished->terrain->complex->address->address}}</a></span>
                                                                            </li>
                                                                            <li>
                                                                                <span class=""><i class="fa fa-envelope-o"></i><a  href="#">{{$wishlist->wished->email}}</a></span>
                                                                            </li>
                                                                            <li>
                                                                                <span class=""><i class="fa fa-phone"></i><a  href="#">{{$wishlist->wished->phone}}</a></span>
                                                                            </li>
                                                                            <li>
                                                                                <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="5">

                                                                                </div>
                                                                            </li>
                                                                        </ul>


                                                                        <ul class="dashboard-listing-table-opt  fl-wrap">
                                                                            <li><a href="{{route('showTerrainDetails',$wishlist->wished->id)}}">Voir <i class="fa fa-pencil-square-o"></i></a></li>
                                                                        </ul>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif




                                        @endforeach

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
            <!--  section end -->
            <div class="limit-box fl-wrap"></div>
        </div>
    </div>
    <script>
        $(document).ready(function () {


        $('.del-btn').click(function (e) {
            e.preventDefault();
            var id = "";

            var terrainId = $(this).data('terrain');
            var clubId = $(this).data('club');

            if (terrainId != null) {
                id = terrainId;
                type = "terrain";

            }

            if (clubId) {
                id = clubId;
                type = "club";
            }

            $.get("http://olympiade.prod/public/userWichlist/" + type + "/" + id).done(function (res) {

               // $('#favorieTerrains span').html(res.favorieTerrains);
              //  $('#favorieClubs span').html(res.favorieClubs);
                if (res.status == "added") {
                  //  $('#' + res.type + res.id + '>span').html('<img id="theImg" src="http://olympiade.prod/public/img/like.png" />');
                }
                if (res.status == "deleted") {
                    $('#element'+terrainId).remove();
                   // $('#' + res.type + res.id + '>span').html('<img id="theImg" src="http://olympiade.prod/public/img/unlike.png" />');
                }

            });

        });
        });
    </script>
@endsection
@section('footer')

    @include('frontOffice.inc.footer')

@endsection
