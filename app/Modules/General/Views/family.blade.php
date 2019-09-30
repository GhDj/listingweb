<?php
/**
 * Created by PhpStorm.
 * User: ghdj9
 * Date: 8/22/2019
 * Time: 7:04 PM
 */
?>



@extends('frontOffice.layout')

@section('head')

    @include('frontOffice.inc.head', ['title' => 'Olympiade | Olympiade Family' ])

@endsection



@section('header')

    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'act-link','faq'=>'','profile'=>'','associations' =>'','infrastructure'=>'']])

@endsection


@section('content')

    <div id="wrapper">
        <!--Content -->
        <div class="content">
            <!--section -->
            <section class="parallax-section" data-scrollax-parent="true" id="sec1">
                <div class="bg par-elem " data-bg="images/bg/24.jpg" data-scrollax="properties: { translateY: '30%' }" style="background-image: url(&quot;images/bg/24.jpg&quot;); transform: translateZ(0px) translateY(-2.45148%);"></div>
                <div class="overlay"></div>
                <div class="container">
                    <div class="section-title center-align">
                        <h2><span>About Our Company</span></h2>
                        <div class="breadcrumbs fl-wrap"><a href="#">Home</a><span>About</span></div>
                        <span class="section-separator"></span>
                    </div>
                </div>
                <div class="header-sec-link">
                    <div class="container"><a href="#sec2" class="custom-scroll-link">Let's Start</a></div>
                </div>
            </section>
            <!-- section end -->
            <!--section -->
            <div class="scroll-nav-wrapper fl-wrap" style="z-index: 12; position: absolute; top: -477px; margin-left: 0px; width: 1903px;">
                <div class="container">
                    <nav class="scroll-nav scroll-init inline-scroll-container">
                        <ul>
                            <li><a class="act-scrlink" href="#sec1">Top</a></li>
                            <li><a href="#sec2" class="">About</a></li>
                            <li><a href="#sec3" class="">Facts</a></li>
                            <li><a href="#sec4" class="">Team</a></li>
                            <li><a href="#sec5" class="">Testimonials</a></li>
                        </ul>
                    </nav>
                </div>
            </div><div></div>
            <section id="sec2">
                <div class="container">
                    <div class="section-title">
                        <h2> How We Work</h2>
                        <div class="section-subtitle">popular questions</div>
                        <span class="section-separator"></span>
                        <p>Explore some of the best tips from around the city from our partners and friends.</p>
                    </div>
                    <!--about-wrap -->
                    <div class="about-wrap">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="video-box fl-wrap">
                                    <img src="images/all/16.jpg" alt="">
                                    <a class="video-box-btn image-popup" href="https://vimeo.com/264074381"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Our Awesome <span>Story</span></h3>
                                    <h4>Check video presentation to find   out more about us .</h4>
                                    <span class="section-separator fl-sec-sep"></span>
                                </div>
                                <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.</p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.
                                </p>
                                <a href="#sec3" class="btn transparent-btn float-btn custom-scroll-link">Our Team <i class="fa fa-users"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- about-wrap end  -->
                    <span class="fw-separator"></span>
                    <!-- features-box-container -->
                    <div class="features-box-container fl-wrap row">
                        <!--features-box -->
                        <div class="features-box col-md-4">
                            <div class="time-line-icon">
                                <i class="fa fa-medkit"></i>
                            </div>
                            <h3>24 Hours Support</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.  </p>
                        </div>
                        <!-- features-box end  -->
                        <!--features-box -->
                        <div class="features-box col-md-4">
                            <div class="time-line-icon">
                                <i class="fa fa-cogs"></i>
                            </div>
                            <h3>Admin Panel</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.  </p>
                        </div>
                        <!-- features-box end  -->
                        <!--features-box -->
                        <div class="features-box col-md-4">
                            <div class="time-line-icon">
                                <i class="fa fa-television"></i>
                            </div>
                            <h3>Mobile Friendly</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.  </p>
                        </div>
                        <!-- features-box end  -->
                    </div>
                    <!-- features-box-container end  -->
                </div>
            </section>
            <!-- section end -->
            <!--section -->
            <section class="color-bg" id="sec3">
                <div class="shapes-bg-big"></div>
                <div class="container">
                    <div class=" single-facts fl-wrap">
                        <!-- inline-facts -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="254">254</div>
                                    </div>
                                </div>
                                <h6>New Visiters Every Week</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="12168">12168</div>
                                    </div>
                                </div>
                                <h6>Happy customers every year</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="172">172</div>
                                    </div>
                                </div>
                                <h6>Won Awards</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="732">732</div>
                                    </div>
                                </div>
                                <h6>New Listing Every Week</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                    </div>
                </div>
            </section>
            <!-- section end -->
            <!--section -->
            <section id="sec4">
                <div class="container">
                    <div class="section-title">
                        <h2>Our Team</h2>
                        <div class="section-subtitle">The Team</div>
                        <span class="section-separator"></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                    </div>
                    <div class="team-holder section-team fl-wrap">
                        <!-- team-item -->
                        <div class="team-box">
                            <div class="team-photo">
                                <img src="images/team/1.jpg" alt="" class="respimg">
                            </div>
                            <div class="team-info">
                                <h3><a href="#">Alisa Gray</a></h3>
                                <h4>Business consultant</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                                <ul class="team-social">
                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- team-item  end-->
                        <!-- team-item -->
                        <div class="team-box">
                            <div class="team-photo">
                                <img src="images/team/2.jpg" alt="" class="respimg">
                            </div>
                            <div class="team-info">
                                <h3><a href="#">Austin Evon</a></h3>
                                <h4>Photographer</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                                <ul class="team-social">
                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- team-item end  -->
                        <!-- team-item -->
                        <div class="team-box">
                            <div class="team-photo">
                                <img src="images/team/3.jpg" alt="" class="respimg">
                            </div>
                            <div class="team-info">
                                <h3><a href="#">Taylor Roberts</a></h3>
                                <h4>Co-manager associated</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                                <ul class="team-social">
                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- team-item end  -->
                    </div>
                </div>
            </section>
            <!-- section end -->
            <!--section -->
            <section class="parallax-section" data-scrollax-parent="true">
                <div class="bg par-elem " data-bg="images/bg/26.jpg" data-scrollax="properties: { translateY: '30%' }" style="background-image: url(&quot;images/bg/26.jpg&quot;); transform: translateZ(0px) translateY(-27.5763%);"></div>
                <div class="overlay co lor-overlay"></div>
                <!--container-->
                <div class="container">
                    <div class="intro-item fl-wrap">
                        <h2>Need more information</h2>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</h3>
                        <a class="trs-btn @if(Auth::user()) show-reg-form modal-open @endif" href="">Get in Touch + </a>
                    </div>
                </div>
            </section>
            <section id="sec5">
                <div class="container">
                    <div class="section-title">
                        <h2>Testimonials</h2>
                        <div class="section-subtitle">Clients Reviews</div>
                        <span class="section-separator"></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                    </div>
                </div>
                <!-- testimonials-carousel -->
                <div class="carousel fl-wrap">
                    <!--testimonials-carousel-->
                    <div class="testimonials-carousel single-carousel fl-wrap slick-initialized slick-slider slick-dotted">
                        <!--slick-slide-item-->
                        <div class="slick-list draggable" style="padding: 0px 50px;"><div class="slick-track" style="opacity: 1; width: 7212px; transform: translate3d(-1803px, 0px, 0px);"><div class="slick-slide-item slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1" style="width: 581px;">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </div>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi arch itecto beatae vitae dicta sunt explicabo. </p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="images/avatar/4.jpg" alt=""></div>
                                        <h4>Lisa Noory</h4>
                                        <span>Restaurant Owner</span>
                                    </div>
                                </div><div class="slick-slide-item slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1" style="width: 581px;">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </div>
                                        <p>Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="images/avatar/3.jpg" alt=""></div>
                                        <h4>Antony Moore</h4>
                                        <span>Restaurant Owner</span>
                                    </div>
                                </div><div class="slick-slide-item slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" tabindex="-1" style="width: 581px;">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </div>
                                        <p>Feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te odio dignissim qui blandit praesent.</p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                        <h4>Austin Harisson</h4>
                                        <span>Restaurant Owner</span>
                                    </div>
                                </div><div class="slick-slide-item slick-slide slick-cloned slick-active" data-slick-index="-1" aria-hidden="false" tabindex="-1" style="width: 581px;">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </div>
                                        <p>Qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram seacula quarta decima et quinta decima.</p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="images/avatar/6.jpg" alt=""></div>
                                        <h4>Garry Colonsi</h4>
                                        <span>Restaurant Owner</span>
                                    </div>
                                </div><div class="slick-slide-item slick-slide slick-current slick-active slick-center" data-slick-index="0" aria-hidden="false" tabindex="0" role="tabpanel" id="slick-slide00" aria-describedby="slick-slide-control00" style="width: 581px;">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </div>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi arch itecto beatae vitae dicta sunt explicabo. </p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="images/avatar/4.jpg" alt=""></div>
                                        <h4>Lisa Noory</h4>
                                        <span>Restaurant Owner</span>
                                    </div>
                                </div><div class="slick-slide-item slick-slide slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" role="tabpanel" id="slick-slide01" aria-describedby="slick-slide-control01" style="width: 581px;">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </div>
                                        <p>Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="images/avatar/3.jpg" alt=""></div>
                                        <h4>Antony Moore</h4>
                                        <span>Restaurant Owner</span>
                                    </div>
                                </div><div class="slick-slide-item slick-slide" data-slick-index="2" aria-hidden="true" tabindex="0" role="tabpanel" id="slick-slide02" aria-describedby="slick-slide-control02" style="width: 581px;">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </div>
                                        <p>Feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te odio dignissim qui blandit praesent.</p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                        <h4>Austin Harisson</h4>
                                        <span>Restaurant Owner</span>
                                    </div>
                                </div><div class="slick-slide-item slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" role="tabpanel" id="slick-slide03" aria-describedby="slick-slide-control03" style="width: 581px;">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </div>
                                        <p>Qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram seacula quarta decima et quinta decima.</p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="images/avatar/6.jpg" alt=""></div>
                                        <h4>Garry Colonsi</h4>
                                        <span>Restaurant Owner</span>
                                    </div>
                                </div><div class="slick-slide-item slick-slide slick-cloned slick-center" data-slick-index="4" aria-hidden="true" tabindex="-1" style="width: 581px;">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </div>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi arch itecto beatae vitae dicta sunt explicabo. </p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="images/avatar/4.jpg" alt=""></div>
                                        <h4>Lisa Noory</h4>
                                        <span>Restaurant Owner</span>
                                    </div>
                                </div><div class="slick-slide-item slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" tabindex="-1" style="width: 581px;">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </div>
                                        <p>Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="images/avatar/3.jpg" alt=""></div>
                                        <h4>Antony Moore</h4>
                                        <span>Restaurant Owner</span>
                                    </div>
                                </div><div class="slick-slide-item slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" tabindex="-1" style="width: 581px;">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </div>
                                        <p>Feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te odio dignissim qui blandit praesent.</p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                        <h4>Austin Harisson</h4>
                                        <span>Restaurant Owner</span>
                                    </div>
                                </div><div class="slick-slide-item slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" tabindex="-1" style="width: 581px;">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </div>
                                        <p>Qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram seacula quarta decima et quinta decima.</p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="images/avatar/6.jpg" alt=""></div>
                                        <h4>Garry Colonsi</h4>
                                        <span>Restaurant Owner</span>
                                    </div>
                                </div></div></div>
                        <!--slick-slide-item end-->
                        <!--slick-slide-item-->

                        <!--slick-slide-item end-->
                        <!--slick-slide-item-->

                        <!--slick-slide-item end-->
                        <!--slick-slide-item-->

                        <!--slick-slide-item end-->
                        <ul class="slick-dots" style="display: block;" role="tablist"><li class="slick-active" role="presentation"><button type="button" role="tab" id="slick-slide-control00" aria-controls="slick-slide00" aria-label="1 of 2" tabindex="0" aria-selected="true">1</button></li><li role="presentation"><button type="button" role="tab" id="slick-slide-control01" aria-controls="slick-slide01" aria-label="2 of 2" tabindex="-1">2</button></li><li role="presentation"><button type="button" role="tab" id="slick-slide-control02" aria-controls="slick-slide02" aria-label="3 of 2" tabindex="-1">3</button></li><li role="presentation"><button type="button" role="tab" id="slick-slide-control03" aria-controls="slick-slide03" aria-label="4 of 2" tabindex="-1">4</button></li></ul></div>
                    <!--testimonials-carousel end-->
                    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                </div>
                <!-- carousel end-->
            </section>
            <!-- section end -->
            <!--section -->
            <section class="gray-section">
                <div class="container">
                    <div class="fl-wrap spons-list">
                        <ul class="client-carousel slick-initialized slick-slider">
                            <div class="slick-list draggable" style="padding: 0px 50px;"><div class="slick-track" style="opacity: 1; width: 4050px; transform: translate3d(-900px, 0px, 0px);"><li class="slick-slide slick-cloned" data-slick-index="-6" aria-hidden="true" tabindex="-1" style="width: 225px;"><a href="#" target="_blank" tabindex="-1"><img src="images/clients/1.png" alt=""></a></li><li class="slick-slide slick-cloned" data-slick-index="-5" aria-hidden="true" tabindex="-1" style="width: 225px;"><a href="#" target="_blank" tabindex="-1"><img src="images/clients/2.png" alt=""></a></li><li class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1" style="width: 225px;"><a href="#" target="_blank" tabindex="-1"><img src="images/clients/3.png" alt=""></a></li><li class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1" style="width: 225px;"><a href="#" target="_blank" tabindex="-1"><img src="images/clients/1.png" alt=""></a></li><li class="slick-slide slick-cloned slick-active" data-slick-index="-2" aria-hidden="false" tabindex="-1" style="width: 225px;"><a href="#" target="_blank" tabindex="0"><img src="images/clients/2.png" alt=""></a></li><li class="slick-slide slick-cloned slick-active" data-slick-index="-1" aria-hidden="false" tabindex="-1" style="width: 225px;"><a href="#" target="_blank" tabindex="0"><img src="images/clients/3.png" alt=""></a></li><li class="slick-slide slick-current slick-active slick-center" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 225px;"><a href="#" target="_blank" tabindex="0"><img src="images/clients/1.png" alt=""></a></li><li class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" style="width: 225px;"><a href="#" target="_blank" tabindex="0"><img src="images/clients/2.png" alt=""></a></li><li class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" tabindex="0" style="width: 225px;"><a href="#" target="_blank" tabindex="0"><img src="images/clients/3.png" alt=""></a></li><li class="slick-slide" data-slick-index="3" aria-hidden="true" tabindex="0" style="width: 225px;"><a href="#" target="_blank" tabindex="-1"><img src="images/clients/1.png" alt=""></a></li><li class="slick-slide" data-slick-index="4" aria-hidden="true" tabindex="0" style="width: 225px;"><a href="#" target="_blank" tabindex="-1"><img src="images/clients/2.png" alt=""></a></li><li class="slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1" style="width: 225px;"><a href="#" target="_blank" tabindex="-1"><img src="images/clients/3.png" alt=""></a></li><li class="slick-slide slick-cloned slick-center" data-slick-index="6" aria-hidden="true" tabindex="-1" style="width: 225px;"><a href="#" target="_blank" tabindex="-1"><img src="images/clients/1.png" alt=""></a></li><li class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" tabindex="-1" style="width: 225px;"><a href="#" target="_blank" tabindex="-1"><img src="images/clients/2.png" alt=""></a></li><li class="slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" tabindex="-1" style="width: 225px;"><a href="#" target="_blank" tabindex="-1"><img src="images/clients/3.png" alt=""></a></li><li class="slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" tabindex="-1" style="width: 225px;"><a href="#" target="_blank" tabindex="-1"><img src="images/clients/1.png" alt=""></a></li><li class="slick-slide slick-cloned" data-slick-index="10" aria-hidden="true" tabindex="-1" style="width: 225px;"><a href="#" target="_blank" tabindex="-1"><img src="images/clients/2.png" alt=""></a></li><li class="slick-slide slick-cloned" data-slick-index="11" aria-hidden="true" tabindex="-1" style="width: 225px;"><a href="#" target="_blank" tabindex="-1"><img src="images/clients/3.png" alt=""></a></li></div></div>





                        </ul>
                        <div class="sp-cont sp-cont-prev"><i class="fa fa-angle-left"></i></div>
                        <div class="sp-cont sp-cont-next"><i class="fa fa-angle-right"></i></div>
                    </div>
                </div>
            </section>
            <!-- section end -->
            <!--section -->
            <section class="gradient-bg">
                <div class="cirle-bg">
                    <div class="bg" data-bg="images/bg/circle.png" style="background-image: url(&quot;images/bg/circle.png&quot;);"></div>
                </div>
                <div class="container">
                    <div class="join-wrap fl-wrap">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>Join our online community</h3>
                                <p>Grow your marketing and be happy with your online business</p>
                            </div>
                            <div class="col-md-4"><a href="#" class="join-wrap-btn modal-open">Sign Up <i class="fa fa-sign-in"></i></a></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section end -->
            <div class="limit-box"></div>
        </div>
        <!--content end -->
    </div>

