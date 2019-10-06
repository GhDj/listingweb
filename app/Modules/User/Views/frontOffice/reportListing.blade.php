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

                                <h2>Liste des signalement des problèmes </h2>
                                <div class="breadcrumbs"><a href="#">Accueil</a>
                                    <a href="#">Profile</a><span>Signalements des problèmes</span>
                                </div>


                        </div>
                        <div class="row">
                            @include('User::frontOffice.inc.asideProfile')
                            <div class="col-md-9">
                                <div class="dashboard-list-box fl-wrap">
                                    <div class="dashboard-header fl-wrap">


                                            <h3>Signalements des problèmes</h3>




                                    </div>
                                    <!-- dashboard-list end-->





                                        @foreach ($reports as $report)

                                          {{-- <div class="dashboard-list">
                                                <div class="dashboard-message">--}}
                                                    {{--<div class="dashboard-listing-table-image">
                                                        <a href="{{route('showTerrainDetails',$report->reported_id)}}">
                                                            <img src="@if ($terrain->medias->count() > 0)
                                                            {{  $terrain->medias->first()->link}}
                                                            @else
                                                            {{  asset('images/all/9.jpg')}}
                                                            @endif
                                                                    " alt=""></a>
                                                    </div>--}}
                                                    @if(count($report) > 0)
                                                        @foreach($report as $r)
                                                <div class="dashboard-list">
                                                    <div class="dashboard-message">
                                                        <span class="new-dashboard-item @if($r->status == 0) report-non-resolu @elseif($r->status == 2) report-ferme @endif">

                                                            @if($r->status == 0)
                                                                Non résolu
                                                                @elseif($r->status == 1)
                                                            Résolu
                                                                @else
                                                            Fermé
                                                                @endif

                                                        </span>
                                                        <div class="dashboard-message-avatar">
                                                            <img src="{{ Auth::user($r->user_id)->picture }}" alt="">
                                                        </div>
                                                        <div class="dashboard-message-text">
                                                            <h4>{{ Auth::user($r->user_id)->first_name }} {{ Auth::user($r->user_id)->last_name }}- <span>{{ \Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }}</span></h4>
                                                            <div class="booking-details fl-wrap">
                                                                <span class="booking-title">Equipement</span> :
                                                                <span class="booking-text"><a href="listing-sinle.html">{{ \App\Modules\Complex\Models\Terrain::find($r->reported_id)->first()->name }}</a></span>
                                                            </div>
                                                            <div class="booking-details fl-wrap">
                                                                <span class="booking-title">Catégorie </span> :
                                                                <span class="booking-text">{{ $r->title }}</span>
                                                            </div>

                                                            <p>{{ $r->description }} </p>
                                                            @if($r->status == 0)
                                                                <form action="{{ route("handleUserChangeReport") }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="report_id" value="{{ $r->id }}">
                                                                    <input type="hidden" name="status" value="1">
                                                                    <button class="btn  circle-btn    color-bg flat-btn">Marquer résolu<i class="fa fa-check-square-o"></i></button>
                                                                </form>
                                                                <form action="{{ route("handleUserChangeReport") }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="report_id" value="{{ $r->id }}">
                                                                    <input type="hidden" name="status" value="2">
                                                                    <button class="btn  circle-btn    color-bg flat-btn report-ferme">Marquer fermé<i class="fa fa-check-square-o"></i></button>
                                                                </form>
                                                            @elseif($r->status == 1)
                                                                <form action="{{ route("handleUserChangeReport") }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="report_id" value="{{ $r->id }}">
                                                                    <input type="hidden" name="status" value="0">
                                                                    <button class="btn  circle-btn    color-bg flat-btn report-non-resolu">Marquer non résolu<i class="fa fa-check-square-o"></i></button>
                                                                </form>
                                                                <form action="{{ route("handleUserChangeReport") }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="report_id" value="{{ $r->id }}">
                                                                    <input type="hidden" name="status" value="2">
                                                                    <button class="btn  circle-btn    color-bg flat-btn report-ferme">Marquer fermé<i class="fa fa-check-square-o"></i></button>
                                                                </form>
                                                            @else
                                                                <form action="{{ route("handleUserChangeReport") }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="report_id" value="{{ $r->id }}">
                                                                    <input type="hidden" name="status" value="1">
                                                                    <button class="btn  circle-btn    color-bg flat-btn">Marquer résolu<i class="fa fa-check-square-o"></i></button>
                                                                </form>
                                                                <form action="{{ route("handleUserChangeReport") }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="report_id" value="{{ $r->id }}">
                                                                    <input type="hidden" name="status" value="0">
                                                                    <button class="btn  circle-btn    color-bg flat-btn report-non-resolu">Marquer non résolu<i class="fa fa-check-square-o"></i></button>
                                                                </form>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                                          {{--  <div class="dashboard-listing-table-text">
                                                                <h4>
                                                                    <a href="{{route('showTerrainDetails',$r->reported_id)}}">{{ \App\Modules\Complex\Models\Terrain::find($r->reported_id)->first()->name }}</a>
                                                                </h4>
                                                                <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i>
                                                        <a  href="#">{{ \App\Modules\Complex\Models\Terrain::find($r->reported_id)->first()->complex->address->address}}</a>
                                                    </span>
                                                                --}}{{--<div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="5">
                                                                    <span>({{$terrain->reviews->count()}} reviews)</span>
                                                                </div>--}}{{--
                                                                <ul class="dashboard-listing-table-opt  fl-wrap">
                                                                    <li><a href="{{route('showUserEditTerrain',$r->reported_id)}}">Modifier <i class="fa fa-pencil-square-o"></i></a></li>
                                                                    <li><a href="#" class="del-btn">Supprimer <i class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>--}}
                                                            @endforeach
                                                        @endif
                                              {{--  </div>
                                            </div>--}}
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

