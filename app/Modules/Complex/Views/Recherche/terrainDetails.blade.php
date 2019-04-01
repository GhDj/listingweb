
@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Terrain' ])



@endsection



@section('header')


  @include('frontOffice.inc.header',['activatedLink'=>['home'=>'act-link','contact'=>'','faq'=>'','profile'=>'']])

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
</style>
<!-- wrapper -->
<div id="wrapper">
  <!--  content  -->
  <div class="content">

    <!--  section  -->

    @include('Infrastructure::inc.headerItems')

    <!--  section end -->

    <div class="scroll-nav-wrapper fl-wrap">
      <div class="container" style="max-width:100%">
        <nav class="scroll-nav scroll-init">
          <ul>
            <li><a href="#sec2">Carte</a></li>
            <li><a href="#sec6">Déscription</a></li>
            <li><a href="#sec7">Equipement Sportif</a></li>
            <li><a href="#sec3">Photos</a></li>
            <li><a href="#sec4">Avis</a></li>
            <li><a href="#sec5">Donnez Votre Avis</a></li>
            <li><a href="#sec8">Signaler un problem</a></li>
            <li><a href="#sec9">Decouvre les club present</a></li>
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
              <div class="breadcrumbs gradient-bg  fl-wrap"><a href="#">Accueil</a><a href="#">List</a><span>Terrain</span></div>
              <!-- list-single-main-item -->
              <div class="list-single-main-item fl-wrap" id="sec2">
                <div class="list-single-main-item-title fl-wrap">
                  <h3>Carte</h3>
                </div>
                <div class="team-holder fl-wrap">
                  <div class="map-container">
                    <div id="singleMap" data-latitude="{{$terrain->complex->address->latitude}}" data-longitude="{{$terrain->complex->address->longitude}}" data-mapTitle="Notre Emplacement"></div>
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
                <div class="accordion">
                  @foreach ($terrain->equipments as $equipment)
                    <a class="toggle act-accordion" href="#"> {{$equipment->name}} <i class="fa fa-angle-down"></i></a>
                    <div class="accordion-inner visible">
                      <div class="list-single-main-item-title">
                        <h4 style="color:gray">Déscription</h4>
                      </div>


                        <div class="gallery-item" style="width:100%;margin-bottom:15px;">
                          <div class="grid-item-holder">
                            <div class="box-item">
                              <img src="{{$equipment->medias->first()->link}}" alt="{{$equipment->medias->first()->link}}">
                            </div>
                          </div>
                        </div>


                        <p>Hauteur :  - {{$equipment->hauteur}} m</p>
                        <p>Longueur: - {{$equipment->longueur}} m</p>
                        <p>Largueur: - {{$equipment->largueur}} m</p>
                        <p>Surface: - {{$equipment->getSizeEquipement($equipment->id)}} m²</p>

                        <table id="clubs">
                          <tr>
                            <th>Type Activite</th>
                            <th>Prescable</th>
                            <th>Niveau</th>
                          </tr>

                          <tr>
                            <td>{{$equipment->speciality->speciality}}</td>
                            <td>Prescable</td>
                            <td>Niveau</td>
                          </tr>
                        </table>
                        <p style="margin-top:25px">{{ $equipment->description }}</p>
                    </div>
                  @endforeach
                </div>
              </div>

              <div class="list-single-main-item fl-wrap" id="sec3">
                <div class="list-single-main-item-title fl-wrap">
                  <h3>Gallery - Photos</h3>
                </div>
                <!-- gallery-items   -->
                <div class="gallery-items grid-small-pad  list-single-gallery three-coulms lightgallery">
                  <!-- 1 -->

                  @foreach ($terrain->medias as $media)
                    <div class="gallery-item">
                      <div class="grid-item-holder">
                        <div class="box-item">
                          <img src="{{$media->link}}" alt="">
                          <a href="{{$media->link}}" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                        </div>
                      </div>
                    </div>

                  @endforeach


                </div>
                <div class="share-holder hid-share">
                  <div class="showshare"><span>Partager Vos Photos Et Gagner des recompenses </span><i class="fa fa-share"></i></div>
                  <div class="share-container  isShare"></div>
                </div>
                <!-- end gallery items -->
              </div>
              <!-- list-single-main-item end -->
              <!-- list-single-main-item -->
              <div class="list-single-main-item fl-wrap" id="sec4">
                <div class="list-single-main-item-title fl-wrap">
                  <h3><span> {{ $terrain->reviews->count() }} </span>  -  Commantaires  - </h3>
                </div>
                <div class="reviews-comments-wrap">

                  @foreach ($terrain->reviews as $review)
                    <!-- reviews-comments-item -->
                    <div class="reviews-comments-item">
                      <div class="review-comments-avatar">
                        <img src="{{$review->reviewer->picture}}" alt="">
                      </div>
                      <div class="reviews-comments-item-text">
                        <h4><a href="#">{{$review->reviewer->first_name}} {{$review->reviewer->last_name}}</a></h4>
                        <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $review->note }}"> </div>
                        <div class="clearfix"></div>
                        <p>" {{ $review->comment }} "</p>
                        @if ($review->medias->count()>0)
                          <img src="{{$review->medias->first()->link}}" alt="" style="float: right; width: 50%;">
                        @endif

                        <span class="reviews-comments-item-date"><i class="fa fa-calendar-check-o"></i>{{$review->updated_at->diffForHumans()}}</span>
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
                <div id="add-review" class="add-review-box">
                  <!-- Review Comment -->
                  <form class="add-comment custom-form" action = "{{ route('hundleUserReviews',['terrain_id'=>$terrain->id])}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <div class="leave-rating-wrap">
                      <span class="leave-rating-title">Avis 1 : </span>
                      <div class="leave-rating">
                        <input type="radio" name="rating" id="rating-1" value="1" />
                        <label for="rating-1" class="fa fa-star-o"></label>
                        <input type="radio" name="rating" id="rating-2" value="2" />
                        <label for="rating-2" class="fa fa-star-o"></label>
                        <input type="radio" name="rating" id="rating-3" value="3" />
                        <label for="rating-3" class="fa fa-star-o"></label>
                        <input type="radio" name="rating" id="rating-4" value="4" />
                        <label for="rating-4" class="fa fa-star-o"></label>
                        <input type="radio" name="rating" id="rating-5" value="5" />
                        <label for="rating-5" class="fa fa-star-o"></label>
                      </div>
                    </div>
                    <fieldset>

                      <textarea cols="40" rows="3" placeholder="Your Review:" name="comment"></textarea>

                      <div class="change-photo-btn">
                        <div class="photoUpload">
                          <span><i class="fa fa-upload"></i> Ajouter Photo</span>
                          <input type="file" class="upload" name="image">
                        </div>
                      </div>
                    </fieldset>
                    <button class="btn  big-btn  color-bg flat-btn">Submit Review <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                  </form>
                </div>
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
                  <form class="add-comment custom-form" action = "{{route('hundleUserReport',['terrain_id'=>$terrain->id])}}" method="post">

                    {{ csrf_field() }}
                    <fieldset>
                      <div class="row">
                        <div class="col-md-12">


                          <select data-placeholder="Categories" class="chosen-select" name="title">
                            <option value="">Categories</option>
                            <option value="Problem 1" >Problem 1</option>
                            <option value="Problem 2">Problem 2</option>
                            <option value="Problem 3">Problem 3</option>
                            <option value="Problem 4">Problem 4</option>
                            <option value="Problem 5">Problem 5</option>
                          </select>


                        </div>

                      </div>
                      <textarea cols="40" rows="3" placeholder="Signaler Un problem:" name="description"></textarea>
                    </fieldset>
                    <button class="btn  big-btn  color-bg flat-btn">Envoyer <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                  </form>
                </div>
                <!-- Add Review Box / End -->
              </div>
              <!-- list-single-main-item end -->
              @if (Auth::user())
                @if (checkProfessionnelRole(Auth::user()))

                  <!-- list-single-main-item -->
                  <div class="list-single-main-item fl-wrap" id="sec4">
                    <div class="list-single-main-item-title fl-wrap">
                      <h3><span> {{ $terrain->reports->count() }} </span>  -  Report  - </h3>
                    </div>
                    <div class="reviews-comments-wrap">

                      @foreach ($terrain->reports as $report)
                        <!-- reviews-comments-item -->
                        <div class="reviews-comments-item">
                          <div class="review-comments-avatar">
                            <img src="{{$report->reporter->picture}}" alt="">
                          </div>
                          <div class="reviews-comments-item-text">
                            <h4><a href="#">{{$review->reviewer->first_name}} {{$review->reviewer->last_name}}</a></h4>

                            <div class="clearfix"></div>
                            <p>" {{ $report->title }} "</p>
                            <p>" {{ $report->description }} "</p>
                            <span class="reviews-comments-item-date"><i class="fa fa-calendar-check-o"></i>{{$review->updated_at->diffForHumans()}}</span>
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
              <div class="list-single-main-item fl-wrap" id="sec9">
                <div class="list-single-main-item-title fl-wrap">
                  <h3>Decouvre les club present</h3>
                </div>
                <!-- Add Review Box -->
                <div class="add-review-box">
                  <!-- Review Comment -->

                  <table id="clubs">
                    <tr>
                      <th>Nom Equipe</th>
                      <th>Nom Club</th>
                      <th>Sport</th>
                      <th>Niveau</th>
                    </tr>
                    @foreach ($terrain->clubs as $teamClubs)
                      @foreach ($teamClubs->teams as $team)
                        <tr>
                        <td>{{$team->name}}</td>
                        <td>{{$team->club->name}}</td>
                        <td>{{$team->speciality->speciality}}</td>
                        <td>{{$team->level}}</td>
                        </tr>
                      @endforeach
                    @endforeach

                  </table>
                </div>
                <!-- Add Review Box / End -->
              </div>
              <!-- list-single-main-item end -->
            </div>

            <!--section -->
            <section class="gradient-bg">
              <div class="cirle-bg">
                <div class="bg" data-bg="images/bg/circle.png"></div>
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
                    <span class="current-status"><i class="fa fa-clock-o"></i> Now Open</span>
                    <ul>
                      @foreach ($terrain->schedules as $schedule)
                      <li><span class="opening-hours-day">{{$schedule->day}} </span><span class="opening-hours-time">{{$schedule->start_at->format('H:i')}} - {{$schedule->ends_at->format('H:i')}}</span></li>
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
                        <li><span><i class="fa fa-map-marker"></i> Addresse :</span> <a href="#">{{ $terrain->complex->address->address }}</a></li>
                        <li><span><i class="fa fa-phone"></i> Téléphone :</span> <a href="#">{{ $terrain->complex->phone }}</a></li>
                        <li><span><i class="fa fa-envelope-o"></i> Email :</span> <a href="mailto:{{ $terrain->complex->email }}">{{ $terrain->complex->email }}</a></li>
                        <li><span><i class="fa fa-globe"></i> Site Web :</span> <a href="{{ $terrain->complex->web_site }}" target="_blank">Visiter Notre Website</a></li>
                      </ul>
                    </div>
                    <div class="list-widget-social">
                      <ul>
                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-vk"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!--box-widget-item end -->

              <!--box-widget-item -->
              <div class="box-widget-item fl-wrap">
                <div class="box-widget-item-header">
                  <h3>Clubs: </h3>
                </div>
                <div class="box-widget widget-posts">
                  <div class="box-widget-content">
                    <ul>
                      <li class="clearfix">
                        <a href="#" class="widget-posts-img"><img src="{{asset('images/unkown.jpg')}}" alt=""></a>
                        <div class="widget-posts-descr">
                          <a href="#" title="">Equipe 1</a>
                          <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 21 Mar 2017 </span>
                        </div>
                      </li>
                      <li class="clearfix">
                        <a href="#" class="widget-posts-img"><img src="{{asset('images/unkown.jpg')}}" alt=""></a>
                        <div class="widget-posts-descr">
                          <a href="#" title=""> Equipe 2</a>
                          <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                        </div>
                      </li>
                      <li class="clearfix">
                        <a href="#" class="widget-posts-img"><img src="{{asset('images/unkown.jpg')}}" alt=""></a>
                        <div class="widget-posts-descr">
                          <a href="#" title=""> Equipe 3</a>
                          <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
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
  $(document).ready(function() {
    var lat = "{{$terrain->complex->address->latitude}}";

    var lon = "{{$terrain->complex->address->longitude}}";
    $.ajax({
      url: 'http://api.openweathermap.org/data/2.5/weather?lat=' + lat + "&lon=" + lon + "&units=metric&lang=fr&APPID=c10bb3bd22f90d636baa008b1529ee25",
      type: "GET",
      dataType: "jsonp",
      success: function(data) {
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

  $(document).ready(function() {

      $('.wichlist').click(function(e){
        e.preventDefault();
        var id = "";

        var terrainId = $(this).data('terrain');
        var clubId =  $(this).data('club');

        if (terrainId != null) {
          id = terrainId;
          type = "terrain";

        }
        if (clubId) {
          id = clubId;
          type = "club";
        }

       $.get("{{ route('showHome')}}/userWichlist/"+type+"/"+id).done(function (res) {

          $('#favorieTerrains span').html(res.favorieTerrains);
          $('#favorieClubs span').html(res.favorieClubs);
            if (res.status == "added") {
                $('#'+res.type+res.id+'>span').html('<img id="theImg" src="{{asset('img/like.png')}}" />');
            }
            if (res.status == "deleted") {
                $('#'+res.type+res.id+'>span').html('<img id="theImg" src="{{asset('img/unlike.png')}}" />');
              }

          });

      });
   });

</script>



@endsection
