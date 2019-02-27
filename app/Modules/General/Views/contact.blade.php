
@extends('frontOffice.layout')

@section('head')

    @include('frontOffice.inc.head', ['title' => 'Olympiade | Home Page' ])

@endsection



@section('header')

    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'act-link','faq'=>'','profile'=>'']])

@endsection


@section('content')
<div id="wrapper">
    <!--content-->
    <div class="content">
        <section class="parallax-section" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="{{asset('images/bg/bg_contact.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="bubble-bg"></div>
            <div class="container">
                <div class="section-title center-align">
                    <h2><span>Our Contacts</span></h2>
                    <div class="breadcrumbs fl-wrap"><a href="{{route('showHome')}}">Acceuil</a> <span>Contacts</span></div>
                    <span class="section-separator"></span>
                </div>
            </div>
            <div class="header-sec-link">
                <div class="container"><a href="#sec1" class="custom-scroll-link">Commençons</a></div>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section id="sec1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="list-single-main-item fl-wrap">
                            <div class="list-single-main-item-title fl-wrap">
                                <h3>Contact <span>Details </span></h3>
                            </div>
                            <div class="list-single-main-media fl-wrap">
                                <img src="images/all/12.jpg" class="respimg" alt="">
                            </div>
                            <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus. In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida.</p>
                            <div class="list-author-widget-contacts">
                                <ul>
                                    <li><span><i class="fa fa-map-marker"></i> Adress :</span> <a href="#">USA 27TH Brooklyn NY</a></li>
                                    <li><span><i class="fa fa-phone"></i> Phone :</span> <a href="#">+7(123)987654</a></li>
                                    <li><span><i class="fa fa-envelope-o"></i> Mail :</span> <a href="#">AlisaNoory@domain.com</a></li>
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
                    <div class="col-md-6">
                        <div class="list-single-main-wrapper fl-wrap">
                            <div class="list-single-main-item-title fl-wrap">
                                <h3>Our Location</h3>
                            </div>
                            <div class="map-container">
                                <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
                            </div>
                            <div class="list-single-main-item-title fl-wrap">
                                <h3>Get In Touch</h3>
                            </div>
                            <div id="contact-form">
                                <div id="message"></div>
                                <form  class="custom-form" action="php/contact.php" name="contactform" id="contactform">
                                    <fieldset>
                                        <label><i class="fa fa-user-o"></i></label>
                                        <input type="text" name="name" id="name" placeholder="Your Name *" value=""/>
                                        <div class="clearfix"></div>
                                        <label><i class="fa fa-envelope-o"></i>  </label>
                                        <input type="text"  name="email" id="email" placeholder="Email Address*" value=""/>
                                        <textarea name="comments"  id="comments" cols="40" rows="3" placeholder="Your Message:"></textarea>
                                    </fieldset>
                                    <button class="btn  big-btn  color-bg flat-btn" id="submit">Send<i class="fa fa-angle-right"></i></button>
                                </form>
                            </div>
                            <!-- contact form  end-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->
        <div class="limit-box fl-wrap"></div>
        <!--section -->
        <section class="gradient-bg">
            <div class="cirle-bg">
                <div class="bg" data-bg="images/bg/circle.png"></div>
            </div>
            <div class="container">
                <div class="join-wrap fl-wrap">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Rejoignez notre communauté en ligne</h3>

                        </div>
                        <div class="col-md-4"><a href="#" class="join-wrap-btn modal-open">Inscription <i class="fa fa-sign-in"></i></a></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->
    </div>
    <!-- contentend -->
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

