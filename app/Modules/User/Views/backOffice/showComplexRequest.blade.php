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
        'current' => 'terrainsList'
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
            </div>

        </div>
    </div>


@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection