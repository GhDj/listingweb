
@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection



@section('header')

  @include('frontOffice.inc.header')

@endsection


@section('content')

  <style media="screen">
  .result ul li {
    width: 100%;
    margin-bottom:15px;
    float:left;
    padding-bottom:15px;
    color: #878C9F;
    border-bottom:1px solid #eee;
  }
  .result ul li span.club-level {
    float: right;
    font-weight:500;
    color:#999;
  }
  .result ul li span.club-name{
    float:left;
    color: #878C9F;
    font-weight:600;
  }
  .list-single-main-wrapper .home a:first-child:before{
  	content:'';
  	position:absolute;
  	width:4px;
  	height:4px;
    color: red;
  	background:#fff;
  	border-radius:100%;
  	right:8px;
  	top:50%;
    margin-top:5px;
  }
  </style>

<!-- wrapper -->
<div id="wrapper">
  <!--  content  -->
<div class="content">
  <!--  section  -->

      @include('Infrastructure::inc.headerItems')

  <!--  section end -->
  <!--  section  -->
    <section class="gray-section no-top-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="list-single-main-wrapper fl-wrap" id="sec2">
            <div class="breadcrumbs gradient-bg  fl-wrap home"><a href="#" style="margin-left:3%">Home</a><a href="#">Listings</a><span>Club Sportif</span></div>

            <!-- list-single-main-item -->
            <div class="list-single-main-item fl-wrap" id="sec2">
              <div class="list-single-main-item-title fl-wrap">
                <h3>Description</h3>
              </div>
              <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus
                tellus, ut tristique elit risus at metus.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat
                volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>

            </div>
            <!-- list-single-main-item end -->

            <!-- list-single-main-item -->
            <div class="list-single-main-item fl-wrap" id="sec7">
              <div class="accordion">
                <a class="toggle act-accordion" href="#"> Football <i class="fa fa-angle-down"></i></a>
                <div class="accordion-inner visible">
                  <div class="box-widget result">
                    <div class="box-widget-content">
                      <ul>
                        <li><span class="club-name">Equipe 1 </span><span class="club-level">Niveau 1</span></li>
                        <li><span class="club-name">Equipe 2 </span><span class="club-level">Niveau 2</span></li>
                        <li><span class="club-name">Equipe 3 </span><span class="club-level">Niveau 3</span></li>
                        <li><span class="club-name">Equipe 4 </span><span class="club-level">Niveau 4</span></li>

                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- list-single-main-item end -->

            <!-- list-single-main-item -->
            <div class="list-single-main-item fl-wrap" id="sec8">
              <div class="accordion">
                <a class="toggle act-accordion" href="#"> Tennis <i class="fa fa-angle-down"></i></a>
                <div class="accordion-inner visible">
                  <div class="box-widget result">
                    <div class="box-widget-content">
                      <ul>
                        <li><span class="club-name">Equipe 1 </span><span class="club-level">Niveau 1</span></li>
                        <li><span class="club-name">Equipe 2 </span><span class="club-level">Niveau 2</span></li>
                        <li><span class="club-name">Equipe 3 </span><span class="club-level">Niveau 3</span></li>
                        <li><span class="club-name">Equipe 4 </span><span class="club-level">Niveau 4</span></li>

                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- list-single-main-item end -->



          </div>



        </div>
        <!--box-widget-wrap -->
        <div class="col-md-4">
          <div class="box-widget-wrap">
            <!--box-widget-item -->
            <div class="box-widget-item fl-wrap">
              <div class="box-widget widget-posts">

                <div class="box-widget-content"  style="padding:10px 30px">
                  <span class="current-status">Exercices</span>
                  <div class="accordion">
                    <div class="accordion-inner visible" style="padding-top:0px;">
                      <div class="box-widget result">
                        <div class="box-widget-content" style="padding:10px 30px">
                          <ul>
                            <li><span class="club-name"style="margin-left:3%">Type </span><span class="club-level" style="margin-right:8%">Time</span></li>
                            <li><span class="club-name">Equipe 2 </span><span class="club-level">Niveau 2</span></li>
                            <li><span class="club-name">Equipe 3 </span><span class="club-level">Niveau 3</span></li>
                            <li><span class="club-name">Equipe 4 </span><span class="club-level">Niveau 4</span></li>

                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-widget-content"  style="padding:10px 30px">
                  <span class="current-status">Equipes</span>
                  <ul>
                    <li class="clearfix">
                      <a href="#" class="widget-posts-img"><img src="{{asset('images/all/1.jpg')}}" alt=""></a>
                      <div class="widget-posts-descr">
                        <a href="#" title="">Cafe "Lollipop"</a>
                        <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 21 Mar 2017 </span>
                      </div>
                    </li>
                    <li class="clearfix">
                      <a href="#" class="widget-posts-img"><img src="{{asset('images/all/2.jpg')}}" alt=""></a>
                      <div class="widget-posts-descr">
                        <a href="#" title=""> Apartment in the Center</a>
                        <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                      </div>
                    </li>
                    <li class="clearfix">
                      <a href="#" class="widget-posts-img"><img src="{{asset('images/all/3.jpg')}}" alt=""></a>
                      <div class="widget-posts-descr">
                        <a href="#" title="">Event in City Mol</a>
                        <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="box-widget-content"  style="padding:10px 30px">
                  <span class="current-status">Sports</span>
                  <ul>
                    <li class="clearfix">
                      <a href="#" class="widget-posts-img"><img src="{{asset('images/all/single/13.jpg')}}" alt=""></a>
                      <div class="widget-posts-descr">
                        <a href="#" title="">Cafe "Lollipop"</a>
                        <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 21 Mar 2017 </span>
                      </div>
                    </li>
                    <li class="clearfix">
                      <a href="#" class="widget-posts-img"><img src="{{asset('images/all/single/14.jpg')}}" alt=""></a>
                      <div class="widget-posts-descr">
                        <a href="#" title=""> Apartment in the Center</a>
                        <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                      </div>
                    </li>
                    <li class="clearfix">
                      <a href="#" class="widget-posts-img"><img src="{{asset('images/all/single/15.jpg')}}" alt=""></a>
                      <div class="widget-posts-descr">
                        <a href="#" title="">Event in City Mol</a>
                        <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!--box-widget-item end -->
            <!--box-widget-item -->
            <div class="box-widget-item fl-wrap">
              <div class="box-widget-item-header">
                <h3>Galerie Photos : </h3>
              </div>
              <div class="box-widget opening-hours">
                <div class="box-widget-content">

                  <div class="gallery-items grid-small-pad  list-single-gallery three-coulms lightgallery">

                    <div class="row">
                      <div class="col-md-24">
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
                      </div>

                      <div class="col-md-24">
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
                      </div>

                      <div class="col-md-24">
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
                       </div>
                    </div>


                    <div class="row">
                      <div class="col-md-24">
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
                      </div>

                      <div class="col-md-24">
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
                      </div>

                      <div class="col-md-24">
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
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-24">
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
                      </div>

                      <div class="col-md-24">
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
                      </div>

                      <div class="col-md-24">
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
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!--box-widget-item end -->
            <!--box-widget-item -->
            <div class="box-widget-item fl-wrap">
              <div class="box-widget-item-header">
                <h3>**********: </h3>
              </div>
              <div class="box-widget widget-posts">
                <div class="box-widget-content">

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
