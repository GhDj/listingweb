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
        'current' => 'addComplex'
    ])
@endsection

@section('content')
    <div class="breadcrumb">
        <h1>Complexs</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row mb-4">

        <div class="col-md-12 mb-4">
            <div class="card text-left">

                <div class="card-body">

                    <form class="" action="{{route('handleAddComplex')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nom de Complex <i class="fa fa-briefcase"></i></label>

                            <input type="text" class="form-control" name="name" value=""/>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                            @endif

                        </div>


                        <label>Categories Disponible</label>
                        <div class="row col-md-12">

                            @foreach ($categories as $categorie)
                                <label class="radio radio-primary col-md-3">
                                    <input id="check-{{$categorie->title}}" class="form-control" type="checkbox"
                                           name="categories[]"
                                           value="{{$categorie->title}}">
                                    <span>{{$categorie->title}}</span>
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach
                        </div>

                        <label>Ajouter Autre Categorie </label>
                        <input type="text" id="keywrdRdvId" class="form-control">
                        <div class="input-group-append" style="margin-top: 10px;margin-bottom: 12px;">
                            <button id="addKeywrdRdvId" class="btn btn-warning" type="button"
                                    style="margin-top:0;float:left">Ajouter
                            </button>
                        </div>
                        <div id="keywordRdvBlk" class="input-group in-step1"></div>

                        <input type="hidden" class="form-control" id="otherCategorie" name="otherCategories"/>


                        <!-- profile-edit-container end-->
                        <!-- profile-edit-container-->
                        <div class="profile-edit-container add-list-container">
                            <div class="profile-edit-header fl-wrap">
                                <h4>Emplacement / Contacts</h4>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Localité<i class="fa fa-map-marker"></i></label>

                                        <input type="text" class="form-control" name="locality" value=""/>
                                        @if ($errors->has('locality'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('locality') }}</strong>
                                      </span>
                                        @endif

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Addresse<i class="fa fa-map-marker"></i></label>

                                        <input type="text" class="form-control" id="autocomplete-input"
                                               name="address"
                                               value=""/>
                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Ville<i class="fa fa-map-marker"></i></label>

                                        <input type="text" class="form-control" name="city" placeholder=""
                                               value=""/>
                                        @if ($errors->has('city'))
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                    <div class="col-md-6">
                                        <label>Code postal</label>

                                        <input type="text" class="form-control" name="postal_code"
                                               placeholder=""
                                               value=""/>
                                        @if ($errors->has('postal_code'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('postal_code') }}</strong>
                                              </span>
                                        @endif

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Latitude:<i class="fa fa-map-marker"></i></label>

                                        <input type="text" class="form-control" name="latitude" id="latitude"
                                               placeholder="" value=""/>
                                        @if ($errors->has('latitude'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('latitude') }}</strong>
                                              </span>
                                        @endif

                                    </div>
                                    <div class="col-md-6">
                                        <label>Longitude:<i class="fa fa-map-marker"></i></label>


                                        <input type="text" class="form-control" name="longitude" id="longitude"
                                               placeholder="" value=""/>
                                        @if ($errors->has('longitude'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('longitude') }}</strong>
                                              </span>
                                        @endif

                                    </div>
                                    <div class="map-container">
                                        <div id="singleComplexMap" data-latitude="46.2276"
                                             data-longitude="2.2137"></div>
                                    </div>
                                </div>
                <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Téléphone<i class="fa fa-phone"></i></label>

                                    <input type="text" class="form-control" name="phone" value=""/>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>

                    <div class="form-group col-md-3">
                                    <label>Email<i class="fa fa-envelope-o"></i></label>

                                    <input type="text" class="form-control" name="email" value=""/>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                </div>

                    <div class="form-group col-md-3">
                                    <label>Site Web<i class="fa fa-globe"></i></label>

                                    <input type="text" class="form-control" name="web_site" value=""/>
                                    @if ($errors->has('web_site'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('web_site') }}</strong>
                                        </span>
                                    @endif

                                </div>
                </div>
                                <button class="btn btn-primary">Enregistrer<i
                                            class="fa fa-angle-right"></i></button>


                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    items = [];
                    i = 0;
//
                    <!-- partie d'ajout des mots clé -->
                    $(document).on("click", "#addKeywrdRdvId", function () {
                        if (!($("#keywrdRdvId").val() === '')) {
                            var l = i++;
                            $("#keywordRdvBlk").append('<span class="keywrdspan" style="padding:10px;"">' + $("#keywrdRdvId").val() + '&nbsp<i class="i-close cross-keywrd"  style="cursor: pointer" data-index = "' + l + '"></i></span>');
                            var test = $("#keywrdRdvId").val();
                            console.log(l);
                            items.push(test);
                            $('#otherCategorie').val(items);
                            var val = $('#otherCategorie').val();
                            $("#keywrdRdvId").val('');

                        }
                    });
                    $(document).on("click", ".cross-keywrd", function () {
                        $(this).parent(".keywrdspan").remove();
                        var index = $(this).data('index');
                        var otherCategorie = $('#otherCategorie').val();
                        var string = otherCategorie;
                        var array = string.split(',');
                        if (index > -1) {
                            array.splice(index, 1);
                        }
                        console.log(array);
                        $('#otherCategorie').val(array);
                        var result = $('#otherCategorie').val();
                    });
                })
            </script>
@endsection
@section('footer')
    @include('backOffice.inc.footer')
@endsection
