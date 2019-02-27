@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection



@section('header')

    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'','faq'=>'','profile'=>'act-link']])

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
                        <h2>Ajouter Un terrain</h2>
                        <div class="breadcrumbs"><a href="#">Accueil</a><a href="#">Profile</a><span>Ajouter Un terrain</span></div>
                    </div>
                    <div class="row">
                      @include('User::frontOffice.inc.asideProfile')
                        <div class="col-md-9">
                            <!-- profile-edit-container-->
                            <form class="" action="{{route('hundleUserAddTerrain')}}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}

                            <div class="profile-edit-container add-list-container">
                                <div class="profile-edit-header fl-wrap">
                                    <h4>Informations</h4>
                                </div>
                                <div class="custom-form">
                                    <label>Nom de Terrain</i></label>
                                    <input type="text" name="name" required value=""/>
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                    <div class="row">
                                      <div class="col-md-4">
                                          <label>Complex</label>
                                          <select  class="chosen" id="complex" name="complex_id">
                                              <option value="-1">Votre complex</option>
                                              <@foreach ($complexes as $complexe)
                                                <option value="{{$complexe->id}}">{{$complexe->name}}</option>
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
                                            <select class="chosen"  id ="complexCategory" disabled name="category_id">
                                                <option value="">Select un complex</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Type de terrain</label>
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
                                    <label>Terrain Type<i class="fa fa-globe"></i></label>
                                    <input type="text" name="type" required value=""/>
                                    @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                    <label>Terrain size </label>
                                    <input type="number" name="size" value="" required min="1" max="9999">
                                    @if ($errors->has('size'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('size') }}</strong>
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
                            <div class="profile-edit-container add-list-container">
                                <div class="profile-edit-header fl-wrap">
                                    <h4>Ajouter Temp d'ouverture et fermeture</h4>
                                </div>
                                <div class="custom-form">
                                  <div class="row">
                                      <button type="button" name="button" id ="add-time" style="float:right;background-color:#4DB7FE;padding:15px;border-radius:50%">Ajouter</button>
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


@section('scripts')

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

      });

  });
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
        '<button type="button" name="button" class = "button" data-index = "'+i+'"><i class="fa fa-times-circle cross-keywrd" ></i></button>'+

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
