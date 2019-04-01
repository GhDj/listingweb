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
<form class="" action="{{route('handleAddClub')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="profile-edit-container add-list-container">
        <div class="profile-edit-header fl-wrap">
            <h4>Informations</h4>
        </div>
        <div class="custom-form">
            <label>Nom de Club</label>
            <input type="text" name="name" class="form-control" required value=""/>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
            <div class="row">
                <div class="col-md-4">
                    <label>Terrain</label>
                    <select  id="terrain" class="form-control" name="terrain_id">
                        <option value="-1">Votre Terrain</option>
                        <@foreach ($terrains as $terrain)
                            <option value="{{$terrain->id}}">{{$terrain->name}}</option>
                        @endforeach
                        @if ($errors->has('terrain_id'))
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('terrain_id') }}</strong>
                                              </span>
                        @endif
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- profile-edit-container end-->
    <!-- profile-edit-container-->
    <div class="profile-edit-container add-list-container">
        <div class="profile-edit-header fl-wrap">
            <h4>Description</h4>
        </div>
        <div class="custom-form">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="8" cols="80"></textarea>
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('description') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <!-- profile-edit-container end-->
    <!-- profile-edit-container-->
    <div class="profile-edit-container add-list-container">
        <div class="profile-edit-header fl-wrap">
            <h4>Ajouter des photos</h4>
        </div>
        <div class="custom-form">
            <div class="row">
                <!--col -->
                <div class="col-md-12">

                    <div class="add-list-media-wrap fuzone">

                        <div class="fu-text">
                            <span><i class="fa fa-picture-o"></i>  Cliquer ici pour ajouter des photos</span>
                        </div>
                        <input required type="file" class="form-control" name="images[]"  multiple>
                        @if ($errors->has('images'))
                            <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('images') }}</strong>
                                                    </span>
                        @endif
                    </div>
                </div>
                <!--col end-->

            </div>
        </div>
    </div>

    <button class="btn  big-btn  color-bg flat-btn">Enregistrer<i class="fa fa-angle-right"></i></button>
</form>
@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection