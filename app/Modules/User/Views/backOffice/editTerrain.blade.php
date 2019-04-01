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
    <form class="" action="{{route('handleAddTerrain')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="profile-edit-container add-list-container">
            <div class="profile-edit-header fl-wrap">
                <h4>Informations</h4>
            </div>
            <div class="custom-form">
                <label>Nom de Terrain</label>
                    <input type="text" name="name" value="{{$terrain->name}}" class="form-control" required />
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <label>Complex</label>
                            <select id="complex" class="form-control" name="complex_id">
                                <option value="-1">Votre complex</option>
                                <@foreach ($Complexs as $Complex)
                                     @if($terrain->complex->id==$Complex->id)
                                        <option  selected value="{{$Complex->id}}">{{$Complex->name}}</option>
                                     @else
                                    <option value="{{$Complex->id}}">{{$Complex->name}}</option>
                                    @endif
                                @endforeach
                                @if ($errors->has('complex_id'))
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('complex_id') }}</strong>
                                              </span>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Category</label>
                            <select class="form-control" id ="complexCategory" disabled name="category_id">
                                <option value="">Select un complex</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Type de terrain</label>
                            <select  class="form-control" name="speciality_id">
                                <@foreach ($specialities as $specialitie)
                                     @if($specialitie->id==$terrain->speciality_id)
                                        <option selected value="{{$specialitie->id}}">{{$specialitie->speciality}}</option>
                                     @else
                                    <option value="{{$specialitie->id}}">{{$specialitie->speciality}}</option>
                                    @endif
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
                <label>Terrain Type<i class="fa fa-globe"></i></label>
                <input type="text" name="type" class="form-control" required value="{{$terrain->type}}"/>
                @if ($errors->has('type'))
                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                @endif
                <label>Terrain size </label>
                <input type="number" name="size" value="{{$terrain->size}}" class="form-control"  required min="1" max="9999">
                @if ($errors->has('size'))
                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                @endif
                <label>Description</label>
                <textarea name="description" rows="8" class="form-control"  cols="80" >{{$terrain->description}}
                </textarea>
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
        <div class="profile-edit-container add-list-container">
            <div class="profile-edit-header fl-wrap">
                <h4>Ajouter Temp d'ouverture et fermeture</h4>
            </div>
            <div class="custom-form">
                <div class="row col-md-12">
                    <button type="button" class="btn btn-primary" name="button" id ="add-time">Ajouter</button>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <label>Jour</label>
                    </div>
                    <div class="col-md-3">
                        <label>Temp d'ouverture</label>
                    </div>
                    <div class="col-md-3">
                        <label>Temp de fermeture</label>
                    </div>
                    <!--col end-->

                </div>
                <div id="date">
                    <div class="row">
                        <div class="col-md-4">
                            <input  type="date" name="sessionDay[]" data-toggle="tooltip" data-placement="top" required title="Tooltip on top">
                            @if ($errors->has('sessionDay'))
                                <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('sessionDay') }}</strong>
                                            </span>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <input  type="time" name="sessionStartTime[]" required>
                            @if ($errors->has('sessionStartTime'))
                                <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('sessionStartTime') }}</strong>
                                            </span>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <input  type="time" name="sessionEndTime[]" required>
                            @if ($errors->has('sessionEndTime'))
                                <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('sessionEndTime') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <button class="btn btn-primary">Enregistrer<i class="fa fa-angle-right"></i></button>
    </form>
    <script type="text/javascript">

        $('#complex').change(function(){

            var selectedComplex = $(this).children("option:selected").val();
            console.log(selectedComplex);
            $('#complexCategory').children().remove();

            $.get("{{ route('showHome')}}/category/"+selectedComplex).done(function (res) {
                $('#complexCategory').prop('disabled', false);
                $.each(res.categories, function(j, d) {
                    console.log(d);
                    $('#complexCategory').append('<option value="' + d.id + '">' + d.category + '</option>');


                });
                $('#complexCategory').val({{$terrain->category_id}});
            });

        });

        $("#complex").val({{$terrain->complex->id}}).change();


        var i =0;
        $('#add-time').on('click',function(){
            i++;
            $('#date').append('<div class="row" id = "date'+i+'">'+
                '<div class="col-md-4">'+
                '<input class="form-control in-step2" type="date" name="sessionDay[]" required data-toggle="tooltip" data-placement="top" title="Tooltip on top">'+
                '</div>'+
                '<div class="col-md-3">'+
                '<input class="form-control in-step2" type="time" name="sessionStartTime[]" required>'+
                '</div>'+
                '<div class="col-md-3">'+
                '<input class="form-control in-step2" type="time" name="sessionEndTime[]" required>'+
                '</div>'+
                '<button type="button" name="button" style="cursor: pointer"  class = "button" data-index = "'+i+'"><i class="i-close cross-keywrd" ></i></button>'+

                '</div>'


            );

        });

        $(document).on("click", ".button", function () {
            console.log($(this).data('index'));
            var id = $(this).data('index');
            $("#date"+id).remove();
        });

    </script>

@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection