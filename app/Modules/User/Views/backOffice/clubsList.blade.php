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
        'current' => 'clubsList'
    ])
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins') }}/datatable/datatable.css">
    <script type="text/javascript" src="{{ asset('plugins') }}/datatable/datatable.js"></script>

    <script type="text/javascript">

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-clubs').DataTable({
                responsive: true,
                language: {
                    url: "{{ asset('plugins') }}/datatable/lang/french.json"
                }
            });
            $('.dataTables_filter input').attr("placeholder", "Rechercher...");
        });

    </script>


    <div class="breadcrumb">
        <h1>Clubs</h1> <ul>
            <li><a href="">Tableau de bord</a></li>
            <li><a href="">Infrastructures</a></li>
            <li><a href="">Clubs</a></li>
        </ul>

        <button role="link" href="{{route('showAddClub')}}" class="btn btn-primary add_user">Ajouter</button>

    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">

                <div class="card-body">
                    <table id="datatable-clubs"
                           class="display table table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <th>Responsable</th>
                        <th>Complex</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Localité</th>


                        {{-- <th>Action</th>--}}
                        </thead>
                        <tbody>
                        @foreach($clubs as $club)
                            <tr>
                                <td>
                                    @isset($club->user)
                                        {{$club->user->first_name}} {{$club->user->last_name}}
                                    @endisset
                                </td>
                                <td>
                                    {{$club->name}}
                                </td>
                                <td>
                                    {{$club->email}}
                                </td>
                                <td>
                                    {{$club->phone}}
                                </td>
                                <td>
                                    {{$club->address->address}}
                                </td>
                               {{-- <td>
                                    <a href="{{route('showEditClub',$club->id)}}"> <span class="badge badge-pill badge-outline-success p-2 m-1"><i class="i-Edit"></i></span></a>
                                </td>--}}
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
                            <th>Responsable</th>
                            <th>Complex</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Localité</th>
                        </tr>
                        </tfoot>
                    </table>
                    {{--<div style="margin-top: 10px;" class="row col-md-12">
                        @foreach ($clubs as $club)
                            <div class="card mb-4 o-hidden col-md-4">
                                <a href="{{route('showClubDetails',$club->id)}}"> <img
                                            src="@if ($club->medias->count() > 0)
                                            {{  $club->medias->first()->link}}
                                            @else
                                            {{  asset('images/all/9.jpg')}}
                                            @endif" alt=""></a>
                                <div class="card-body">
                                    <p><div class="dashboard-listing-table-text">
                                        <h4><a href="{{route('showClubDetails',$club->id)}}">{{$club->name}}</a></h4>
                                        <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#">{{$club->address->address}}</a></span>
                                        <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="5">
                                            <span>({{$club->reviews->count()}} reviews)</span>
                                        </div>

                                    </div></p>
                                </div>
                                <a href="{{route('showEditTerrain',$club->id)}}" class="btn btn-success">Modifier</a>
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