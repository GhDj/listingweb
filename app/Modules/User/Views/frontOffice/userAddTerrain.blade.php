@extends('frontOffice.layout')

@section('head')

    @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



    <link rel="stylesheet" href="{{ asset('css/frontOffice/css/select2.min.css') }}">

@endsection



@section('header')

    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'','faq'=>'','profile'=>'act-link','associations'=>'','infrastructure'=>'']])

@endsection

@section('content')

    {{-- {{dd($errors)}} --}}
    <style media="screen">
        .chosen {
            width: 100%;
            padding: 15px 20px;
            margin-bottom: 15px;
        }

        form input[type=number], form input[type=date], form input[type=time] {
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
                            <div class="breadcrumbs"><a href="#">Accueil</a><a href="#">Profile</a><span>Ajouter Un terrain</span>
                            </div>
                        </div>
                        <div class="row">
                            @include('User::frontOffice.inc.asideProfile')
                            <div class="col-md-9">
                                <!-- profile-edit-container-->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="" action="{{route('hundleUserAddTerrain')}}" method="post"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="complex_id" value="{{ $complex->id }}">
                                    <div class="profile-edit-container add-list-container">
                                        <div class="profile-edit-header fl-wrap">
                                            <h4>Informations</h4>
                                        </div>
                                        <div class="custom-form">
                                            <label>Nom de Terrain</label>
                                            <input type="text" name="name" required value=""/>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label>Catégorie</label>
                                                    <select class="chosen" id="terrainCategory" name="category_id">
                                                        @foreach(\App\Modules\Complex\Models\Category::all() as $category)
                                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Type de terrain</label>
                                                    <select class="chosen" id="sport_category_id" name="sport_category_id">
                                                      {{--  @foreach (\App\Modules\Complex\Models\SportCategory::all() as $sport)
                                                            <option value="{{$sport->sport_id}}">{{$sport->title}}</option>
                                                        @endforeach--}}
                                                    </select>
                                                    @if ($errors->has('sport_id'))
                                                        <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('sport_id') }}</strong>
                                            </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Activités</label>
                                                    <select class="chosen" id="sports"
                                                            name="sports[]">
                                                        @foreach (\App\Modules\Complex\Models\Sport::all() as $sport)
                                                           {{-- <optgroup id="{{$sport->id}}" label="{{$sport->title}}">
                                                                @foreach($sport->categories as $sportCategory)
                                                                    <option value="{{$sportCategory->id}}">{{$sportCategory->title}}</option>
                                                                @endforeach
                                                            </optgroup>--}}
                                                           {{-- <option value="{{$sport->id}}">{{$sport->title}}</option>--}}
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('activityList'))
                                                        <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('activityList') }}</strong>
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

                                            <label>Nature de sol</label>
                                            <input type="text" class="form-control" name="soil_type"/>
                                            @if ($errors->has('soil_type'))
                                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('soil_type') }}</strong>
                                    </span>  @endif

                                            <label>Nautre de terrain </label>
                                            <input type="text" class="form-control"
                                                   placeholder="(découvetr/couvert/intérieure..etc)"
                                                   name="terrain_nature"/>
                                            @if ($errors->has('terrain_nature'))
                                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('terrain_nature') }}</strong>
                                    </span>  @endif

                                            <label>Captation vidéo</label>
                                            <select class="chosen-select" name="video_recorder" required>
                                                <option selected value="1">Oui</option>
                                                <option value="0">Non</option>
                                            </select>
                                            @if ($errors->has('video_recorder'))
                                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('video_recorder') }}</strong>
                                    </span>  @endif

                                            <label>Eclairage: </label>
                                            <select class="chosen-select" name="lighting" required>
                                                <option selected value="1">Oui</option>
                                                <option value="0">Non</option>
                                            </select>
                                            @if ($errors->has('lighting'))
                                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('lighting') }}</strong>
                                    </span>  @endif
                                            <label>Hauteur: </label>
                                            <input type="number" name="height" value="" required min="1" max="9999">
                                            @if ($errors->has('height'))
                                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                            @endif

                                            <label>Longueur </label>
                                            <input type="number" name="length" value="" required min="1" max="9999">
                                            @if ($errors->has('length'))
                                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('length') }}</strong>
                                    </span>
                                            @endif
                                            <label>largueur </label>
                                            <input type="number" name="width" value="" required min="1" max="9999">
                                            @if ($errors->has('width'))
                                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('width') }}</strong>
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
                                                        <input required type="file" class="form-control" name="images[]"
                                                               multiple>
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
                                                <button type="button" name="button" id="add-time"
                                                        style="float:right;background-color:#4DB7FE;padding:15px;border-radius:50%">
                                                    Ajouter
                                                </button>
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
                                                        <input type="date" name="sessionDay[]" data-toggle="tooltip"
                                                               data-placement="top" required title="Tooltip on top">
                                                        @if ($errors->has('sessionDay'))
                                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('sessionDay') }}</strong>
                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" name="sessionStartTime[]" required>
                                                        @if ($errors->has('sessionStartTime'))
                                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('sessionStartTime') }}</strong>
                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" name="sessionEndTime[]" required>
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
                                    <button class="btn  big-btn  color-bg flat-btn">Enregistrer<i
                                                class="fa fa-angle-right"></i></button>
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
    <script src="{{ asset('js/frontOffice/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $("#terrainCategory").select2({
            placeholder: "Choisir la catégorie "
        });

        $("#sport_category_id").select2({
            placeholder: "Choisir la catégorie du sport",
            minimumInputLength: 1,
            allowClear: true,
            ajax: {
                url: "../../sportsCategories/",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;

                    return {
                        results: data.categories
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            templateResult: formatRepo,
            templateSelection: formatRepoSelection,

        });

		$("#sport_category_id").on('select2:select', function (e) {
			var data = e.params.data;
			console.log(data.id);

			$("#sports").select2({
				ajax: {
					url: "../../getSports/",
					dataType: 'json',
					delay: 250,
					data: function (params) {
						return {
							q: data.id
						};
					},
					processResults: function (data, params) {
						// parse the results into the format expected by Select2
						// since we are using custom formatting functions we do not need to
						// alter the remote JSON data, except to indicate that infinite
						// scrolling can be used
						params.page = params.page || 1;

						return {
							results: data.sports
						};
					},
					cache: true
				},
				minimumInputLength: 1,
				templateResult: formatRepo,
				templateSelection: formatRepoSelection,
            });
		});

        $("#sports").select2({
            multiple: true,
            placeholder: "Choisir les sports",
            minimumInputLength: 1,
           /* ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
                url: "../../sportsCategories/"+q,
                dataType: 'json',
                quietMillis: 250,
                data: function (term, page) {
                    return {
                        q: term, // search term
                    };
                },
                results: function (data, page) { // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to alter the remote JSON data
                    return { results: data.categories };
                },
                cache: true
            },
            initSelection: function(element, callback) {
                // the input tag has a value attribute preloaded that points to a preselected repository's id
                // this function resolves that id attribute to an object that select2 can render
                // using its formatResult renderer - that way the repository name is shown preselected
                var id = $(element).val();
                if (id !== "") {
                    $.ajax("../../sportsCategories/"+q, {
                        dataType: "json"
                    }).done(function(data) { callback(data); });
                }
            },
            dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
            escapeMarkup: function (m) { return m; } // we do not want to escape markup since we are displaying html in results*/


        });

        $(document).ready(function (){


            $('select').on('select2:close', function (evt) {
                var uldiv = $(this).siblings('span.select2').find('ul');
                var count = $(this).select2('data').length;
                if (count == 0) {
                    uldiv.html("");
                }
                else {
                    uldiv.html("<li>" + count + " activités</li>");
                }
            });

        });

        $('#complex').change(function () {

            var selectedComplex = $(this).children("option:selected").val();
            console.log(selectedComplex);
            $('#complexCategory').children().remove();

            $.get("{{ route('showHome')}}/category/" + selectedComplex).done(function (res) {
                $('#complexCategory').prop('disabled', false);
                $.each(res.categories, function (j, d) {
                    console.log(d);
                    $('#complexCategory').append('<option value="' + d.category.id + '">' + d.category.title + '</option>');


                });

            });

        });
        var i = 0;
        $('#add-time').on('click', function () {
            i++;
            $('#date').append('<div class="row" id = "date' + i + '">' +
                '<div class="col-md-4">' +
                '<input class="form-control in-step2" type="date" name="sessionDay[]" required data-toggle="tooltip" data-placement="top" title="Tooltip on top">' +
                '</div>' +
                '<div class="col-md-3">' +
                '<input class="form-control in-step2" type="time" name="sessionStartTime[]" required>' +
                '</div>' +
                '<div class="col-md-3">' +
                '<input class="form-control in-step2" type="time" name="sessionEndTime[]" required>' +
                '</div>' +
                '<button type="button" name="button" class = "button" data-index = "' + i + '"><i class="fa fa-times-circle cross-keywrd" ></i></button>' +

                '</div>'
            );

        });

        $(document).on("click", ".button", function () {
            console.log($(this).data('index'));
            var id = $(this).data('index');
            $("#date" + id).remove();
        });

        $("#choose_sport").on("change", function () {
            $("#select_activity_list :selected").removeAttr("selected");
            var arr = $("#choose_sport :selected").text();
            if (arr !== 'All') { // arbitrary value to show all
                $("#select_activity_list").children("optgroup").hide();
                $("#select_activity_list").children("optgroup[label='" + arr + "']").show();
            } else {
                $("#select_activity_list").children("optgroup").show();
            }
        })

        function formatRepo (repo) {
            if (repo.loading) {
                return repo.text;
            }

            var $container = $(
                "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__title'></div>" +
                "</div>" +
                "</div>" +
                "</div>"
            );

            $container.find(".select2-result-repository__title").text(repo.title);

            return $container;
        }

        function formatRepoSelection (repo) {
            return repo.title || repo.text;
        }

    </script>

@endsection
