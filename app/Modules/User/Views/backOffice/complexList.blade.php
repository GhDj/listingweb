<?php
/**
 * Created by PhpStorm.
 * User: ghdj9
 * Date: 4/11/2019
 * Time: 3:27 PM
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
            $('#datatable-responsive').DataTable({
                responsive: true,
                language: {
                    url: "{{ asset('plugins') }}/datatable/lang/french.json"
                }
            });
            $('.dataTables_filter input').attr("placeholder", "Rechercher...");
        });

    </script>


    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">

                <div class="card-header">
                    <h1 class="card-title">Complexes</h1>
                </div>
                    <div class="card-body">


                        <table id="datatable-complex-request"
                               class="display table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <th>Responsable</th>
                            <th>Complex</th>
                            <th>Localité</th>
                           {{-- <th>Action</th>--}}
                            </thead>
                            <tbody>
                            @foreach($complexs as $complex)
                                <tr>
                                    <td>
                                        @isset($complex->user)
                                            {{$complex->user->first_name}} {{$complex->user->last_name}}
                                            @endisset
                                    </td>
                                    <td>
                                        {{$complex->name}}
                                    </td>
                                    <td>
                                        {{$complex->address->address}}
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
                        </table>
                    </div>
                   {{-- <div style="margin-top: 10px;" class="row col-md-12">
                        @foreach ($complexs as $terrain)
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
                                        <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#">{{$terrain->address}}</a></span>
                                        <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="5">
                                            <span>({{$terrain->reviews->count()}} reviews)</span>
                                        </div>

                                    </div></p>
                                </div>
                                <a href="{{route('showEditTerrain',$terrain->id)}}" class="btn btn-success">Modifier</a>
                            </div>
                        @endforeach
                    </div>--}}

                <div class="card-footer text-right">{{ $complexs->links() }}</div>
            </div>

        </div>
    </div>




@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection