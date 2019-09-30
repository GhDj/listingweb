<?php
/**
 * Created by PhpStorm.
 * User: ghdj9
 * Date: 8/21/2019
 * Time: 5:21 PM
 */?>
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
                            <h2>Mes Avis</h2>
                            <div class="breadcrumbs"><a href="{{route('showHome')}}">Accueil</a><a href="#">Profile</a><span>Favoris</span></div>
                        </div>
                        <div class="row">
                            @include('User::frontOffice.inc.asideProfile')
                            <div class="col-md-9">

                                <div class="dashboard-list-box fl-wrap activities">
                                    <div class="dashboard-header fl-wrap">
                                        <h3>Ma Liste</h3>
                                    </div>

                                    <!-- dashboard-list end-->

                                    @foreach (Auth::user()->reviews as $review)
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">


                                                <div class="dashboard-message-text">

                                                    @if ($review->wished_type == "App\Modules\Complex\Models\Terrain" )
                                                        <div class="dashboard-list" id="element{{ $media->id }}">
                                                            <div class="dashboard-message">
                                                                <div class="dashboard-listing-table-image">
                                                                    <a href="{{route('showTerrainDetails',$media->terrain_id)}}">
                                                                        <img src="{{ $medias->link }}" alt=""></a>
                                                                </div>
                                                                <div class="dashboard-listing-table-text">
                                                                    <h4><a href="{{route('showTerrainDetails',$media->terrain_id)}}">{{ \App\Modules\Complex\Models\Terrain::find($media->terrain_id)->first()->name }}</a></h4>
                                                                    <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#">{{ \App\Modules\Complex\Models\Terrain::find($media->terrain_id)->first()->address->address}}</a></span>

                                                                    <ul class="dashboard-listing-table-opt  fl-wrap">
                                                                        <li>
                                                                            <a href="{{route('showTerrainDetails',$media->terrain_id)}}" class="voir-btn">Voir <i class="fa fa-eye"></i></a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="#" data-terrain="{{ $media->terrain_id }}" class="del-btn">Supprimer <i class="fa fa-trash-o"></i></a>
                                                                        </li>
                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endif
                                                    @if ($media->club_id > 0)
                                                        <div class="dashboard-list">
                                                            <div class="dashboard-message">
                                                                <div class="dashboard-listing-table-image">
                                                                    <a href="{{route('showClubDetails',$media->club_id)}}"> <img src="{{  $medias->link}}" alt=""></a>
                                                                </div>
                                                                <div class="dashboard-listing-table-text">
                                                                    <h4><a href="{{route('showClubDetails',$medias->link)}}">{{ \App\Modules\Complex\Models\Club::find($medias->link)->first()->name }}</a></h4>
                                                                    <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#"></a></span>
                                                                    <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="5">

                                                                    </div>
                                                                    <ul class="dashboard-listing-table-opt  fl-wrap">
                                                                        <li><a href="{{route('showClubDetails',$medias->link)}}">Voir <i class="fa fa-pencil-square-o"></i></a></li>
                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                @endforeach



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

