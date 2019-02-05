@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection



@section('header')

  @include('frontOffice.inc.header')

@endsection

@section('content')

  {{-- {{dd($errors)}} --}}
  <style media="screen">
    .chosen{
      width: 100%;
      padding: 15px 20px;
      margin-bottom: 15px;
    }

    form input[type=number],form input[type=date],form input[type=time]{
    float: left;
    border: 1px solid #eee;
    background: #f9f9f9;
    width: 100%;
    padding: 15px 20px 15px 30px;
    border-radius: 6px;
    color: #666;
    font-size: 13px;
    -webkit-appearance: none;
  }

  </style>
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
                        <h2>Ajouter Un terrain<</h2>
                        <div class="breadcrumbs"><a href="#">Accueil</a><a href="#">Profile</a><span>Ajouter Equipement</span></div>
                    </div>
                    <div class="row">
                      @include('User::frontOffice.inc.asideProfile')
                        <div class="col-md-9">
                            <!-- profile-edit-container-->
                            <form class="" action="{{route('hundleUserAddEquipement')}}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}

                            <div class="profile-edit-container add-list-container">
                                <div class="profile-edit-header fl-wrap">
                                    <h4>Informations</h4>
                                </div>
                                <div class="custom-form">
                                    <label>Nom de Equipement</i></label>
                                    <input type="text" name="name" required value=""/>
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                    <div class="row">
                                      <div class="col-md-6">
                                          <label>Terrain</label>
                                          <select  class="chosen" id="terrain" name="terrain_id">
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
                                        <div class="col-md-6">
                                            <label>speciality</label>
                                            <select  class="chosen" name="speciality_id">
                                                <@foreach ($specialities as $specialitie)
                                                  <option value="{{$specialitie->id}}">{{$specialitie->speciality}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('speciality_id'))
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('speciality_id') }}</strong>
                                            </span>
                                            @endif
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

                                    <label>Hauteur: </label>
                                    <input type="number" name="hauteur" value="" required min="1" max="9999">
                                    @if ($errors->has('hauteur'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('hauteur') }}</strong>
                                    </span>
                                   @endif<label>Longueur </label>
                                    <input type="number" name="longueur" value="" required min="1" max="9999">
                                    @if ($errors->has('longueur'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('longueur') }}</strong>
                                    </span>
                                    @endif
                                    <label>largueur </label>
                                    <input type="number" name="largueur" value="" required min="1" max="9999">
                                    @if ($errors->has('largueur'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('largueur') }}</strong>
                                    </span>
                                    @endif
                                    <label>Description</label>
                                    <textarea name="description" rows="8" cols="80"></textarea>
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
                                                        <span><i class="fa fa-picture-o"></i> Click here or drop files to upload</span>
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
                            <!-- profile-edit-container end-->
                            <!-- profile-edit-container-->


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
