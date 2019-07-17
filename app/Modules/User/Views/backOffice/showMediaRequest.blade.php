<?php
/**
 * Created by PhpStorm.
 * User: ghdj9
 * Date: 7/17/2019
 * Time: 3:00 PM
 */

?>

@extends('backOffice.layout')

@section('head')
    @include('backOffice.inc.head',
    ['title' => 'Olympiade'])
@endsection

@section('header')
    @include('backOffice.inc.header')
@endsection

@section('sidebar')
    @include('backOffice.inc.sidebar', [
        'current' => 'mediaRequest'
    ])
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/15.0.1/css/intlTelInput.css"/>
    <style>
        .dataTables_length {
            float: left;
        }

        .image-upload > input {
            display: none;
        }

        .user_image_table {
            width: 100px;
            height: 100px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins') }}/datatable/datatable.css">
    <script type="text/javascript" src="{{ asset('plugins') }}/datatable/datatable.js"></script>

    <script type="text/javascript">

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-media-request').DataTable({
                responsive: true,
                language: {
                    url: "{{ asset('plugins') }}/datatable/lang/french.json"
                }
            });
            $('#datatable-club-request').DataTable({
                responsive: true,
                language: {
                    url: "{{ asset('plugins') }}/datatable/lang/french.json"
                }
            });
            $('.dataTables_filter input').attr("placeholder", "Rechercher...");
        });

    </script>


    <div class="breadcrumb">
        <h1>Demande d'accès</h1>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">

        <div class="col-md-12 mb-4">
            <div class="card text-left">

                <div class="card-body">


                            <table id="datatable-media-request"
                                   class="display table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <th>Utilisateur</th>
                                <th>Lié à </th>
                                <th>Media</th>
                                <th>Date</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($mediaRequests as $mediaRequest)
                                    <tr>
                                        <td>
                                            {{$mediaRequest->user->first_name}} {{$mediaRequest->user->last_name}}
                                        </td>
                                        <td>
                                            @if($mediaRequest->terrain_id)
                                                Terrain : {{$mediaRequest->terrain->name}}
                                            @elseif($mediaRequest->review_id)
                                                Review : {{$mediaRequest->review_id}}
                                            @elseif($mediaRequest->team_id)
                                                Equipe : {{$mediaRequest->team_id}}
                                            @elseif($mediaRequest->report_id)
                                                Report : {{$mediaRequest->report_id}}
                                            @elseif($mediaRequest->post_id)
                                                Post : {{$mediaRequest->post_id}}
                                            @elseif($mediaRequest->club_id)
                                                Club : {{$mediaRequest->club_id}}
                                            @elseif($mediaRequest->complex_id)
                                                Complex : {{$mediaRequest->complex_id}}
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ asset($mediaRequest->link) }}" class="responsive-img" alt="">
                                        </td>
                                        <td>
                                            {{$mediaRequest->created_at}}
                                        </td>
                                        <td>
                                            @if($mediaRequest->type == 10)
                                                <a href="{{route('acceptMediaRequest',$mediaRequest->id)}}"
                                                   class="btn btn-success">Accepter</a>
                                            @elseif ($mediaRequest->type > 10)

                                            <a href="{{route('cancelMediaRequest',$mediaRequest->id)}}"
                                               class="btn btn-danger">Annuler</a>

                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>




                </div>
            </div>

        </div>
    </div>


@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection
