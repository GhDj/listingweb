
@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Terrain' ])



@endsection



@section('header')

  @include('frontOffice.inc.header')

@endsection


@section('content')
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
              <div class="breadcrumbs gradient-bg  fl-wrap"><a href="#">Home</a><a href="#">Listings</a><span>Stade</span></div>
              <!-- list-single-main-item -->
              <div class="list-single-main-item fl-wrap" id="sec2">
                <div class="list-single-main-item-title fl-wrap">
                  <h3>Carte</h3>
                </div>
                <div class="team-holder fl-wrap">
                  <div class="map-container">
                    <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781" data-mapTitle="Out Location"></div>
                  </div>
                </div>
              </div>
              <!-- list-single-main-item end -->
              <!-- list-single-main-item -->
              <div class="list-single-main-item fl-wrap" id="sec6">
                <div class="list-single-main-item-title fl-wrap">
                  <h3>Description</h3>
                </div>
                <p>{{ $result->description }}</p>

              </div>

              <div class="list-single-main-item fl-wrap" id="sec7">
                <div class="list-single-main-item-title fl-wrap">
                  <h3>Equipement Sportif</h3>
                </div>
                <div class="accordion">
                  <a class="toggle act-accordion" href="#"> Stade <i class="fa fa-angle-down"></i></a>
                  <div class="accordion-inner visible">
                    <div class="list-single-main-item-title">
                      <h4 style="color:gray">Déscription</h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam
                      erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                  </div>
                  <a class="toggle" href="#"> Gymnase <i class="fa fa-angle-down"></i></a>
                  <div class="accordion-inner">
                    <div class="list-single-main-item-title">
                      <h4 style="color:gray">Déscription</h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam
                      erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                  </div>

                </div>
              </div>

              <div class="list-single-main-item fl-wrap" id="sec3">
                <div class="list-single-main-item-title fl-wrap">
                  <h3>Gallery - Photos</h3>
                </div>
                <!-- gallery-items   -->
                <div class="gallery-items grid-small-pad  list-single-gallery three-coulms lightgallery">
                  <!-- 1 -->

                  @foreach ($result->medias as $media)
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
                  <h3><span> {{ $result->reviews->count() }} </span>  -  Commantaires  - </h3>
                </div>
                <div class="reviews-comments-wrap">

                  @foreach ($result->reviews as $review)
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
                        <span class="reviews-comments-item-date"><i class="fa fa-calendar-check-o"></i>27 May 2018</span>
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
                  <div class="leave-rating-wrap">
                    <span class="leave-rating-title">Avis 2 : </span>
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
                  <div class="leave-rating-wrap">
                    <span class="leave-rating-title">Avis 3 : </span>
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
                  <!-- Review Comment -->
                  <form class="add-comment custom-form">
                    <fieldset>
                      <div class="row">
                        <div class="col-md-6">
                          <label><i class="fa fa-user-o"></i></label>
                          <input type="text" placeholder="Your Name *" value="" />
                        </div>
                        <div class="col-md-6">
                          <label><i class="fa fa-envelope-o"></i> </label>
                          <input type="text" placeholder="Email Address*" value="" />
                        </div>
                      </div>

                      <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>

                      <div class="change-photo-btn">
                        <div class="photoUpload">
                          <span><i class="fa fa-upload"></i> Ajouter Photo</span>
                          <input type="file" class="upload">
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
                  <form class="add-comment custom-form">
                    <fieldset>
                      <div class="row">
                        <div class="col-md-12">


                          <select data-placeholder="Categories" class="chosen-select">
                            <option>Categories</option>
                            <option>Problem 1</option>
                            <option>Problem 2</option>
                            <option>Problem 3</option>
                            <option>Problem 4</option>
                            <option>Problem 5</option>
                          </select>


                        </div>

                      </div>
                      <textarea cols="40" rows="3" placeholder="Signaler Un problem:"></textarea>
                    </fieldset>
                    <button class="btn  big-btn  color-bg flat-btn">Envoyer <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                  </form>
                </div>
                <!-- Add Review Box / End -->
              </div>
              <!-- list-single-main-item end -->

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
                      <th>Club Nice</th>
                      <th>Sport</th>
                      <th>Niveau</th>
                    </tr>

                    <tr>
                      <td>*************</td>
                      <td>*************</td>
                      <td>*************</td>
                    </tr>

                    <tr>
                      <td>*************</td>
                      <td>*************</td>
                      <td>*************</td>
                    </tr>


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
                  <h3>Working Hours : </h3>
                </div>
                <div class="box-widget opening-hours">
                  <div class="box-widget-content">
                    <span class="current-status"><i class="fa fa-clock-o"></i> Now Open</span>
                    <ul>
                      @foreach ($result->schedules as $schedule)
                      <li><span class="opening-hours-day">{{$schedule->day}} </span><span class="opening-hours-time">{{$schedule->start_at->format('H:i')}} - {{$schedule->ends_at->format('H:i')}}</span></li>
                      @endforeach

                    </ul>
                  </div>
                </div>
              </div>
              <!--box-widget-item end -->

              <!--box-widget-item -->
              <div class="box-widget-item fl-wrap">
                <div class="box-widget-item-header">
                  <h3>Weather in City : </h3>
                </div>
                <div id="weather-widget" class="gradient-bg" data-city="{{$result->complex->address->city}}" data-country="{{$result->complex->address->country}}"></div>
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
                        <li><span><i class="fa fa-map-marker"></i> Adress :</span> <a href="#">{{ $result->complex->address->address }}</a></li>
                        <li><span><i class="fa fa-phone"></i> Phone :</span> <a href="#">{{ $result->complex->phone }}</a></li>
                        <li><span><i class="fa fa-envelope-o"></i> Mail :</span> {{ $result->complex->email }}</li>
                        <li><span><i class="fa fa-globe"></i> Website :</span> <a href="#">{{ $result->complex->web_site }}</a></li>
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
                  <h3>More from this employer : </h3>
                </div>
                <div class="box-widget widget-posts">
                  <div class="box-widget-content">
                    <ul>
                      <li class="clearfix">
                        <a href="#" class="widget-posts-img"><img src="images/all/1.jpg" alt=""></a>
                        <div class="widget-posts-descr">
                          <a href="#" title="">Cafe "Lollipop"</a>
                          <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 21 Mar 2017 </span>
                        </div>
                      </li>
                      <li class="clearfix">
                        <a href="#" class="widget-posts-img"><img src="images/all/2.jpg" alt=""></a>
                        <div class="widget-posts-descr">
                          <a href="#" title=""> Apartment in the Center</a>
                          <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                        </div>
                      </li>
                      <li class="clearfix">
                        <a href="#" class="widget-posts-img"><img src="images/all/3.jpg" alt=""></a>
                        <div class="widget-posts-descr">
                          <a href="#" title="">Event in City Mol</a>
                          <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                        </div>
                      </li>
                    </ul>
                    <a class="widget-posts-link" href="#">See All Listing<span><i class="fa fa-angle-right"></i></span></a>
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