@endsection




@section('footer')

    @include('frontOffice.inc.footer')

@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function() {

            $("ul.tabs-2 li:first").addClass("active");
            $('.sportChange').click(function(){
                jQuery("ul.tabs-2 li").removeClass("active");
                jQuery(this).addClass("active");
                var sport = $(this).data('sport');
                $.get("{{ route('showHome')}}/sports/"+sport).done(function (res) {

                    $('.terrains').html(" ");
                    var speciality = res.sport.speciality;


                    if (res.status == 200) {
                        $.each(res.terrains,function (i,v) {
                            var link ="";
                            if (v.medias.length > 0) {
                                link = v.medias[0].link;
                            }else {
                                link = "{{asset('images/all/5.jpg')}}";
                            }


                            $('.terrains').append(`<li>` +
                                '<article class="entry-item">'+
                                '<div class="entry-thumb">'+
                                '<a href="#"><img src="'+link+'" alt="" /></a>'+
                                '</div>'+
                                '<div class="entry-content">'+
                                '<header>'+
                                '<span class="entry-date"><span class="kopa-minus"></span>'+speciality+'</span>'+
                                '<h4 class="entry-title"><a href="#">'+v.name+'</a></h4>'+
                                '</header>'+
                                '</div>'+
                                '</article>'+
                                '</li>'
                            ).children(':last').hide().fadeIn(1000);
                        });
                    }else {
                        $('.terrains').append('<p> Pas Des Terrains Sous Ce Sport </p>');
                    }


                });

            });
        });

    </script>

    <script type="text/javascript">

        $(document).ready(function() {

            if( $(".tab-content-4").length > 0){

                $(".tab-content-4").hide();
                $("ul.tabs-4 li:first").addClass("active").show();
                $(".tab-content-4:first").show();
                $("ul.tabs-4 li").click(function() {
                    $("ul.tabs-4 li").removeClass("active");
                    $(this).addClass("active");
                    $(".tab-content-4").hide();
                    var activeTab = $(this).find("a").attr("href");
                    $(activeTab).fadeIn();
                    return false;

                });
            }
        });

    </script>
@endsection