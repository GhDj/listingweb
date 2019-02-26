
@extends('frontOffice.layout')

@section('head')

    @include('frontOffice.inc.head', ['title' => 'Olympiade | Home Page' ])

@endsection



@section('header')

    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'','faq'=>'act-link']])

@endsection


@section('content')
<div id="wrapper">
    <!--content -->
    <div class="content">
        <!--section -->
        <section class="parallax-section" data-scrollax-parent="true" id="sec1">
            <div class="bg par-elem "  data-bg="{{asset('images/bg/faq.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="section-title center-align">
                    <h2><span>How It Works / FAQ</span></h2>
                    <div class="breadcrumbs fl-wrap"><a href="#">Home</a><span>How It Works</span></div>
                    <span class="section-separator"></span>
                </div>
            </div>
            <div class="header-sec-link">
                <div class="container"><a href="#sec2" class="custom-scroll-link">Let's Start</a></div>
            </div>
        </section>
        <!-- section end -->
        <div class="scroll-nav-wrapper fl-wrap">
            <div class="container">
                <nav class="scroll-nav scroll-init inline-scroll-container">
                    <ul>
                        <li><a class="act-scrlink" href="#sec1">Top</a></li>
                        <li><a href="#sec2">Steps</a></li>
                        <li><a href="#sec3">Video Tutorials</a></li>
                        <li><a href="#sec4">FAQ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--section -->
        <section  id="sec2">
            <div class="container">
                <div class="section-title">
                    <h2> Steps to  improve your business</h2>
                    <div class="section-subtitle">popular questions</div>
                    <span class="section-separator"></span>
                    <p>Explore some of the best tips from around the city from our partners and friends.</p>
                </div>
                <div class="time-line-wrap fl-wrap">
                    <!--  time-line-container  -->
                    <div class="time-line-container">
                        <div class="step-item">Step 1</div>
                        <div class="time-line-box tl-text tl-left">
                            <span class="process-count">01 . </span>
                            <div class="time-line-icon">
                                <i class="fa fa-map-o"></i>
                            </div>
                            <h3>Find Interesting Place</h3>
                            <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                        </div>
                        <div class="time-line-box tl-media tl-right">
                            <img src="images/all/15.jpg" alt="">
                        </div>
                    </div>
                    <!--  time-line-container -->
                    <!--  time-line-container  -->
                    <div class="time-line-container lf-im">
                        <div class="step-item">Step 2</div>
                        <div class="time-line-box tl-text tl-right">
                            <span class="process-count">02 . </span>
                            <div class="time-line-icon">
                                <i class="fa fa-envelope-open-o"></i>
                            </div>
                            <h3>Contact a Few Owners</h3>
                            <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                        </div>
                        <div class="time-line-box tl-media tl-left">
                            <img src="images/all/16.jpg" alt="">
                        </div>
                    </div>
                    <!--  time-line-container -->
                    <!--  time-line-container  -->
                    <div class="time-line-container">
                        <div class="step-item">Step 3</div>
                        <div class="time-line-box tl-text tl-left">
                            <span class="process-count">03 . </span>
                            <div class="time-line-icon">
                                <i class="fa fa-hand-peace-o"></i>
                            </div>
                            <h3>Make a Listing</h3>
                            <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                        </div>
                        <div class="time-line-box tl-media tl-right">
                            <img src="images/all/18.jpg" alt="">
                        </div>
                    </div>
                    <!--  time-line-container -->
                    <div class="timeline-end"><i class="fa fa-check"></i></div>
                </div>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section class="color-bg" id="sec3">
            <div class="shapes-bg-big"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="video-box fl-wrap">
                            <img src="images/all/19.jpg" alt="">
                            <a class="video-box-btn image-popup" href="https://vimeo.com/110234211"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="color-bg-text">
                            <h3>Video Tutorials</h3>
                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.</p>
                            <a href="#" class="color-bg-link">Our Vimeo Chanel</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section class="gray-bg" id="sec4">
            <div class="container">
                <div class="section-title">
                    <h2> FAQ</h2>
                    <div class="section-subtitle">popular questions</div>
                    <span class="section-separator"></span>
                    <p>Explore some of the best tips from around the city from our partners and friends.</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="accordion">
                            <a class="toggle act-accordion" href="#"> What is the price of posting  <i class="fa fa-angle-down"></i></a>
                            <div class="accordion-inner visible">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                            </div>
                            <a class="toggle" href="#"> Can I upload attachments  <i class="fa fa-angle-down"></i></a>
                            <div class="accordion-inner">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                            </div>
                            <a class="toggle" href="#"> Can I create a profile page for business <i class="fa fa-angle-down"></i></a>
                            <div class="accordion-inner">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                            </div>
                            <a class="toggle" href="#"> What is the price of posting<i class="fa fa-angle-down"></i></a>
                            <div class="accordion-inner">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                            </div>
                            <a class="toggle" href="#"> How do I post my listing <i class="fa fa-angle-down"></i></a>
                            <div class="accordion-inner">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="accordion">
                            <a class="toggle" href="#"> What is the price of posting <i class="fa fa-angle-down"></i></a>
                            <div class="accordion-inner">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                            </div>
                            <a class="toggle" href="#"> Can I upload attachments <i class="fa fa-angle-down"></i></a>
                            <div class="accordion-inner">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                            </div>
                            <a class="toggle act-accordion" href="#"> Can I create a profile page for business <i class="fa fa-angle-down"></i></a>
                            <div class="accordion-inner visible">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                            </div>
                            <a class="toggle" href="#">How do I post my listing<i class="fa fa-angle-down"></i></a>
                            <div class="accordion-inner">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                            </div>
                            <a class="toggle" href="#"> Coooperation Customers<i class="fa fa-angle-down"></i></a>
                            <div class="accordion-inner">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section class="gradient-bg">
            <div class="cirle-bg">
                <div class="bg" data-bg="images/bg/circle.png"></div>
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
        <div class="limit-box"></div>
    </div>
    <!-- content end -->
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

