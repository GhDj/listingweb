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
        'current' => 'dashboard'
    ])
@endsection

@section('content')
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Tableau de bord<</h1>
        </div>

        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <!-- ICON BG -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <div class="card-body text-center">
                        <i class="i-Add-User"></i>
                        <div class="content">
                            <p class="text-muted mt-2 mb-0">Sprotif</p>
                            <p class="text-primary text-24 line-height-1 mb-2">{{ $sportifs }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <div class="card-body text-center">
                        <i class="i-Building"></i>
                        <div class="content">
                            <p class="text-muted mt-2 mb-0">Complexes</p>
                            <p class="text-primary text-24 line-height-1 mb-2">{{ $complexs }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <div class="card-body text-center">
                        <i class="i-Window"></i>
                        <div class="content">
                            <p class="text-muted mt-2 mb-0">Terrains</p>
                            <p class="text-primary text-24 line-height-1 mb-2">{{ $terrains }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <div class="card-body text-center">
                        <i class="i-Posterous"></i>
                        <div class="content">
                            <p class="text-muted mt-2 mb-0">Clubs</p>
                            <p class="text-primary text-24 line-height-1 mb-2">{{ $clubs }}</p>
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