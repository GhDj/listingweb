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

                                    <!-- dashboard-list end-->
                                    @foreach ($terrains as $terrain)

                                        @if($terrain->activities->count() > 0)
                                            <div class="dashboard-header fl-wrap">
                                                <h3>Activités du terrain : {{ $terrain->name }}</h3>
                                            </div>
                                            @foreach($terrain->activities as $activity)
                                                <div class="dashboard-list">
                                                    <div class="dashboard-message">

                                                        <div class="dashboard-listing-table-text">
                                                            <h4>
                                                                <a href="#">{{ \App\Modules\Complex\Models\Sport::where('id','=',$activity->sport_id)->first()->title }}</a>

                                                            </h4>
                                                            <div class="prix-activity-update-container">

                                                                <div class="row custom-form">

                                                                    <div class="form-group col-md-3">
                                                                        <label> Prix </label>
                                                                        <input type="hidden" class="form-control"
                                                                               name="activity_id"
                                                                               value="{{ $activity->id }}"
                                                                               placeholder="{{ \App\Modules\Complex\Models\Sport::where('id','=',$activity->sport_id)->first()->title }}"
                                                                               disabled/>
                                                                        <input type="text" class="form-control"
                                                                               name="prix"
                                                                               data-value="{{ $activity->id }}"
                                                                               placeholder="0 €"/>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label> Minutes <i
                                                                                    class="fa fa-clock"></i></label>

                                                                        <input type="text" class="form-control"
                                                                               name="duree_m"
                                                                               placeholder="0"/>

                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label> Heures <i
                                                                                    class="fa fa-clock"></i></label>
                                                                        <input type="text" class="form-control"
                                                                               name="duree_h"
                                                                               placeholder="0"/>

                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <button class="btn flat-btn">Enregistrer
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif



                                    @endforeach

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

