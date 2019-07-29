<?php
/**
 * Created by PhpStorm.
 * User: ghdj9
 * Date: 7/18/2019
 * Time: 4:16 AM
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
        'current' => 'categoryRequest'
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
            $('#datatable-category-request').DataTable({
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
        <h1>Demandes d'ajout</h1>
        <ul>
            <li><a href="">Tableau de bord</a></li>
            <li><a href="">Demandes d'ajout</a></li>
            <li><a href="">Catégories</a></li>
        </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">

        <div class="col-md-12 mb-4">
            <div class="card text-left">

                <div class="card-body">


                    <table id="datatable-category-request"
                           class="display table table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        
                        <th>Categorie </th>
                        <th>Media</th>
                        <th>Date de la demande</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($categoryRequests as $categoryRequest)
                            <tr>
                                <td>{{ $categoryRequest->title }}</td>
                                <td>
                                    @if(\App\Modules\General\Models\Media::where('category_id','=',$categoryRequest->id)->first())
                                    <img src="{{ \App\Modules\General\Models\Media::where('category_id','=',$categoryRequest->id)->first()->link }}" alt="">
                                        @else
                                        Sans Image
                                        @endif
                                </td>

                                <td>
                                    {{$categoryRequest->created_at}}
                                </td>
                                <td>
                                    @if($categoryRequest->status == 0)
                                        <a href="{{route('acceptCategoryRequest',$categoryRequest->id)}}"
                                           ><span class="badge badge-pill badge-outline-success p-2 m-1"><i class="i-Like"></i></span></a>
                                    @elseif ($categoryRequest->status > 0)

                                        <a href="{{route('cancelCategoryRequest',$categoryRequest->id)}}"
                                           class="btn btn-danger">Annuler</a>

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <th>Categorie </th>
                        <th>Media</th>
                        <th>Date de la demande</th>
                        <th>Action</th>
                        </tfoot>
                    </table>




                </div>
            </div>

        </div>
    </div>


@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection

