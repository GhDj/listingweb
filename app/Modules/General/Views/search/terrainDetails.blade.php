@extends('frontOffice.layout')

@section('head')

    @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Terrain' ])



@endsection



@section('header')


    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'','faq'=>'','profile'=>'act-link','associations'=>'','infrastructure'=>'']])

@endsection


@section('content')
    @include('sweet::alert')
    <style media="screen">
        .leave-rating label {
            font-size: 14px;
            float: right;
            letter-spacing: 4px;
            color: #FACC39;
            cursor: pointer;
            transition: 0.3s;
            width: 15px;
        }
        .list-widget-social i
        {
            margin-top: 10px;
        }
    </style>
    <!-- wrapper -->
    <div id="wrapper">
        <!--  content  -->
        <div class="content">

            <!--  section  -->

        @include('General::inc.headerItems')

        <!--  section end -->

            <div class="scroll-nav-wrapper fl-wrap">
                <div class="container" style="max-width:100%">
                    <nav class="scroll-nav scroll-init">
                        <ul>
                            <li><a href="#sec2">Carte</a></li>
                            <li><a href="#sec6">Description</a></li>
                            <li><a href="#sec7">Equipement Sportif</a></li>
                            <li><a href="#sec3">Photos</a></li>
                            <li><a href="#sec4">Avis</a></li>
                            <li><a href="#sec5">Donnez Votre Avis</a></li>
                            <li><a href="#sec8">Signaler un problem</a></li>
                        </ul>
                    </nav>

                </div>
            </div>

            <!--  section  -->
            <section class="gray-section no-top-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                <div class="breadcrumbs gradient-bg  fl-wrap"><a href="#">Accueil</a><a
                                            href="#">List</a><span>Terrain</span></div>
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap" id="sec2">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Carte</h3>
                                    </div>
                                    <div class="team-holder fl-wrap">
                                        <div class="map-container">
                                            <div id="singleMap" data-latitude="{{$terrain->complex->address->latitude}}"
                                                 data-longitude="{{$terrain->complex->address->longitude}}"
                                                 data-mapTitle="Notre Emplacement"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap" id="sec6">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Description</h3>
                                    </div>
                                    <p>{{ $terrain->description }}</p>

                                </div>

                                <div class="list-single-main-item fl-wrap" id="sec7">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Equipement Sportif</h3>
                                    </div>

                                    <table id="clubs">
                                        <tr>
                                            <th>Nom Terrain</th>
                                            <th>Description</th>
                                            <th>Sport</th>
                                        </tr>

                                        @foreach ($terrain->complex->terrains as $terrainComplex)

                                            <tr>
                                                <td>{{$terrainComplex->name}}</td>
                                                <td>{{$terrainComplex->description}}</td>
                                                <td>{{$terrainComplex->sport->title}}</td>
                                            </tr>

                                        @endforeach

                                    </table>


                                </div>

                                <div class="list-single-main-item fl-wrap" id="sec3">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Galerie - Photos</h3>
                                    </div>
                                    <!-- gallery-items   -->
                                    <div class="gallery-items grid-small-pad  list-single-gallery three-coulms lightgallery">
                                        <!-- 1 -->

                                        @foreach ($terrain->medias as $media)
                                            <div class="gallery-item">
                                                <div class="grid-item-holder">
                                                    <div class="box-item">
                                                        <img src="{{$media->link}}" alt="">
                                                        <a href="{{$media->link}}" class="gal-link popup-image"><i
                                                                    class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach


                                    </div>

                                    @if(Auth::user())
                                        <div class="share-holder hid-share">
                                            <div class="showshare">
                                                <span>Partager avec vos proches </span><i
                                                        class="fa fa-share"></i></div>
                                            <div class="share-container  isShare"></div>
                                        </div>
                                    <div class="profile-edit-container add-list-container">
                                        <div class="profile-edit-header fl-wrap">
                                            <h4>Ajouter des photos</h4>
                                        </div>
                                        <div class="custom-form">
                                            <div class="row">
                                                <!--col -->
                                                <div class="col-md-12">

                                                    <form action="{{ route('handleUserUploadImage') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                                                        @csrf

                                                        <input type="hidden" name="terrain_id" value="{{ $terrain->id }}">


                                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">




                                                        <div class="add-list-media-wrap fuzone">

                                                            <div class="fu-text">
                                                                <span><i class="fa fa-picture-o"></i> Cliquez ici ou déposez des images à télécharger</span>
                                                            </div>
                                                            <input required type="file" class="form-control" name="images[]"
                                                                   multiple>
                                                            @if ($errors->has('images'))
                                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('images') }}</strong>
                                                    </span>
                                                            @endif
                                                        </div>

                                                        <button class="btn  big-btn  color-bg flat-btn">Ajouter <i
                                                                    class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                                    </form>

                                                </div>
                                                <!--col end-->

                                            </div>
                                        </div>
                                    </div>
                                        @else
                                        <div class="share-holder hid-share show-reg-form modal-open ">
                                            <div class="">
                                                <span>Partager vos photos </span>
                                            </div>
                                        </div>
                                @endif
                                    <!-- end gallery items -->
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap" id="sec4">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3><span> {{ $terrain->reviews->count() }} </span> - Commentaires - </h3>
                                    </div>

                                    @if(!Auth::user())
                                        <div class="share-holder hid-share show-reg-form modal-open ">
                                            <div class="">
                                                <span>Partager votre commentaire </span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="reviews-comments-wrap">

                                    @foreach ($terrain->reviews as $review)
                                        <!-- reviews-comments-item -->
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="{{$review->reviewer->picture}}" alt="">
                                                </div>
                                                <div class="reviews-comments-item-text">
                                                    <h4>
                                                        <a href="#">{{$review->reviewer->first_name}} {{$review->reviewer->last_name}}</a>
                                                    </h4>
                                                    <div class="listing-rating card-popup-rainingvis"
                                                         data-starrating2="{{ $review->note }}"></div>
                                                    <div class="clearfix"></div>
                                                    <p>" {{ $review->comment }} "</p>
                                                    @if ($review->medias->count()>0)
                                                        <img src="{{$review->medias->first()->link}}" alt=""
                                                             style="float: right; width: 50%;">
                                                    @endif

                                                    <span class="reviews-comments-item-date"><i
                                                                class="fa fa-calendar-check-o"></i>{{$review->updated_at->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end-->

                                        @endforeach


                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap" id="sec5">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Donnez Votre Avis</h3>
                                    </div>
                                    <!-- Add Review Box -->
                                    @if(Auth::user())
                                        <div id="add-review" class="add-review-box">
                                            <!-- Review Comment -->
                                            <form class="add-comment custom-form"
                                                  action="{{ route('hundleUserReviews',['terrain_id'=>$terrain->id])}}"
                                                  method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="leave-rating-wrap col-md-12">
                                                        <span class="leave-rating-title">Note globale: </span>
                                                        <div class="leave-rating">
                                                            <span class="note"></span>/5
                                                            <input type="hidden" name="note">
                                                        </div>
                                                        {{--<div class="leave-rating">
                                                            <input type="radio" name="rating" id="rating-5" value="5"/>
                                                            <label for="rating-5" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating" id="rating-4" value="4"/>
                                                            <label for="rating-4" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating" id="rating-3" value="3"/>
                                                            <label for="rating-3" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating" id="rating-2" value="2"/>
                                                            <label for="rating-2" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating" id="rating-1" value="1"/>
                                                            <label for="rating-1" class="fa fa-star-o"></label>
                                                        </div>--}}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="leave-rating-wrap col-md-6">
                                                        <span class="leave-rating-title">Accueil et services : </span>

                                                       <div class="leave-rating">

                                                            <input type="radio" name="rating-accueil" id="rating-1-accueil" value="5" />
                                                            <label for="rating-1-accueil" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-accueil" id="rating-2-accueil" value="4"/>
                                                            <label for="rating-2-accueil" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-accueil" id="rating-3-accueil" value="3"/>
                                                            <label for="rating-3-accueil" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-accueil" id="rating-4-accueil" value="2"/>
                                                            <label for="rating-4-accueil" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-accueil" id="rating-5-accueil" value="1"/>
                                                            <label for="rating-5-accueil" class="fa fa-star-o"></label>
                                                        </div>
                                                    </div>
                                                    <div class="leave-rating-wrap col-md-6">
                                                        <span class="leave-rating-title">Propreté / Sécurité : </span>
                                                        <div class="leave-rating">
                                                            <input type="radio" name="rating-securite" id="rating-1-securite" value="5" />
                                                            <label for="rating-1-securite" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-securite" id="rating-2-securite" value="4"/>
                                                            <label for="rating-2-securite" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-securite" id="rating-3-securite" value="3"/>
                                                            <label for="rating-3-securite" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-securite" id="rating-4-securite" value="2"/>
                                                            <label for="rating-4-securite" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-securite" id="rating-5-securite" value="1"/>
                                                            <label for="rating-5-securite" class="fa fa-star-o"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row"><div class="leave-rating-wrap col-md-6">
                                                        <span class="leave-rating-title">Modernité des équipements : </span>
                                                        <div class="leave-rating">
                                                            <input type="radio" name="rating-modernite" id="rating-1-modernite" value="5" />
                                                            <label for="rating-1-modernite" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-modernite" id="rating-2-modernite" value="4"/>
                                                            <label for="rating-2-modernite" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-modernite" id="rating-3-modernite" value="3"/>
                                                            <label for="rating-3-modernite" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-modernite" id="rating-4-modernite" value="2"/>
                                                            <label for="rating-4-modernite" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-modernite" id="rating-5-modernite" value="1"/>
                                                            <label for="rating-5-modernite" class="fa fa-star-o"></label>
                                                        </div>
                                                    </div>
                                                    <div class="leave-rating-wrap col-md-6">
                                                        <span class="leave-rating-title">Qualités des activités : </span>
                                                        <div class="leave-rating">
                                                            <input type="radio" name="rating-activite" id="rating-8-activite" value="5" />
                                                            <label for="rating-8-activite" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-activite" id="rating-4-activite" value="4" />
                                                            <label for="rating-4-activite" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-activite" id="rating-3-activite" value="3"/>
                                                            <label for="rating-3-activite" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-activite" id="rating-2-activite" value="2"/>
                                                            <label for="rating-2-activite" class="fa fa-star-o"></label>
                                                            <input type="radio" name="rating-activite" id="rating-1-activite" value="1"/>
                                                            <label for="rating-1-activite" class="fa fa-star-o"></label>
                                                        </div>
                                                    </div></div>
                                                <fieldset>

                                                <textarea cols="40" rows="3" placeholder="Votre commentaire:"
                                                          name="comment"></textarea>
                                                </fieldset>
                                                <button class="btn  big-btn  color-bg flat-btn">Poster le commentaire <i
                                                            class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                            </form>
                                        </div>
                                        @else
                                        <div class="row">
                                            <h3>Vous devez vous connecter pour donner votre avis</h3>
                                            <div class="share-holder hid-share show-reg-form modal-open ">
                                                <div class="">
                                                    <span>Partager votre avis </span>
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    <!-- Add Review Box / End -->
                                </div>
                                <!-- list-single-main-item end -->

                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap" id="sec8">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Signaler Un problem</h3>
                                    </div>
                                    <!-- Add Review Box -->
                                    <div id="add-review" class="add-review-box">
                                        <!-- Review Comment -->
                                        <form class="add-comment custom-form"
                                              action="{{route('hundleUserReport',['terrain_id'=>$terrain->id])}}"
                                              method="post">

                                            {{ csrf_field() }}
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-12">


                                                        <select data-placeholder="Categories" class="chosen-select"
                                                                name="title">
                                                            <option value="">Les catégories</option>
                                                            <option value="Vétusté des équipements">Vétusté des équipements</option>
                                                            <option value="Problèmes de sécurité">Problèmes de sécurité</option>
                                                            <option value="Problème de propreté">Problème de propreté</option>
                                                            <option value="Je veux signaler autre chose">Je veux signaler autre chose </option>

                                                        </select>


                                                    </div>

                                                </div>
                                                <textarea cols="40" rows="3" placeholder="Signaler Un problem:"
                                                          name="description"></textarea>
                                            </fieldset>
                                            <button class="btn  big-btn  color-bg flat-btn">Envoyer <i
                                                        class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                    <!-- Add Review Box / End -->
                                </div>
                                <section class="gradient-bg">
                                    <div class="cirle-bg">
                                        <div class="bg" data-bg="images/bg/circle.png" style="background-image: url(&quot;images/bg/circle.png&quot;);"></div>
                                    </div>
                                    <div class="container" style="margin:0 auto;text-align:center">
                                        <div class="join-wrap fl-wrap">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 style="text-align:center;width:90%;margin-bottom: 5%;">Rejoignez l'olympiade family</h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="share-holder">
                                                        <div class="showshare" style="float:left;padding: 15px 40px;margin-left:10%"><span>suivi activité sportive</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="share-holder">
                                                        <div class="showshare" style="float:left;padding: 15px 40px;margin-left:10%"><span>Gagnez des recompenses</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- list-single-main-item end -->
                            @if (Auth::user())
                                @if (checkPublicComplexRole(Auth::user())||checkPrivateComplexRole(Auth::user()))

                                    <!-- list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap" id="sec4">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3><span> {{ $terrain->reports->count() }} </span> - Report - </h3>
                                            </div>
                                            <div class="reviews-comments-wrap">

                                            @foreach ($terrain->reports as $report)
                                                <!-- reviews-comments-item -->
                                                    <div class="reviews-comments-item">
                                                        <div class="review-comments-avatar">
                                                            <img src="{{$report->reporter->picture}}" alt="">
                                                        </div>
                                                        <div class="reviews-comments-item-text">
                                                            <h4>
                                                                <a href="#">{{$review->reviewer->first_name}} {{$review->reviewer->last_name}}</a>
                                                            </h4>

                                                            <div class="clearfix"></div>
                                                            <p>" {{ $report->title }} "</p>
                                                            <p>" {{ $report->description }} "</p>
                                                            <span class="reviews-comments-item-date"><i
                                                                        class="fa fa-calendar-check-o"></i>{{$review->updated_at->diffForHumans()}}</span>
                                                        </div>
                                                    </div>
                                                    <!--reviews-comments-item end-->

                                                @endforeach


                                            </div>
                                        </div>
                                        <!-- list-single-main-item end -->

                                @endif
                            @endif


                            <!-- list-single-main-item -->

                                <!-- list-single-main-item end -->
                            </div>

                            <!--section -->

                            <!--end section -->

                        </div>
                        <!--box-widget-wrap -->
                        <div class="col-md-4">
                            <div class="box-widget-wrap">

                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap">
                                    <div class="box-widget-item-header">
                                        <h3>Heures d'Ouverture : </h3>
                                    </div>
                                    <div class="box-widget opening-hours">
                                        <div class="box-widget-content">
                                            @if(count($terrain->schedules)>0)
                                                <span class="current-status"><i
                                                            class="fa fa-clock-o"></i> Ouvert</span>
                                                <ul>
                                                    @foreach ($terrain->schedules as $schedule)
                                                        <li>
                                                            <span class="opening-hours-day">{{$schedule->day}} </span><span
                                                                    class="opening-hours-time">{{$schedule->start_at->format('H:i')}}
                                                                - {{$schedule->ends_at->format('H:i')}}</span></li>
                                                    @endforeach

                                                </ul>
                                            @else
                                                <span class="current-status"><i class="fa fa-clock-o"></i>Horaires non disponbile</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->

                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap">
                                    <div class="box-widget-item-header">
                                        <h3>Météo : </h3>
                                    </div>
                                    <div id="weather-widget" class="gradient-bg"></div>
                                </div>
                                <!--box-widget-item end -->

                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap">
                                    <div class="box-widget-item-header">
                                        <h3>Location / Contacts : </h3>
                                    </div>
                                    <div class="box-widget">
                                        <div class="box-widget-content">
                                            <div class="list-author-widget-contacts list-item-widget-contacts">
                                                <ul>
                                                    <li><span><i class="fa fa-map-marker"></i> Addresse :</span> <a
                                                                href="#">{{ $terrain->complex->address->address }}</a>
                                                    </li>
                                                    <li><span><i class="fa fa-phone"></i> Téléphone :</span> <a
                                                                href="#">{{ $terrain->complex->phone }}</a></li>
                                                    <li><span><i class="fa fa-envelope-o"></i> Email :</span> <a
                                                                href="mailto:{{ $terrain->complex->email }}">{{ $terrain->complex->email }}</a>
                                                    </li>
                                                    <li><span><i class="fa fa-globe"></i> Site Web :</span> <a
                                                                href="{{ $terrain->complex->web_site }}"
                                                                target="_blank">Visiter Notre Website</a></li>
                                                </ul>
                                            </div>
                                            <div class="list-widget-social">
                                                <ul>
                                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-vk"></i></a></li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->

                                <!--box-widget-item -->

                                <!--box-widget-item end -->

                            </div>
                        </div>
                        <!--box-widget-wrap end -->
                    </div>
                </div>
            </section>
            <!--  section end -->
            <div class="limit-box fl-wrap"></div>

        </div>
        <!--  content end  -->
    </div>
    <a class="to-top"><i class="fa fa-angle-up"></i></a>
    <!-- wrapper end -->
@endsection



@section('footer')

    @include('frontOffice.inc.footer')

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            var lat = "{{$terrain->complex->address->latitude}}";

            var lon = "{{$terrain->complex->address->longitude}}";
            $.ajax({
                url: 'https://api.openweathermap.org/data/2.5/weather?lat=' + lat + "&lon=" + lon + "&units=metric&lang=fr&APPID=c10bb3bd22f90d636baa008b1529ee25",
                type: "GET",
                dataType: "jsonp",
                success: function (data) {
                    var widget = showResults(data);
                    $("#weather-widget").html(widget);

                }

            });

        });

        function showResults(data) {

            var description = data.weather[0].description.charAt(0).toUpperCase() + data.weather[0].description.substr(1);

            return '<div class="flatWeatherPlugin sample">' +
                '<h2>' + data.name + ', ' + data.sys.country + '</h2>' +
                '<div class="wiToday">' +
                '<div class="wiIconGroup">' +
                '<div class="wi wi' + data.weather[0].id + '"></div>' +
                '<p class="wiText">' + description + '</p>' +
                '</div>' +
                '<p class="wiTemperature">' + data.main.temp_min + '<sup>&deg;C</sup></p>' +
                '</div>' +
                '</div>';
        }

        $(document).ready(function () {

            $('.wichlist').click(function (e) {
                e.preventDefault();
                var id = "";

                var terrainId = $(this).data('terrain');
                var clubId = $(this).data('club');

                if (terrainId != null) {
                    id = terrainId;
                    type = "terrain";

                }
                if (clubId) {
                    id = clubId;
                    type = "club";
                }

                $.get("{{ route('showHome')}}/userWichlist/" + type + "/" + id).done(function (res) {

                    $('#favorieTerrains span').html(res.favorieTerrains);
                    $('#favorieClubs span').html(res.favorieClubs);
                    if (res.status == "added") {
                        $('#' + res.type + res.id + '>span').html('<img id="theImg" src="{{asset('img/like.png')}}" />');
                    }
                    if (res.status == "deleted") {
                        $('#' + res.type + res.id + '>span').html('<img id="theImg" src="{{asset('img/unlike.png')}}" />');
                    }

                });

            });

            $('input[type=radio][name=rating-accueil]').change(function(){
                a =  parseInt($('input[type=radio][name=rating-accueil]:checked').val() ) || 0 ;
                b=   parseInt($('input[type=radio][name=rating-activite]:checked').val() ) || 0;
                c=   parseInt($('input[type=radio][name=rating-modernite]:checked').val() ) || 0;
                d=   parseInt($('input[type=radio][name=rating-securite]:checked').val()) || 0;
                rating = a +b +c +d;
                $('input[name=note]').val(Math.round((rating/4)));
                switch(Math.round((rating/4))) {
                    case 1:
                        /*   $('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                           $('input[type=radio][name=rating][value="1"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 2:
                        /* $('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                         $('input[type=radio][name=rating][value="2"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 3:
                        /*$('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                        $('input[type=radio][name=rating][value="3"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 4:
                        /*$('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                        $('input[type=radio][name=rating][value="4"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 5:
                        /*$('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                        $('input[type=radio][name=rating][value="5"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                }

                //$('input[type=radio][name=rating]').val(rating/4);
            });

            $('input[type=radio][name=rating-activite]').change(function(){
                a =  parseInt($('input[type=radio][name=rating-accueil]:checked').val() ) || 0 ;
                b=   parseInt($('input[type=radio][name=rating-activite]:checked').val() ) || 0;
                c=   parseInt($('input[type=radio][name=rating-modernite]:checked').val() ) || 0;
                d=   parseInt($('input[type=radio][name=rating-securite]:checked').val()) || 0;
                rating = a +b +c +d;
                $('input[name=note]').val(Math.round((rating/4)));
                switch(Math.round((rating/4))) {
                    case 1:
                        /*   $('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                           $('input[type=radio][name=rating][value="1"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 2:
                        /* $('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                         $('input[type=radio][name=rating][value="2"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 3:
                        /*$('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                        $('input[type=radio][name=rating][value="3"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 4:
                        /*$('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                        $('input[type=radio][name=rating][value="4"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 5:
                        /*$('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                        $('input[type=radio][name=rating][value="5"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                }

                    //$('input[type=radio][name=rating]').val(rating/4);
            });

            $('input[type=radio][name=rating-securite]').change(function(){
                a =  parseInt($('input[type=radio][name=rating-accueil]:checked').val() ) || 0 ;
                 b=   parseInt($('input[type=radio][name=rating-activite]:checked').val() ) || 0;
                 c=   parseInt($('input[type=radio][name=rating-modernite]:checked').val() ) || 0;
                 d=   parseInt($('input[type=radio][name=rating-securite]:checked').val()) || 0;
                 rating = a +b +c +d;
                $('input[name=note]').val(Math.round((rating/4)));
                switch(Math.round((rating/4))) {
                    case 1:
                        /*   $('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                           $('input[type=radio][name=rating][value="1"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 2:
                        /* $('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                         $('input[type=radio][name=rating][value="2"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 3:
                        /*$('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                        $('input[type=radio][name=rating][value="3"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 4:
                        /*$('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                        $('input[type=radio][name=rating][value="4"]').attr('checked','checked');*/
                        $('.note').text("4");
                        break;
                    case 5:
                        /*$('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                        $('input[type=radio][name=rating][value="5"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                }

                //$('input[type=radio][name=rating]').val(rating/4);
            });

            $('input[type=radio][name=rating-modernite]').change(function(){
                a =  parseInt($('input[type=radio][name=rating-accueil]:checked').val() ) || 0 ;
                b=   parseInt($('input[type=radio][name=rating-activite]:checked').val() ) || 0;
                c=   parseInt($('input[type=radio][name=rating-modernite]:checked').val() ) || 0;
                d=   parseInt($('input[type=radio][name=rating-securite]:checked').val()) || 0;
                rating = a +b +c +d;
                $('input[name=note]').val(Math.round((rating/4)));
                switch(Math.round((rating/4))) {
                    case 1:
                        /*   $('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                           $('input[type=radio][name=rating][value="1"]').attr('checked','checked');*/
                        $('.note').text(rating/4);

                        break;
                    case 2:
                        /* $('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                         $('input[type=radio][name=rating][value="2"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 3:
                        /*$('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                        $('input[type=radio][name=rating][value="3"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 4:
                        /*$('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                        $('input[type=radio][name=rating][value="4"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                    case 5:
                        /*$('input[type=radio][name=rating][checked=checked]').removeAttr('checked');
                        $('input[type=radio][name=rating][value="5"]').attr('checked','checked');*/
                        $('.note').text(rating/4);
                        break;
                }

                //$('input[type=radio][name=rating]').val(rating/4);
            });
        });

    </script>



@endsection
