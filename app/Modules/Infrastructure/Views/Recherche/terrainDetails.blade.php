
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
                <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus
                  tellus, ut tristique elit risus at metus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat
                  volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>

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
                  <div class="gallery-item">
                    <div class="grid-item-holder">
                      <div class="box-item">
                        <img src="{{asset('images/all/single/13.jpg')}}" alt="">
                        <a href="{{asset('images/all/single/13.jpg')}}" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                      </div>
                    </div>
                  </div>
                  <!-- 1 end -->
                  <!-- 2 -->
                  <div class="gallery-item">
                    <div class="grid-item-holder">
                      <div class="box-item">
                        <img src="{{asset('images/all/single/14.jpg')}}" alt="">
                        <a href="{{asset('images/all/single/14.jpg')}}" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                      </div>
                    </div>
                  </div>
                  <!-- 2 end -->
                  <!-- 3 -->
                  <div class="gallery-item">
                    <div class="grid-item-holder">
                      <div class="box-item">
                        <img src="{{asset('images/all/single/15.jpg')}}" alt="">
                        <a href="{{asset('images/all/single/15.jpg')}}" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                      </div>
                    </div>
                  </div>
                  <!-- 3 end -->
                  <!-- 4 -->
                  <div class="gallery-item">
                    <div class="grid-item-holder">
                      <div class="box-item">
                        <img src="images/all/single/16.jpg" alt="">
                        <a href="images/all/single/16.jpg" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                      </div>
                    </div>
                  </div>
                  <!-- 4 end -->
                  <!-- 5 -->
                  <div class="gallery-item">
                    <div class="grid-item-holder">
                      <div class="box-item">
                        <img src="images/all/single/17.jpg" alt="">
                        <a href="images/all/single/17.jpg" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                      </div>
                    </div>
                  </div>
                  <!-- 5 end -->
                  <!-- 7 -->
                  <div class="gallery-item">
                    <div class="grid-item-holder">
                      <div class="box-item">
                        <img src="images/all/single/18.jpg" alt="">
                        <a href="images/all/single/18.jpg" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                      </div>
                    </div>
                  </div>
                  <!-- 7 end -->
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
                  <h3>Item Reviews - <span> 3 </span></h3>
                </div>
                <div class="reviews-comments-wrap">
                  <!-- reviews-comments-item -->
                  <div class="reviews-comments-item">
                    <div class="review-comments-avatar">
                      <img src="images/avatar/1.jpg" alt="">
                    </div>
                    <div class="reviews-comments-item-text">
                      <h4><a href="#">Jessie Manrty</a></h4>
                      <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                      <div class="clearfix"></div>
                      <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                      <span class="reviews-comments-item-date"><i class="fa fa-calendar-check-o"></i>27 May 2018</span>
                    </div>
                  </div>
                  <!--reviews-comments-item end-->
                  <!-- reviews-comments-item -->
                  <div class="reviews-comments-item">
                    <div class="review-comments-avatar">
                      <img src="images/avatar/2.jpg" alt="">
                    </div>
                    <div class="reviews-comments-item-text">
                      <h4><a href="#">Mark Rose</a></h4>
                      <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>
                      <div class="clearfix"></div>
                      <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis
                        vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
                      <span class="reviews-comments-item-date"><i class="fa fa-calendar-check-o"></i>12 April 2018</span>
                    </div>
                  </div>
                  <!--reviews-comments-item end-->
                  <!-- reviews-comments-item -->
                  <div class="reviews-comments-item">
                    <div class="review-comments-avatar">
                      <img src="images/avatar/3.jpg" alt="">
                    </div>
                    <div class="reviews-comments-item-text">
                      <h4><a href="#">Adam Koncy</a></h4>
                      <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                      <div class="clearfix"></div>
                      <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. "</p>
                      <span class="reviews-comments-item-date"><i class="fa fa-calendar-check-o"></i>03 December 2017</span>
                    </div>
                  </div>
                  <!--reviews-comments-item end-->
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
                      <li><span class="opening-hours-day">Monday </span><span class="opening-hours-time">9 AM - 5 PM</span></li>
                      <li><span class="opening-hours-day">Tuesday </span><span class="opening-hours-time">9 AM - 5 PM</span></li>
                      <li><span class="opening-hours-day">Wednesday </span><span class="opening-hours-time">9 AM - 5 PM</span></li>
                      <li><span class="opening-hours-day">Thursday </span><span class="opening-hours-time">9 AM - 5 PM</span></li>
                      <li><span class="opening-hours-day">Friday </span><span class="opening-hours-time">9 AM - 5 PM</span></li>
                      <li><span class="opening-hours-day">Saturday </span><span class="opening-hours-time">9 AM - 3 PM</span></li>
                      <li><span class="opening-hours-day">Sunday </span><span class="opening-hours-time">Closed</span></li>
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
                <div id="weather-widget" class="gradient-bg" data-city="New York" data-country="USA"></div>
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
                        <li><span><i class="fa fa-map-marker"></i> Adress :</span> <a href="#">USA 27TH Brooklyn NY</a></li>
                        <li><span><i class="fa fa-phone"></i> Phone :</span> <a href="#">+7(123)987654</a></li>
                        <li><span><i class="fa fa-envelope-o"></i> Mail :</span> AlisaNoory</li>
                        <li><span><i class="fa fa-globe"></i> Website :</span> <a href="#">themeforest.net</a></li>
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
