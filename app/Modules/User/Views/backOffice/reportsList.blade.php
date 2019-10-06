<?php
/**
 * Created by PhpStorm.
 * User: ghdj9
 * Date: 10/2/2019
 * Time: 3:16 AM
 */
?>
@extends('backOffice.layout')

@section('head')
    @include('backOffice.inc.head',
    ['title' => 'Olympiade',])
@endsection

@section('header')
    @include('backOffice.inc.header')
@endsection

@section('sidebar')
    @include('backOffice.inc.sidebar', [
        'current' => 'terrainsList'
    ])
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins') }}/datatable/datatable.css">
    <script type="text/javascript" src="{{ asset('plugins') }}/datatable/datatable.js"></script>

    <script type="text/javascript">

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-terrains').DataTable({
                responsive: true,
                language: {
                    url: "{{ asset('plugins') }}/datatable/lang/french.json"
                }
            });
            $('.dataTables_filter input').attr("placeholder", "Rechercher...");
        });

    </script>

    <div class="breadcrumb">
        <h1>Signalements des problèmes</h1> <ul>
            <li><a href="">Tableau de bord</a></li>
            <li><a href="">Infrastructures</a></li>
            <li><a href="">Signalements des problèmes</a></li>
        </ul>



    </div>

    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">

                <div class="card-body">
                    <table id="datatable-terrains"
                           class="display table table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <th>Utilisateur</th>
                        <th>Terrain</th>
                        <th>Date</th>
                        <th>Categorie</th>
                        <th>Status</th>
                        {{-- <th>Action</th>--}}
                        </thead>
                        <tbody>
                        @foreach($userReports as $report)
                            <tr>
                                <td>

                                        {{ Auth::user($report->user_id)->first_name }} {{ Auth::user($report->user_id)->last_name }}

                                </td>
                                <td>
                                    {{ \App\Modules\Complex\Models\Terrain::find($report->reported_id)->first()->name }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($report->created_at)->format('d/m/Y') }}
                                </td>
                                <td>
                                    {{ $report->title }}
                                </td>
                                <td>
                                    @if($report->status == 0)
                                        Non résolu
                                    @elseif($report->status == 1)
                                        Résolu
                                    @else
                                        Fermé
                                    @endif
                                </td>

                                {{--  <td>
                                      @if($complexRequest->status!=1)
                                          <a href="{{route('acceptComplexRequest',$complexRequest->id)}}"
                                             class="btn btn-success">Accepter</a>
                                      @endif

                                      <a href="{{route('cancelComplexRequest',$complexRequest->id)}}"
                                         class="btn btn-danger">Annuler</a>
                                  </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Terrain</th>
                            <th>Date</th>
                            <th>Categorie</th>
                            <th>Status</th>
                        </tr>
                        </tfoot>
                    </table>
                    {{--<div style="margin-top: 10px;" class="row col-md-12">
                        @foreach ($userTerrains as $terrain)
                            <div class="card mb-4 o-hidden col-md-4">
                                <a href="{{route('showTerrainDetails',$terrain->id)}}"> <img
                                            src="@if ($terrain->medias->count() > 0)
                                            {{  $terrain->medias->first()->link}}
                                            @else
                                            {{  asset('images/all/9.jpg')}}
                                            @endif" alt=""></a>
                                <div class="card-body">
                                    <p><div class="dashboard-listing-table-text">
                                        <h4><a href="{{route('showTerrainDetails',$terrain->id)}}">{{$terrain->name}}</a></h4>
                                        <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#">{{$terrain->complex->address->address}}</a></span>
                                        <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="5">
                                            <span>({{$terrain->reviews->count()}} reviews)</span>
                                        </div>

                                    </div></p>
                                </div>
                                <a href="{{route('showEditTerrain',$terrain->id)}}" class="btn btn-success">Modifier</a>
                            </div>
                        @endforeach
                    </div>--}}
                </div>
            </div>
        </div>
    </div>


@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection