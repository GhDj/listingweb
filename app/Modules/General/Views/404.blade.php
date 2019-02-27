
@extends('frontOffice.layout')

@section('head')

    @include('frontOffice.inc.head', ['title' => 'Olympiade | Home Page' ])

@endsection



@section('header')

    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'act-link','contact'=>'','faq'=>'','profile'=>'']])

@endsection


@section('content')
    <style>
        section.parallax-section {
            padding: 110px 0;
        }
        .h2_message_404
            {
            height: 120px;
            }
    </style>
<div id="wrapper">
    <!--  content  -->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section" data-scrollax-parent="true" id="sec1">
            <div class="bg par-elem "  data-bg="{{asset('images/bg/404.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="bubble-bg"></div>
            <div class="container">
                <div class="error-wrap">
                    <h2 class="h2_message_404">404</h2>
                    <p>We're sorry, but the Page you were looking for, couldn't be found.</p>
                    <div class="clearfix"></div>
                    <form action="#">
                        <input name="se" id="se" type="text" class="search" placeholder="Search.." value="Search...">
                        <button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
                    </form>
                    <div class="clearfix"></div>
                    <p>Or</p>
                    <a href="index.html" class="btn  big-btn  color-bg flat-btn">Back to Home Page<i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </section>
        <!--  section  end-->
        <!--  section  -->
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
        <!--  section end -->
        <div class="limit-box"></div>
    </div>
    <!--  content end  -->
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
