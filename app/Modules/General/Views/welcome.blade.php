
@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade' ])



@endsection



@section('header')

  @include('frontOffice.inc.header')

@endsection


@section('content')

  <div id="wrapper">
              <!-- Content-->
              <div class="content">
                  <!-- home-map-->
                  <div class="home-map fl-wrap">
                      <!-- Map -->
                      <div class="map-container fw-map">
                          <div id="map-main">
                          </div>
                      </div>
                      <!-- Map end -->
                      <div class="absolute-main-search-input">
                          <div class="container">
                              <div class="main-search-input fl-wrap">
                                  <div class="main-search-input-item">
                                      <input type="text" placeholder="Nom de stade" value=""/>
                                  </div>

                                  <div class="main-search-input-item">
                                      <select data-placeholder="All Sports" class="chosen-select" >
                                          <option>All Categories</option>
                                          <option>Swimming</option>
                                          <option>Football</option>
                                          <option>Handball</option>
                                          <option>Teniss</option>

                                      </select>
                                  </div>
                                  <div class="main-search-input-item">
                                      <input type="text" placeholder="Ou" value=""/>
                                  </div>

                                  <button class="main-search-button" onclick="window.location.href='listing.html'">Search</button>
                              </div>
                          </div>
                      </div>
                      <!-- home-map end-->
                  </div>
                  <!-- home-map end -->

                  <!--section -->

                  <section>
                      <div class="container">
                          <div class="section-title">
                              <h2>How it works</h2>
                              <div class="section-subtitle">Discover & Connect </div>
                              <span class="section-separator"></span>
                              <p>Explore some of the best tips from around the world.</p>
                          </div>
                          <!--process-wrap  -->
                          <div class="process-wrap fl-wrap">
                              <ul>
                                  <li>
                                      <div class="process-item">
                                          <span class="process-count">01 . </span>
                                          <div class="time-line-icon"><i class="fa fa-map-o"></i></div>
                                          <h4> Find Interesting Place</h4>
                                          <p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut, convallis eros sollicitudin turpis.</p>
                                      </div>
                                      <span class="pr-dec"></span>
                                  </li>
                                  <li>
                                      <div class="process-item">
                                          <span class="process-count">02 .</span>
                                          <div class="time-line-icon"><i class="fa fa-envelope-open-o"></i></div>
                                          <h4> Contact a Few Owners</h4>
                                          <p>Faucibus ante, in porttitor tellus blandit et. Phasellus tincidunt metus lectus sollicitudin feugiat pharetra consectetur.</p>
                                      </div>
                                      <span class="pr-dec"></span>
                                  </li>
                                  <li>
                                      <div class="process-item">
                                          <span class="process-count">03 .</span>
                                          <div class="time-line-icon"><i class="fa fa-hand-peace-o"></i></div>
                                          <h4> Make a Listing</h4>
                                          <p>Maecenas pulvinar, risus in facilisis dignissim, quam nisi hendrerit nulla, id vestibulum metus nullam viverra porta.</p>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                          <!--process-wrap   end-->
                      </div>
                  </section>

                  <!-- section end -->

                  <!--section -->
                  <section id="sec2">
                      <div class="container">
                          <div class="section-title">
                              <h2>Featured Categories</h2>
                              <div class="section-subtitle">Catalog of Categories</div>
                              <span class="section-separator"></span>
                              <p>Explore some of the best tips from around the city from our partners and friends.</p>
                          </div>
                          <!-- portfolio start -->
                          <div class="gallery-items fl-wrap mr-bot spad">
                              <!-- gallery-item-->
                              <div class="gallery-item">
                                  <div class="grid-item-holder">
                                      <div class="listing-item-grid">
                                          <img  src="{{asset('images/all/1.jpg')}}"   alt="">
                                          <div class="listing-counter"><span>10 </span> Locations</div>
                                          <div class="listing-item-cat">
                                              <h3><a href="listing.html">Conference and Event</a></h3>
                                              <p>Constant care and attention to the patients makes good record</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- gallery-item end-->

                              <div class="gallery-item" style="width:22%">
                                  <div class="grid-item-holder">

                                  </div>
                              </div>


                              <!-- gallery-item-->
                              <div class="gallery-item">
                                  <div class="grid-item-holder">
                                      <div class="listing-item-grid">
                                          <img  src="images/all/5.jpg"   alt="">
                                          <div class="listing-counter"><span>15 </span> Locations</div>
                                          <div class="listing-item-cat">
                                              <h3><a href="listing.html">Shop - Store</a></h3>
                                              <p>Constant care and attention to the patients makes good record</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- gallery-item end-->
                          </div>
                          <!-- portfolio end -->

                      </div>
                  </section>
                  <!-- section end -->

                  <!--section -->
                  <section>
                      {{-- <div class="container">
                          <div class="section-title">
                              <h2>Tips & Articles</h2>
                              <div class="section-subtitle">From the blog.</div>
                              <span class="section-separator"></span>
                              <p>Browse the latest articles from our blog.</p>
                          </div>
                          <div class="row home-posts">
                              <div class="col-md-4">
                                  <article class="card-post">
                                      <div class="card-post-img fl-wrap">
                                          <a href="blog-single.html"><img src="images/all/15.jpg"   alt=""></a>
                                      </div>
                                      <div class="card-post-content fl-wrap">
                                          <h3><a href="blog-single.html">Gallery Post</a></h3>
                                          <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                          <div class="post-author"><a href="#"><img src="images/avatar/4.jpg" alt=""><span>By , Alisa Noory</span></a></div>
                                          <div class="post-opt">
                                              <ul>
                                                  <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>
                                                  <li><i class="fa fa-eye"></i> <span>264</span></li>
                                                  <li><i class="fa fa-tags"></i> <a href="#">Photography</a>  </li>
                                              </ul>
                                          </div>
                                      </div>
                                  </article>
                              </div>
                              <div class="col-md-4">
                                  <article class="card-post">
                                      <div class="card-post-img fl-wrap">
                                          <a href="blog-single.html"><img  src="images/all/18.jpg"   alt=""></a>
                                      </div>
                                      <div class="card-post-content fl-wrap">
                                          <h3><a href="blog-single.html">Video and gallery post</a></h3>
                                          <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                          <div class="post-author"><a href="#"><img src="images/avatar/5.jpg" alt=""><span>By , Mery Lynn</span></a></div>
                                          <div class="post-opt">
                                              <ul>
                                                  <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>
                                                  <li><i class="fa fa-eye"></i> <span>264</span></li>
                                                  <li><i class="fa fa-tags"></i> <a href="#">Design</a>  </li>
                                              </ul>
                                          </div>
                                      </div>
                                  </article>
                              </div>
                              <div class="col-md-4">
                                  <article class="card-post">
                                      <div class="card-post-img fl-wrap">
                                          <a href="blog-single.html"><img  src="images/all/19.jpg"   alt=""></a>
                                      </div>
                                      <div class="card-post-content fl-wrap">
                                          <h3><a href="blog-single.html">Post Article</a></h3>
                                          <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                          <div class="post-author"><a href="#"><img src="images/avatar/6.jpg" alt=""><span>By , Garry Dee</span></a></div>
                                          <div class="post-opt">
                                              <ul>
                                                  <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>
                                                  <li><i class="fa fa-eye"></i> <span>264</span></li>
                                                  <li><i class="fa fa-tags"></i> <a href="#">Stories</a>  </li>
                                              </ul>
                                          </div>
                                      </div>
                                  </article>
                              </div>
                          </div>
                          <a href="blog.html" class="btn  big-btn circle-btn  dec-btn color-bg flat-btn">Read All<i class="fa fa-eye"></i></a>
                      </div> --}}


                  <div class="container">

                    <div class="widget-area-12">

                    <div class="kopa-divider"></div>

  <div class="widget kopa-entry-list-widget">
        <h3 class="widget-title clearfix">
            <span class="title-text">Infrastructure
                <span class="triangle-right"></span>
                <span class="triangle-left"></span>

            </span>
            <span class="title-right">Should There be Lights on the Park Arthur Sledding Hill?</span>
        </h3>

        <div class="list-container-2">
            <ul class="tabs-2 clearfix">
                <li class="active"><a href="#tab-2-1">Swimming</a></li>
                <li><a href="#tab-2-2">Football</a></li>
                <li><a href="#tab-2-3">Bascket</a></li>
                <li><a href="#tab-2-4">Handball</a></li>
                <li><a href="#tab-2-5">Teniss</a></li>

            </ul><!--tabs-2-->
        </div>
        <div class="tab-container-2">
            <div class="tab-content-2" id="tab-2-1">
                <ul class="kopa-entry-list clearfix">
                    <li>
                        <article class="entry-item">
                            <div class="entry-thumb">
                                <a href="#"><img src="{{asset('images/all/5.jpg')}}" alt="" /></a>
                            </div>
                            <div class="entry-content">
                                <header>
                                    <span class="entry-date"><span class="kopa-minus"></span>Swimming</span>
                                    <h4 class="entry-title"><a href="#">Just test fot tab swimming</a></h4>
                                </header>
                            </div>
                        </article>
                    </li>
                </ul>
            </div><!--tab-content-2-->
            <div class="tab-content-2" id="tab-2-2">
                <ul class="kopa-entry-list clearfix">
                  <li>
                      <article class="entry-item">
                          <div class="entry-thumb">
                              <a href="#"><img src="{{asset('images/all/5.jpg')}}" alt="" /></a>
                          </div>
                          <div class="entry-content">
                              <header>
                                  <span class="entry-date"><span class="kopa-minus"></span>Football</span>
                                  <h4 class="entry-title"><a href="#">Just test fot tab Football</a></h4>
                              </header>
                          </div>
                      </article>
                  </li>

                </ul>
            </div><!--tab-content-2-->
            <div class="tab-content-2" id="tab-2-3">
                <ul class="kopa-entry-list clearfix">
                  <li>
                      <article class="entry-item">
                          <div class="entry-thumb">
                              <a href="#"><img src="{{asset('images/all/5.jpg')}}" alt="" /></a>
                          </div>
                          <div class="entry-content">
                              <header>
                                  <span class="entry-date"><span class="kopa-minus"></span>Bascket</span>
                                  <h4 class="entry-title"><a href="#">Just test fot tab Bascket</a></h4>
                              </header>
                          </div>
                      </article>
                  </li>

                </ul>
            </div><!--tab-content-2-->
            <div class="tab-content-2" id="tab-2-4">
                <ul class="kopa-entry-list clearfix">
                  <li>
                      <article class="entry-item">
                          <div class="entry-thumb">
                              <a href="#"><img src="{{asset('images/all/5.jpg')}}" alt="" /></a>
                          </div>
                          <div class="entry-content">
                              <header>
                                  <span class="entry-date"><span class="kopa-minus"></span>Handball</span>
                                  <h4 class="entry-title"><a href="#">Just test fot tab Handball</a></h4>
                              </header>
                          </div>
                      </article>
                  </li>


                </ul>
            </div><!--tab-content-2-->
            <div class="tab-content-2" id="tab-2-5">
                <ul class="kopa-entry-list clearfix">
                    <li>
                        <article class="entry-item">
                            <div class="entry-thumb">
                                <a href="#"><img src="{{asset('images/all/5.jpg')}}" alt="" /></a>
                            </div>
                            <div class="entry-content">
                                <header>
                                    <span class="entry-date"><span class="kopa-minus"></span> Teniss</span>
                                    <h4 class="entry-title"><a href="#">Just tab for test tennis</a></h4>
                                </header>
                            </div>
                        </article>
                    </li>

                </ul>
            </div><!--tab-content-2-->

        </div><!--tab-container-2-->

    </div><!--kopa-entry-list-widget-->

                  </div><!--widget-area-12-->

                  </div>

                  </section>
                  <!-- section end -->

                  <!--section -->
                  <section id="sec2">
                      <div class="container">
                          <div class="section-title">
                              <h2>Featured Categories</h2>
                              <div class="section-subtitle">Catalog of Categories</div>
                              <span class="section-separator"></span>
                              <p>Explore some of the best tips from around the city from our partners and friends.</p>
                          </div>
                          <!-- portfolio start -->
                          <div class="gallery-items fl-wrap mr-bot spad">
                              <!-- gallery-item-->
                              <div class="gallery-item">
                                  <div class="grid-item-holder">
                                      <div class="listing-item-grid">
                                          <img  src="images/all/1.jpg"   alt="">
                                          <div class="listing-counter"><span>10 </span> Locations</div>
                                          <div class="listing-item-cat">
                                              <h3><a href="listing.html">Conference and Event</a></h3>
                                              <p>Constant care and attention to the patients makes good record</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- gallery-item end-->

                              <div class="gallery-item">
                                  <div class="grid-item-holder">

                                  </div>
                              </div>


                              <!-- gallery-item-->
                              <div class="gallery-item">
                                  <div class="grid-item-holder">
                                      <div class="listing-item-grid">
                                          <img  src="images/all/5.jpg"   alt="">
                                          <div class="listing-counter"><span>15 </span> Locations</div>
                                          <div class="listing-item-cat">
                                              <h3><a href="listing.html">Shop - Store</a></h3>
                                              <p>Constant care and attention to the patients makes good record</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- gallery-item end-->
                          </div>

                      </div>
                  </section>
                  <!-- section end -->

              </div>
              <!-- Content end -->
          </div>

@endsection




@section('footer')

  @include('frontOffice.inc.footer')

@endsection
