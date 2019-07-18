@extends('frontOffice.layout')

@section('head')

    @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection

@section('css')

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.css">

@endsection


@section('header')
    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'','faq'=>'','profile'=>'act-link','associations'=>'','infrastructure'=>'']])

@endsection


@section('content')

    <style media="screen">
        .custom-form .filter-tags label {
            padding-left: 0px !important;
            margin-right: 1px;
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
                            <h2>Ajouter Un Complex</h2>
                            <div class="breadcrumbs"><a href="#">Home</a><a
                                        href="#">Profile</a><span>Ajouter Un Complex</span></div>
                        </div>
                        <div class="row">
                            @include('User::frontOffice.inc.asideProfile')
                            <div class="col-md-9">
                                <!-- profile-edit-container-->
                                <div class="profile-edit-container add-list-container">
                                    <div class="profile-edit-header fl-wrap">
                                        <h4>Informations</h4>
                                    </div>
                                    <div class="custom-form">
                                        <form class=""
                                              action="{{isset($complex) ? route('handleEditComplex') : route('handleUserAddComplex')}}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label>Nom de Complex <i class="fa fa-briefcase"></i></label>
                                                <div class="col-md-12">
                                                    <input type="text" name="name"
                                                           value="{{(isset($complex) ? $complex->name:"")}}"/>
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <label>Categories Disponible</label>
                                            <div class=" fl-wrap filter-tags">

                                                @foreach ($categories as $categorie)

                                                    @if(isset($complex)&& $complex->categories()->get(['category_id'])->contains('category_id', $categorie->id))
                                                        <input id="check-{{$categorie->title}}" type="checkbox"
                                                               name="categories[]" value="{{$categorie->id}}" checked>
                                                        <label for="check-{{$categorie->title}}">{{$categorie->title}}</label>
                                                    @else
                                                        <input id="check-{{$categorie->title}}" type="checkbox"
                                                               name="categories[]" value="{{$categorie->id}}">
                                                        <label for="check-{{$categorie->title}}">{{$categorie->title}}</label>
                                                    @endif
                                                @endforeach
                                            </div>

                                            <div class="form-group">

                                                <label>Ajouter Autre Categorie </label>
                                                <input type="text" id="otherCategories" class="form-control">

                                                <label for="category-img">Image de la catégorie</label>

                                                <div class="add-list-media-wrap fuzone">

                                                    <div class="fu-text">
                                                        <span><i class="fa fa-picture-o"></i> Cliquez ici ou déposez l'image à télécharger</span>
                                                    </div>
                                                    <input required type="file" class="form-control" name="categoryImage">
                                                    @if ($errors->has('images'))
                                                        <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('images') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            
                                            {{--<div class="input-group-append">
                                                <button id="addKeywrdRdvId" class="btn btn-warning" type="button"
                                                        style="margin-top:0;float:left">Ajouter
                                                </button>
                                            </div>
                                            <div id="keywordRdvBlk" class="input-group in-step1"></div>

                                            <input type="hidden" class="form-control" id="otherCategorie" name="otherCategories"/>
--}}

                                            <!-- profile-edit-container end-->
                                            <!-- profile-edit-container-->
                                            <div class="profile-edit-container add-list-container">
                                                <div class="profile-edit-header fl-wrap">
                                                    <h4>Emplacement / Contacts</h4>
                                                </div>
                                                <div class="custom-form">
                                                    <div class="form-group row">
                                                        <label>Localité<i class="fa fa-map-marker"></i></label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="locality"
                                                                   value="{{(isset($complex) ? $complex->address->locality : "")}}"/>
                                                            @if ($errors->has('locality'))
                                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('locality') }}</strong>
                                      </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label>Addresse<i class="fa fa-map-marker"></i></label>
                                                        <div class="col-md-12">
                                                            <input type="text" id="autocomplete-input" name="address"
                                                                   value="{{(isset($complex) ? $complex->address->address : "")}}"/>
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
                                                            <div class="col-md-12">
                                                                <input type="text" name="city" placeholder=""
                                                                       value="{{(isset($complex) ? $complex->address->city : "")}}"/>
                                                                @if ($errors->has('city'))
                                                                    <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Code postal</i></label>
                                                            <div class="col-md-12">
                                                                <input type="text" name="postal_code" placeholder=""
                                                                       value="{{(isset($complex) ? $complex->address->postal_code : "")}}"/>
                                                                @if ($errors->has('postal_code'))
                                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('postal_code') }}</strong>
                                              </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Latitude:<i class="fa fa-map-marker"></i></label>

                                                            <div class="col-md-12">
                                                                <input type="text" name="latitude" id="latitude"
                                                                       placeholder=""
                                                                       value="{{(isset($complex) ? $complex->address->latitude : "")}}"/>
                                                                @if ($errors->has('latitude'))
                                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('latitude') }}</strong>
                                              </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Longitude:<i class="fa fa-map-marker"></i></label>

                                                            <div class="col-md-12">
                                                                <input type="text" name="longitude" id="longitude"
                                                                       placeholder=""
                                                                       value="{{(isset($complex) ? $complex->address->longitude : "")}}"/>
                                                                @if ($errors->has('longitude'))
                                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('longitude') }}</strong>
                                              </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="map-container">
                                                            <div id="singleComplexMap"
                                                                 data-latitude="{{(isset($complex) ? $complex->address->latitude : "46.2276")}}"
                                                                 data-longitude="{{(isset($complex) ? $complex->address->longitude : "2.2137")}}"></div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label>Téléphone<i class="fa fa-phone"></i></label>
                                                            <div class="col-md-12">
                                                                <input type="text" name="phone"
                                                                       value="{{(isset($complex) ? $complex->phone : "")}}"/>
                                                                @if ($errors->has('phone'))
                                                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label>Email<i class="fa fa-envelope-o"></i></label>
                                                            <div class="col-md-12">
                                                                <input type="text" name="email"
                                                                       value="{{(isset($complex) ? $complex->email : "")}}"/>
                                                                @if ($errors->has('email'))
                                                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label>Site Web<i class="fa fa-globe"></i></label>
                                                            <div class="col-md-12">
                                                                <input type="text" name="web_site"
                                                                       value="{{(isset($complex) ? $complex->web_site : "")}}"/>
                                                                @if ($errors->has('web_site'))
                                                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('web_site') }}</strong>
                                        </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <button class="btn  big-btn  color-bg flat-btn">Enregistrer<i
                                                                    class="fa fa-angle-right"></i></button>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--profile-edit-wrap end -->
                </div>
                <!--container end -->
            </section>
            <input type="hidden" class="form-control" id="tokenfield" value=""/>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.min.js"
            charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            items = [];
            i = 0;
//
            <!-- partie d'ajout des mots clé -->
            $(document).on("click", "#addKeywrdRdvId", function () {
                if (!($("#keywrdRdvId").val() === '')) {
                    var l = i++;
                    $("#keywordRdvBlk").append('<span class="keywrdspan">' + $("#keywrdRdvId").val() + '&nbsp<i class="fa fa-times-circle cross-keywrd"  data-index = "' + l + '"></i></span>');
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
