<?php
/**
 * Created by PhpStorm.
 * User: ghdj9
 * Date: 8/22/2019
 * Time: 11:34 PM
 */
?>

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
                            <h2>Mes Photos</h2>
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

                                        @foreach (Auth::user()->medias as $media)





                                                        @if ($media->terrain_id)
                                                            <div class="dashboard-list" id="element{{ $media->id }}">
                                                                <div class="dashboard-message">
                                                                    <div class="dashboard-listing-table-image">
                                                                        <a href="{{route('showTerrainDetails',$media->terrain_id)}}">
                                                                            <img src="@if ($media->link) {{  $media->link}} @endif" alt=""></a>
                                                                    </div>
                                                                    <div class="dashboard-listing-table-text">
                                                                        <h4><a href="{{route('showTerrainDetails',$media->terrain_id)}}">{{ \App\Modules\Complex\Models\Terrain::find($media->terrain_id)->first()->name }}</a></h4>
                                                                        <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#">{{\App\Modules\Complex\Models\Terrain::find($media->terrain_id)->first()->complex->address->address}}</a></span>
                                                                        <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="{{\App\Modules\Complex\Models\Terrain::find($media->terrain_id)->first()->reviews->count()}}">
                                                                            <span>@if(\App\Modules\Complex\Models\Terrain::find($media->terrain_id)->first()->reviews->count() > 0)({{\App\Modules\Complex\Models\Terrain::find($media->terrain_id)->first()->reviews->count()}} reviews) @endif</span>
                                                                        </div>
                                                                        <ul class="dashboard-listing-table-opt  fl-wrap">
                                                                            <li>
                                                                                <a href="{{route('showTerrainDetails',$media->terrain_id)}}" class="voir-btn">Voir <i class="fa fa-eye"></i></a>
                                                                            </li>

                                                                            <li>
                                                                                <a href="#" data-terrain="" class="del-btn">Supprimer <i class="fa fa-trash-o"></i></a>
                                                                            </li>
                                                                        </ul>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endif



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
