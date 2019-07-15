@extends('backOffice.layout')

@section('head')
    @include('backOffice.inc.head',
    ['title' => 'Jobifier'])
@endsection

@section('header')
    @include('backOffice.inc.header')
@endsection

@section('sidebar')
    @include('backOffice.inc.sidebar', [
        'current' => 'complexRequest'
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
            $('#datatable-complex-request').DataTable({
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

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="complexs-basic-tab" data-toggle="tab" href="#Complexs" role="tab" aria-controls="Complexs" aria-selected="true">Complexs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="clubs-basic-tab" data-toggle="tab" href="#Clubs" role="tab" aria-controls="Clubs" aria-selected="false">Club</a>
                        </li>

                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Complexs" role="tabpanel" aria-labelledby="complexs-basic-tab">


                        <table id="datatable-complex-request"
                           class="display table table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <th>Responsable</th>
                        <th>Complex</th>
                        <th>Date</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($complexRequests as $complexRequest)
                            <tr>
                                <td>
                                    {{$complexRequest->user->first_name}} {{$complexRequest->user->last_name}}
                                </td>
                                <td>
                                    {{$complexRequest->complex->name}}
                                </td>
                                <td>
                                    {{$complexRequest->created_at}}
                                </td>
                                <td>
                                    @if($complexRequest->status!=1)
                                        <a href="{{route('acceptComplexRequest',$complexRequest->id)}}"
                                           class="btn btn-success">Accepter</a>
                                    @endif

                                    <a href="{{route('cancelComplexRequest',$complexRequest->id)}}"
                                       class="btn btn-danger">Annuler</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        </div>
                        <div class="tab-pane fade" id="Clubs" role="tabpanel" aria-labelledby="club-basic-tab">


                            <table id="datatable-club-request"
                                   class="display table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <th>Responsable</th>
                                <th>Complex</th>
                                <th>Date</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($clubsRequests as $clubsRequest)
                                    <tr>
                                        <td>
                                            {{$clubsRequest->user->first_name}} {{$clubsRequest->user->last_name}}
                                        </td>
                                        <td>
                                            {{$clubsRequest->club->name}}
                                        </td>
                                        <td>
                                            {{$clubsRequest->created_at}}
                                        </td>
                                        <td>
                                            @if($clubsRequest->status!=1)
                                                <a href="{{route('acceptClubRequest',$clubsRequest->id)}}"
                                                   class="btn btn-success">Accepter</a>
                                            @endif

                                            <a href="{{route('cancelClubRequest',$clubsRequest->id)}}"
                                               class="btn btn-danger">Annuler</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection