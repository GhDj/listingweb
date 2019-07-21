@extends('frontOffice.layout')

@section('head')

    @include('frontOffice.inc.head', ['title' => 'Olympiade | Home Page' ])

@endsection



@section('header')

    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'act-link','contact'=>'','faq'=>'','profile'=>'','associations' =>'','infrastructure'=>'']])

@endsection


@section('content')

    <style media="screen">
        .list-container-4 {
            position: absolute;
            top: 7px;
            left: 220px;
        }

        .list-container-4 .tabs-4 li {
            list-style: none;
            float: left;
            margin: 0;
            height: 30px;
            border-radius: 6px;
        }

        li.active {
            background: #46b6ff;
        }

        .list-container-4 .tabs-4 li a {
            color: #999;
            font-size: 15px;
            font-family: 'Rokkitt', serif;
            text-transform: uppercase;
            padding: 0 15px;
            margin-left: 30px;
        }

        .list-container-4 .tabs-4 li.active a,
        .list-container-4 .tabs-4 li:hover a {
            color: #fff;

        }

        .list-container-4 .tabs-4 li.active a {
            vertical-align: -webkit-baseline-middle;
        }

        .chosen-select {
            width: 96%;
            display: block;
            margin: 0px;
            cursor: pointer;
            height: 100%;
            border: none;
        }
    </style>

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
                        <div class="widget kopa-entry-list-widget">

                            <div class="list-container-8">
                                <ul class="tabs-4 clearfix">
                                    <li class="active">
                                        <a href="#tab-1-1">

                                            <div class="section-title search-tab-title">
                                                <h2>Chercher Un terrain</h2>
                                            </div>
                                        </a>
                                    </li>
                                    <li><a href="#tab-1-2">

                                            <div class="section-title search-tab-title">
                                                <h2>Chercher une association sportive</h2>
                                            </div></a></li>
                                </ul><!--tabs-2-->
                            </div>
                            <div class="tab-container-4">
                                <div class="tab-content-4" id="tab-1-1">
                                    <ul class="kopa-entry-list clearfix">
                                        <li>
                                            <div class="main-search-input fl-wrap">
                                                <form action="{{ route('handleSearchMaps') }}" method="post">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="latitude" id="latitude">

                                                    <input type="hidden" name="longitude" id="longitude">

                                                    <div class="main-search-input-item">
                                                        <input type="text" placeholder="Nom de Terrain" name="name"/>
                                                    </div>
                                                    <div class="main-search-input-item location"
                                                         id="autocomplete-container">
                                                        <input type="text" placeholder="Location" name="address"
                                                               id="autocomplete-input" value="" autocomplete="off">
                                                        <a href="#" class="get_current_location" data-input="autocomplete-input"><i
                                                                    class="fa fa-dot-circle-o"></i></a>
                                                    </div>
                                                    <div class="main-search-input-item">
                                                        <select data-placeholder="Tous les categories"
                                                                class="chosen-select" name="category">
                                                            <option value="-1">Tous les categories</option>
                                                            @foreach ($categories as $categorie )
                                                                <option value="{{$categorie->id}}">{{$categorie->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <button class="main-search-button" type="submit">Chercher</button>

                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!--tab-content-2-->
                                <div class="tab-content-4" id="tab-1-2">
                                    <ul class="kopa-entry-list clearfix">
                                        <li>
                                            <div class="main-search-input fl-wrap">
                                                <form action="{{ route('handleSearchClubs') }}" method="post">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="latitude" id="latitude_club">

                                                    <input type="hidden" name="longitude" id="longitude_club">

                                                    <div class="main-search-input-item">
                                                        <input type="text" placeholder="Nom de club" name="name"/>
                                                    </div>
                                                    <div class="main-search-input-item location"
                                                         id="autocomplete-container">
                                                        <input type="text" placeholder="Location"
                                                               id="autocomplete-input-club" value="" autocomplete="off">
                                                        <a href="#" data-input="autocomplete-input-club" class="get_current_location"><i
                                                                    class="fa fa-dot-circle-o"></i></a>
                                                    </div>

                                                    <div class="main-search-input-item">
                                                        <select data-placeholder="Tous les sports" class="chosen-select"
                                                                name="speciality">
                                                            <option value="-1">Tous les sports</option>
                                                            @foreach ($sports as $sport )
                                                                <option value="{{$sport->id}}">{{$sport->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <button class="main-search-button" type="submit">Chercher
                                                    </button>

                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!--tab-content-2-->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- home-map end-->
            </div>
            <!-- home-map end -->

            <!--section -->
            <section id="sec2">
                <div class="container">
                    <div class="section-title">
                        <h2>Olympiade Club</h2>
                        <div class="section-subtitle">Olympiade Club</div>
                        <span class="section-separator"></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
                    </div>
                    <!-- portfolio start -->
                    <div class="gallery-items fl-wrap mr-bot spad">
                        <!-- gallery-item-->
                        <div class="gallery-item">
                            <div class="grid-item-holder">
                                <div class="listing-item-grid">
                                    <img src="images/all/1.jpg" alt="" style="
    height: 535px;
">
                                    <div class="listing-counter"><span>{{ \App\Modules\Complex\Models\ComplexCategory::where('category_id','=',1)->first()->complex()->first()->terrains->count() }} </span> Emplacements</div>
                                    <div class="listing-item-cat">
                                        <h3><a href="{{ route('hundleGetListingByCategory',1) }}">Equipements Sportifs</a></h3>
                                        <p>Constant care and attention to the patients makes good record</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item end-->
                        <!-- gallery-item-->
                        <div class="gallery-item gallery-item-second">
                            <div class="grid-item-holder">
                                <div class="listing-item-grid">
                                    <img src="images/bg/19.jpg" alt="">
                                    <div class="listing-counter"><span> {{ \App\Modules\Complex\Models\Club::all()->count() }} </span> Clubs</div>
                                    <div class="listing-item-cat">
                                        <h3><a href="{{ route('handleSearchClubs') }}">Associations Sportives</a></h3>
                                        <p>Constant care and attention to the patients makes good record</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item end-->
                        <!-- gallery-item-->

                        <!-- gallery-item end-->
                        <!-- gallery-item-->
                        <div class="gallery-item">
                            <div class="grid-item-holder">
                                <div class="listing-item-grid">
                                    <img src="images/all/22.jpg" alt="">
                                    <div class="listing-counter"><span>7 </span> Locations</div>
                                    <div class="listing-item-cat">
                                        <h3><a href="listing.html">Olympiade Magazine</a></h3>
                                        <p>Constant care and attention to the patients makes good record</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item end-->
                        <!-- gallery-item-->
                        <div class="gallery-item">
                            <div class="grid-item-holder">
                                <div class="listing-item-grid">
                                    <img src="images/all/5.jpg" alt="">
                                    <div class="listing-counter"><span>15 </span> Locations</div>
                                    <div class="listing-item-cat">
                                        <h3><a href="listing.html">Olympiade Family</a></h3>
                                        <p>Constant care and attention to the patients makes good record</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item end-->
                    </div>
                    <div class="gallery-items fl-wrap mr-bot spad">

                   {{-- @foreach($categories as $category)
                        <!-- gallery-item-->
                            <div class="gallery-item">
                                <div class="grid-item-holder">
                                    <div class="listing-item-grid">
                                        <img src="images/all/1.jpg" alt="">
                                        <div class="listing-counter"><span>{{ \App\Modules\Complex\Models\ComplexCategory::where('category_id','=',$category->id)->first()->complex()->first()->terrains->count() }} </span>
                                            Terrains
                                        </div>
                                        <div class="listing-item-cat">
                                            <h3><a href="{{ route('hundleGetListingByCategory',$category->id) }}">{{$category->title}}</a></h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gallery-item end-->
                        @endforeach--}}
                    </div>
                    <!-- portfolio end -->
                    <!--    <a href="listing.html" class="btn  big-btn circle-btn dec-btn  color-bg flat-btn">View All<i class="fa fa-eye"></i></a>-->
                </div>
            </section>

            <!-- section end -->


            <!--section -->
            {{--<section id="sec2">
                <div class="container">
                    <div class="section-title">
                        <h2>Notre Application</h2>
                        <div class="section-subtitle">Catalog of Categories</div>
                        <span class="section-separator"></span>
                        <p>Découvrez les terrains et clubs situés à la France .</p>
                    </div>
                    <!-- portfolio start -->
                    <div class="gallery-items fl-wrap mr-bot spad">
                        <!-- gallery-item-->
                        <div class="gallery-item">
                            <div class="grid-item-holder">
                                <div class="listing-item-grid">
                                    <img src="{{asset('images/unkown.jpg')}}" alt="">
                                    <div class="listing-counter"><span>10 </span> Clubs</div>
                                    <div class="listing-item-cat">
                                        <h3><a href="listing.html">Club</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            te</p>
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
                                    <img src="images/unkown.jpg" alt="">
                                    <div class="listing-counter"><span>15 </span> Terrain</div>
                                    <div class="listing-item-cat">
                                        <h3><a href="listing.html">Terrain</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            te</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item end-->
                    </div>
                    <!-- portfolio end -->

                </div>
            </section>--}}
            <!-- section end -->

            <!--section -->
            <section>
                <div class="container">

                    <div class="widget-area-12">

                        <div class="kopa-divider"></div>

                        <!--section -->
                        <section class="gray-section">
                            <div class="container">
                                <div class="section-title">
                                    <h2>Les équipements sportifs populaires</h2>
                                    <div class="section-subtitle">Best Listings</div>
                                    <span class="section-separator"></span>
                                    <p></p>
                                </div>
                            </div>
                            <!-- carousel -->
                            <div class="list-carousel fl-wrap card-listing ">
                                <!--listing-carousel-->
                                <div class="listing-carousel  fl-wrap ">
                                    @foreach($terrains as $terrain)
                                        <div class="slick-slide-item" style="max-height: 400px">
                                            <!-- listing-item -->
                                            <div class="listing-item">
                                                <article class="geodir-category-listing fl-wrap">
                                                    <div class="geodir-category-img">
                                                        @if(count($terrain->medias)>0)
                                                            <img src="{{ asset($terrain->medias->first()->link)}}"
                                                                 alt="">
                                                        @else
                                                            <img src="{{asset("images/unkown.jpg")}}"
                                                                 alt="">
                                                        @endif

                                                        <div class="overlay"></div>
                                                        <div class="list-post-counter"><span>{{ $terrain->wishlists->count() }}</span><i
                                                                    class="fa fa-heart"></i></div>
                                                    </div>
                                                    <div class="geodir-category-content fl-wrap">
                                                        <a class="listing-geodir-category"
                                                           href="#">{{$terrain->sport->title}}</a>
                                                        <div class="listing-avatar">
                                                            @if($terrain->complex->user_id!=null && $terrain->complex->user->photo!=null)
                                                                <a href="#"><img
                                                                            src="{{asset($terrain->complex->user->photo)}}"
                                                                            alt=""></a>
                                                            @else
                                                                <a href="#"><img
                                                                            src="{{asset("images/avatar/avatar-bg.png")}}"
                                                                            alt=""></a>
                                                            @endif
                                                            @if($terrain->complex->user_id!=null)
                                                                <span class="avatar-tooltip">Ajouté par  <strong>{{$terrain->complex->user->first_name}} {{$terrain->complex->user->last_name}}</strong></span>
                                                            @else
                                                                <span class="avatar-tooltip">Ajouté par  <strong>Olympiade</strong></span>
                                                            @endif

                                                        </div>
                                                        <h3>
                                                            <a href="{{route('showTerrainDetails',$terrain->id)}}">{{$terrain->name}}</a>
                                                        </h3>
                                                        <p>{{ substr($terrain->description,0,50) }}</p>
                                                        <div class="geodir-category-options fl-wrap">
                                                            <div class="listing-rating card-popup-rainingvis"
                                                                 data-starrating2="5">
                                                                <span>({{$terrain->reviews->count()}} reviews)</span>
                                                            </div>
                                                            <div class="geodir-category-location"><a href="#"><i
                                                                            class="fa fa-map-marker"
                                                                            aria-hidden="true"></i> {{$terrain->complex->address->address}} {{$terrain->complex->address->city}}
                                                                    ,{{$terrain->complex->address->country}} </a></div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <!-- listing-item end-->
                                        </div>
                                @endforeach
                                <!--slick-slide-item-->

                                    <!--slick-slide-item end-->

                                </div>
                                <!--listing-carousel end-->
                                <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                                <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                            </div>
                            <!--  carousel end-->
                        </section>
                        <!-- section end -->


                    </div><!--widget-area-12-->

                </div>

            </section>
            <!-- section end -->
            <!--section -->
            <section class="color-bg">
                <div class="shapes-bg-big"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images-collage fl-wrap">
                                <div class="images-collage-title">Olympiade<span>Sport</span></div>
                                <div class="images-collage-main images-collage-item"><img src="images/avatar/1.jpg"
                                                                                          alt=""></div>
                                <div class="images-collage-other images-collage-item" data-position-left="23"
                                     data-position-top="10" data-zindex="2"><img src="images/avatar/2.jpg" alt=""></div>
                                <div class="images-collage-other images-collage-item" data-position-left="62"
                                     data-position-top="54" data-zindex="5"><img src="images/avatar/4.jpg" alt=""></div>
                                <div class="images-collage-other images-collage-item anim-col" data-position-left="18"
                                     data-position-top="70" data-zindex="11"><img src="images/avatar/6.jpg" alt="">
                                </div>
                                <div class="images-collage-other images-collage-item" data-position-left="37"
                                     data-position-top="90" data-zindex="1"><img src="images/avatar/5.jpg" alt=""></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="color-bg-text">
                                <h3>Rejoignez Olympiade Family</h3>
                                <p>
                                    Olympiade sports est un projet communautaire qui permet :
                                <ul style="color:white">
                                    <li> -Trouver facilement des infrastructures et clubs sportifs
                                    </li>
<br/>
                                    <li> -Suivre votre activité sportive
                                    </li>
<br>
                                    <li> -Partager vos expériences
                                    </li>
                                </ul>
                                </p>
                                <a href="#" class="color-bg-link modal-open">Connectez vous maintenant</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--section   end -->

            <!--section -->
            <section>
                <div class="container">
                    <div class="section-title">
                        <h2>How it works</h2>
                        <div class="section-subtitle">OLYMPIADE SPORTS</div>
                        <span class="section-separator"></span>
                        <p>Olympiade sports est le premier guide pour les sportifs. Découvrez les infrastructures et clubs sportifs proche de chez vous.</p>
                    </div>
                    <!--process-wrap  -->
                    <div class="process-wrap fl-wrap">
                        <ul>
                            <li>
                                <div class="process-item">
                                    <span class="process-count">01 . </span>
                                    <div class="time-line-icon">
                                        <img width="100%" height="300px" src="{{asset('images/how_it_work_step_1.png')}}"/>
                                    </div>
                                    <h4> Find Interesting Place</h4>

                                </div>
                                <span class="pr-dec"></span>
                            </li>
                            <li>
                                <div class="process-item">
                                    <span class="process-count">02 .</span>
                                    <div class="time-line-icon">

                                      <img width="100%" height="300px" src="{{asset('images/how_it_work_step_2.png')}}"/>
                                    </div>
                                    <h4> Contact a Few Owners</h4>

                                </div>
                                <span class="pr-dec"></span>
                            </li>
                            <li>
                                <div class="process-item">
                                    <span class="process-count">03 .</span>
                                    <div class="time-line-icon">
                                        <img width="100%" height="300px" src="{{asset('images/how_it_work_step_3.png')}}"/>
                                    </div>
                                    <h4> Make a Listing</h4>

                                </div>
                            </li>
                        </ul>
                        <div class="process-end"><i class="fa fa-check"></i></div>
                    </div>
                    <!--process-wrap   end-->
                </div>
            </section>
            <!--section   end -->

            <section class="parallax-section" data-scrollax-parent="true">
                <div class="bg"  data-bg="{{asset('images/seperator.png')}}" data-scrollax="properties: { translateY: '100px' }"></div>
                <div class="overlay co lor-overlay"></div>
                <!--container-->
                <div class="container">
                    <div class="intro-item fl-wrap">
                        <h2>Inscrivez votre complexe sportif ou votre association sportive</h2>
                        <a class="trs-btn show-reg-form modal-open" href="#">S'inscrire</a>
                    </div>
                </div>
            </section>


            <!--section -->
            <section id="sec2">
                <div class="container">
                    <div class="section-title">
                        <h2>Olympiade</h2>
                        <div class="section-subtitle">Catalog of Categories</div>
                        <span class="section-separator"></span>
                        <p>Découvrez les terrains et clubs situés à la France .</p>
                    </div>
                    <!-- portfolio start -->
                    <div class="gallery-items fl-wrap mr-bot spad">
                        <!-- gallery-item-->
                        <div class="gallery-item">
                            <div class="grid-item-holder">
                                <div class="listing-item-grid">
                                    <img src="images/unkown.jpg" alt="">
                                    <div class="listing-counter"><span>10 </span> Clubs</div>
                                    <div class="listing-item-cat">
                                        <h3><a href="{{ route('showSearchPage') }}">Terrain</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            te</p>
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
                                    <img src="images/all/5.jpg" alt="">
                                    <div class="listing-counter"><span>15 </span> Locations</div>
                                    <div class="listing-item-cat">
                                        <h3><a href="listing.html">Shop - Store</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            te</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item end-->
                    </div>

                </div>
            </section>
            <!-- section end -->


            <section>
                <div class="container">
                    <div class="section-title">
                        <h2>Tips & Articles</h2>
                        <div class="section-subtitle">From the blog.</div>
                        <span class="section-separator"></span>
                        <p>Browse the latest articles from our blog.</p>
                    </div>
                    <div class="row home-posts">
                        @foreach($posts as $post)
                            <div class="col-md-4">
                                <article class="card-post">
                                    <div class="card-post-img fl-wrap">
                                        <a href="blog-single.html"><img src="images/all/15.jpg" alt=""></a>
                                    </div>
                                    <div class="card-post-content fl-wrap">
                                        <h3><a href="blog-single.html">{{$post->title}}</a></h3>
                                        <p>{{$post->content}}</p>
                                        <div class="post-author"><a href="#"><img src="images/avatar/4.jpg"
                                                                                  alt=""><span>Par , {{$post->user->first_name}} {{$post->user->last_name}}</span></a>
                                        </div>
                                        <div class="post-opt">
                                            <ul>
                                                <li><i class="fa fa-calendar-check-o"></i>
                                                    <span>{{\Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</span>
                                                </li>
                                                <li><i class="fa fa-eye"></i> <span>0</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                    <a href="#" class="btn  big-btn circle-btn  dec-btn color-bg flat-btn">Lis tout<i
                                class="fa fa-eye"></i></a>
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
@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {

            $("ul.tabs-2 li:first").addClass("active");
            $('.sportChange').click(function () {
                jQuery("ul.tabs-2 li").removeClass("active");
                jQuery(this).addClass("active");
                var sport = $(this).data('sport');
                $.get("{{ route('showHome')}}/sports/" + sport).done(function (res) {

                    $('.terrains').html(" ");
                    var speciality = res.sport.speciality;


                    if (res.status == 200) {
                        $.each(res.terrains, function (i, v) {
                            var link = "";
                            if (v.medias.length > 0) {
                                link = v.medias[0].link;
                            } else {
                                link = "{{asset('images/all/5.jpg')}}";
                            }


                            $('.terrains').append(`<li>` +
                                '<article class="entry-item">' +
                                '<div class="entry-thumb">' +
                                '<a href="#"><img src="' + link + '" alt="" /></a>' +
                                '</div>' +
                                '<div class="entry-content">' +
                                '<header>' +
                                '<span class="entry-date"><span class="kopa-minus"></span>' + speciality + '</span>' +
                                '<h4 class="entry-title"><a href="#">' + v.name + '</a></h4>' +
                                '</header>' +
                                '</div>' +
                                '</article>' +
                                '</li>'
                            ).children(':last').hide().fadeIn(1000);
                        });
                    } else {
                        $('.terrains').append('<p> Pas Des Terrains Sous Ce Sport </p>');
                    }


                });

            });
        });

    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $(".get_current_location").click(function () {
                handleGetCurrentLocation($(this).attr("data-input"));
            });
            if ($(".tab-content-4").length > 0) {

                $(".tab-content-4").hide();
                $("ul.tabs-4 li:first").addClass("active").show();
                $(".tab-content-4:first").show();
                $("ul.tabs-4 li").click(function () {
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
    <script>
        $(".get_current_location").click(function () {
            getCurrentLocation($(this).attr("data-input"));
        })

    </script>
@endsection
