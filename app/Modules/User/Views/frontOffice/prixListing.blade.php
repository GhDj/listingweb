<?php
/**
 * Created by PhpStorm.
 * User: ghdj9
 * Date: 10/2/2019
 * Time: 9:29 PM
 */
?>

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

                            <h2>Liste des activités des terrains </h2>
                            <div class="breadcrumbs"><a href="#">Accueil</a>
                                <a href="#">Profile</a><span>Activités des terrains</span>
                            </div>


                        </div>
                        <div class="row">
                            @include('User::frontOffice.inc.asideProfile')
                            <div class="col-md-9">
                                <div class="dashboard-list-box fl-wrap">
                                    <div class="dashboard-header fl-wrap">


                                        <h3>Activités des terrains</h3>




                                    </div>
                                    <!-- dashboard-list end-->





                                    @foreach ($terrains as $terrain)

                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                               {{-- <div class="dashboard-listing-table-image">
                                                    <a href="listing-single.html"><img src="images/all/3.jpg" alt=""></a>
                                                </div>--}}
                                                <div class="dashboard-listing-table-text">
                                                    <h4><a href="#">{{ \App\Modules\Complex\Models\Sport::find($p->sport_id)->first()->name }}</a></h4>
                                                    <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a href="#">USA 27TH Brooklyn NY</a></span>
                                                    <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="5"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                        <span>(2 reviews)</span>
                                                    </div>
                                                    <ul class="dashboard-listing-table-opt  fl-wrap">
                                                        <li><a href="#">Edit <i class="fa fa-pencil-square-o"></i></a></li>
                                                        <li><a href="#" class="del-btn">Delete <i class="fa fa-trash-o"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach

                                {{--{{$userTerrains->links()}}--}}








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

