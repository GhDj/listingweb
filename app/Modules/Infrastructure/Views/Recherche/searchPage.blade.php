@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Page de Recherche' ])



@endsection



@section('header')

  @include('frontOffice.inc.header')

@endsection


@section('content')
  <!-- wrapper -->
  <div id="wrapper">
      <div class="content">

        <!--section -->
        <section  style="padding:0">
            <div class="cirle-bg">
                <div class="bg" data-bg="images/bg/circle.png"></div>
            </div>
            <div class="container">
                <div class="join-wrap fl-wrap" style="padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="listsearch-options fl-wrap" id="lisfw" >
                              <div class="container">

                                  <!-- listsearch-input-wrap  -->
                                  <div class="listsearch-input-wrap fl-wrap">
                                      <div class="listsearch-input-item">
                                          <i class="mbri-key single-i"></i>
                                          <input type="text" placeholder="Nom de stade" value=""/>
                                      </div>
                                      <div class="listsearch-input-item">
                                          <i class="mbri-key single-i"></i>
                                          <input type="text" placeholder="Quel Sport" value=""/>
                                      </div>
                                      <div class="listsearch-input-item">
                                          <i class="mbri-key single-i"></i>
                                          <input type="text" placeholder="Ou" value=""/>
                                      </div>

                                  </div>
                                  <!-- listsearch-input-wrap end -->
                              </div>
                          </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--section end -->
          <!-- Map -->
          <div class="map-container column-map right-pos-map" style="width:30%;">
              <div id="map-main"></div>
              <ul class="mapnavigation">
                  <li><a href="#" class="prevmap-nav">Prev</a></li>
                  <li><a href="#" class="nextmap-nav">Next</a></li>
              </ul>
          </div>
          <!-- Map end -->
          <!--col-list-wrap -->
          <div class="col-list-wrap left-list" style="width:70%;">

              <!-- list-main-wrap-->
              <div class="list-main-wrap fl-wrap card-listing">
                  <div class="container">
                      <!-- listing-item -->
                      <div class="listing-item list-layout">
                          <article class="geodir-category-listing fl-wrap">
                              <div class="geodir-category-img" style="width:35%">
                                  <img src="images/all/8.jpg" alt="">
                                  <div class="overlay"></div>
                                  <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
                              </div>
                              <div class="geodir-category-content fl-wrap" style="width:35%">
                                  <a class="listing-geodir-category" href="listing.html">Restourants</a>

                                  <h3><a href="listing-single.html">Luxury Restourant</a></h3>

                                  <div class="geodir-category-location"><a href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>


                                  <div class="geodir-category-options " >


                                      <div class="search-item-1">
                                      <ul>
                                        <li><a href="#">Test1</a></li>
                                        <li>Test2</li>
                                        <li>Test3</li>
                                      </ul>
                                      </div>
                                  </div>
                              </div>
                              <div class="geodir-category-content " style="width:30%">


                                  <div class="geodir-category-options " >


                                      <div class="search-item-2">
                                      <ul>
                                        <li>Ouverture</li>
                                        <li>Fermeture</li>

                                      </ul>
                                      </div>
                                  </div>
                              </div>
                          </article>
                      </div>
                      <!-- listing-item end-->
                      <!-- listing-item -->
                      <div class="listing-item list-layout">
                          <article class="geodir-category-listing fl-wrap">
                              <div class="geodir-category-img" style="width:35%">
                                  <img src="images/all/1.jpg" alt="">
                                  <div class="overlay"></div>
                                  <div class="list-post-counter"><span>15</span><i class="fa fa-heart"></i></div>
                              </div>
                              <div class="geodir-category-content fl-wrap" style="width:35%">
                                  <a class="listing-geodir-category" href="listing.html">Restourants</a>

                                  <h3><a href="listing-single.html">Luxury Restourant</a></h3>

                                  <div class="geodir-category-location"><a href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>


                                  <div class="geodir-category-options " >


                                      <div class="search-item-1">
                                      <ul>
                                        <li><a href="#">Test1</a></li>
                                        <li>Test2</li>
                                        <li>Test3</li>
                                      </ul>
                                      </div>
                                  </div>
                              </div>
                              <div class="geodir-category-content " style="width:30%">

                                  <div class="geodir-category-options " >


                                      <div class="search-item-2">
                                      <ul>
                                        <li>Ouverture</li>
                                        <li>Fermeture</li>

                                      </ul>
                                      </div>
                                  </div>
                              </div>
                          </article>
                      </div>
                      <!-- listing-item end-->
                      <div class="clearfix"></div>
                      <!-- listing-item -->
                      <div class="listing-item list-layout">
                          <article class="geodir-category-listing fl-wrap">
                              <div class="geodir-category-img"style="width:35%">
                                  <img src="images/all/4.jpg" alt="">
                                  <div class="overlay"></div>
                                  <div class="list-post-counter"><span>553</span><i class="fa fa-heart"></i></div>
                              </div>
                              <div class="geodir-category-content fl-wrap" style="width:35%">
                                  <a class="listing-geodir-category" href="listing.html">Restourants</a>

                                  <h3><a href="listing-single.html">Luxury Restourant</a></h3>

                                  <div class="geodir-category-location"><a href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>


                                  <div class="geodir-category-options " >


                                      <div class=" search-item-1">
                                      <ul>
                                        <li><a href="#">Test1</a></li>
                                        <li>Test2</li>
                                        <li>Test3</li>
                                      </ul>
                                      </div>
                                  </div>
                              </div>
                              <div class="geodir-category-content " style="width:30%">



                                  <div class="geodir-category-location"><a href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div> --}}

                          
                                  <div class="geodir-category-options " >


                                      <div class="search-item-2">
                                      <ul>
                                        <li>Ouverture</li>
                                        <li>Fermeture</li>

                                      </ul>
                                      </div>
                                  </div>
                              </div>
                          </article>
                      </div>
                      <!-- listing-item end-->
                      <!-- listing-item -->
                      <div class="listing-item list-layout">
                          <article class="geodir-category-listing fl-wrap">
                              <div class="geodir-category-img" style="width:35%">
                                  <img src="images/all/20.jpg" alt="">
                                  <div class="overlay"></div>
                                  <div class="list-post-counter"><span>47</span><i class="fa fa-heart"></i></div>
                              </div>
                              <div class="geodir-category-content fl-wrap" style="width:35%">
                                  <a class="listing-geodir-category" href="listing.html">Restourants</a>

                                  <h3><a href="listing-single.html">Luxury Restourant</a></h3>

                                  <div class="geodir-category-location"><a href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>


                                  <div class="geodir-category-options " >


                                      <div class="search-item-1">
                                      <ul>
                                        <li><a href="#">Test1</a></li>
                                        <li>Test2</li>
                                        <li>Test3</li>
                                      </ul>
                                      </div>
                                  </div>
                              </div>
                              <div class="geodir-category-content " style="width:30%">



                                  <div class="geodir-category-location"><a href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div> --}}


                                  <div class="geodir-category-options " >


                                      <div class="search-item-2">
                                      <ul>
                                        <li>Ouverture</li>
                                        <li>Fermeture</li>

                                      </ul>
                                      </div>
                                  </div>
                              </div>
                          </article>
                      </div>
                      <!-- listing-item end-->
                      <div class="clearfix"></div>
                      <!-- listing-item -->
                      <div class="listing-item list-layout">
                          <article class="geodir-category-listing fl-wrap">
                              <div class="geodir-category-img" style="width:35%">
                                  <img src="images/all/5.jpg" alt="">
                                  <div class="overlay"></div>
                                  <div class="list-post-counter"><span>3</span><i class="fa fa-heart"></i></div>
                              </div>
                              <div class="geodir-category-content fl-wrap" style="width:35%">
                                  <a class="listing-geodir-category" href="listing.html">Restourants</a>

                                  <h3><a href="listing-single.html">Luxury Restourant</a></h3>

                                  <div class="geodir-category-location"><a href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>


                                  <div class="geodir-category-options " >


                                      <div class="search-item-1">
                                      <ul>
                                        <li><a href="#">Test1</a></li>
                                        <li>Test2</li>
                                        <li>Test3</li>
                                      </ul>
                                      </div>
                                  </div>
                              </div>
                              <div class="geodir-category-content " style="width:30%">


                                  <div class="geodir-category-options " >


                                      <div class="search-item-2">
                                      <ul>
                                        <li>Ouverture</li>
                                        <li>Fermeture</li>

                                      </ul>
                                      </div>
                                  </div>
                              </div>
                          </article>
                      </div>
                      <!-- listing-item end-->
                      <!-- listing-item -->
                      <div class="listing-item list-layout">
                          <article class="geodir-category-listing fl-wrap">
                              <div class="geodir-category-img" style="width:35%">
                                  <img src="images/all/23.jpg" alt="">
                                  <div class="overlay"></div>
                                  <div class="list-post-counter"><span>35</span><i class="fa fa-heart"></i></div>
                              </div>
                              <div class="geodir-category-content fl-wrap" style="width:35%">
                                  <a class="listing-geodir-category" href="listing.html">Restourants</a>

                                  <h3><a href="listing-single.html">Luxury Restourant</a></h3>

                                  <div class="geodir-category-location"><a href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>


                                  <div class="geodir-category-options " >


                                      <div class="search-item-1">
                                      <ul>
                                        <li><a href="#">Test1</a></li>
                                        <li>Test2</li>
                                        <li>Test3</li>
                                      </ul>
                                      </div>
                                  </div>
                              </div>
                              <div class="geodir-category-content " style="width:30%">


                                  <div class="geodir-category-options " >


                                      <div class="search-item-2">
                                      <ul>
                                        <li>Ouverture</li>
                                        <li>Fermeture</li>

                                      </ul>
                                      </div>
                                  </div>
                              </div>
                          </article>
                      </div>
                      <!-- listing-item end-->
                  </div>
                  <a class="load-more-button" href="#">Load more <i class="fa fa-circle-o-notch"></i> </a>
              </div>
              <!-- list-main-wrap end-->
          </div>
          <!--col-list-wrap -->
          <div class="limit-box fl-wrap"></div>

      </div>
      <!--content end -->
  </div>
  <!-- wrapper end -->

@endsection




@section('footer')

  @include('frontOffice.inc.footer')

@endsection
