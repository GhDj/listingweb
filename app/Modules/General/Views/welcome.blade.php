
@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Home Page' ])

@endsection



@section('header')

    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'act-link','contact'=>'','faq'=>'','profile'=>'']])

@endsection


@section('content')

<style media="screen">
.list-container-4 {
  position:absolute;
  top:7px;
  left:220px;
}
.list-container-4 .tabs-4 li {
  list-style:none;
  float:left;
  margin:0;
    height: 30px;
    border-radius: 6px;
}
li.active
{
    background: #46b6ff;
}
.list-container-4 .tabs-4 li a {
  color:#999;
  font-size:15px;
  font-family:'Rokkitt', serif;
  text-transform:uppercase;
  padding:0 15px;
  margin-left: 30px;
}
.list-container-4 .tabs-4 li.active a,
.list-container-4 .tabs-4 li:hover a {
  color:#fff;

}
.list-container-4 .tabs-4 li.active a
{
    vertical-align: -webkit-baseline-middle;
}

.chosen-select{
  width: 96%;
  display: block;
  margin: 0px;
  cursor: pointer;
  height: 100%;
 border:none;
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

                              <div class="list-container-4">
                                  <ul class="tabs-4 clearfix">
                                      <li class="active"><a href="#tab-1-1" style="color:black">Chercher Un terrain</a></li>
                                      <li><a href="#tab-1-2"  style="color:black">Chercher Un Club</a></li>
                                  </ul><!--tabs-2-->
                              </div>
                                <div class="tab-container-4">
                                  <div class="tab-content-4" id="tab-1-1">
                                      <ul class="kopa-entry-list clearfix">
                                          <li>
                                            <div class="main-search-input fl-wrap">
                                              <form  action="{{ route('handleSearchMaps') }}" method="post">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="latitude" id="latitude">

                                                <input type="hidden" name="longitude" id="longitude">

                                                <div class="main-search-input-item">
                                                    <input type="text" placeholder="Nom de Terrain" name="name"/>
                                                </div>
                                                  <div class="main-search-input-item location" id="autocomplete-container">
                                                      <input type="text" placeholder="Location" name="address" id="autocomplete-input" value="" autocomplete="off">
                                                      <a href="#" class="get_current_location" data-input=""><i class="fa fa-dot-circle-o"></i></a>
                                                  </div>
                                                <div class="main-search-input-item">
                                                    <select data-placeholder="Tous les categories" class="chosen-select" name="category" >
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
                                              <form  action="{{ route('handleSearchClubs') }}" method="post">
                                                {{ csrf_field() }}

                                                  <input type="hidden" name="latitude" id="latitude_club">

                                                  <input type="hidden" name="longitude" id="longitude_club">

                                                  <div class="main-search-input-item">
                                                      <input type="text" placeholder="Nom de club" name="name"/>
                                                  </div>
                                                  <div class="main-search-input-item location" id="autocomplete-container">
                                                      <input type="text" placeholder="Location" id="autocomplete-input-club" value="" autocomplete="off">
                                                      <a href="#" data-input="-club" class="get_current_location"><i class="fa fa-dot-circle-o"></i></a>
                                                  </div>

                                                <div class="main-search-input-item">
                                                    <select data-placeholder="Tous les sports" class="chosen-select" name="speciality" >
                                                        <option value="-1">Tous les sports</option>
                                                        @foreach ($sports as $sport )
                                                            <option value="{{$sport->id}}">{{$sport->title}}</option>
                                                        @endforeach
                                                  </select>
                                                </div>

                                                <button class="main-search-button" onclick="window.location.href='listing.html'">Search</button>

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
                              <h2>Catégories</h2>
                              <div class="section-subtitle">Catalogue de Catégories</div>
                              <span class="section-separator"></span>
                              <p>.</p>
                          </div>
                          <!-- portfolio start -->
                          <div class="gallery-items fl-wrap mr-bot spad">

                              @foreach($categories as $category)
                                  <!-- gallery-item-->
                              <div class="gallery-item">
                                  <div class="grid-item-holder">
                                      <div class="listing-item-grid">
                                          <img  src="images/all/1.jpg"   alt="">
                                          <div class="listing-counter"><span>{{count($category->terrains)}} </span> Terrains</div>
                                          <div class="listing-item-cat">
                                              <h3><a href="#">{{$category->title}}</a></h3>
                                              <p></p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- gallery-item end-->
                              @endforeach
                          </div>
                          <!-- portfolio end -->
                      <!--    <a href="listing.html" class="btn  big-btn circle-btn dec-btn  color-bg flat-btn">View All<i class="fa fa-eye"></i></a>-->
                      </div>
                  </section>

                  <!-- section end -->


                  <!--section -->
                  <section id="sec2">
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
                                          <img  src="{{asset('images/unkown.jpg')}}"   alt="">
                                          <div class="listing-counter"><span>10 </span> Clubs</div>
                                          <div class="listing-item-cat">
                                              <h3><a href="listing.html">Club</a></h3>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod te</p>
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
                                          <img  src="images/unkown.jpg"   alt="">
                                          <div class="listing-counter"><span>15 </span> Terrain</div>
                                          <div class="listing-item-cat">
                                              <h3><a href="listing.html">Terrain</a></h3>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod te</p>
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
            <ul class="tabs-2 clearfix" style="margin-left: 100px;">
              @foreach ($sports as $sport)
               <li class="sportChange"  data-sport ="{{$sport->id}}"><a href="#tab-2-{{$sport->id}}" >{{$sport->title}}</a></li>
             @endforeach
            </ul><!--tabs-2-->
        </div>
        <div class="tab-container-2" style="margin-left: 160px;">
            <div class="tab-content-2">
                <ul class="kopa-entry-list clearfix terrains">
                    @foreach ($footballTerrains as $footballTerrain)
                      <li>


                          <article class="entry-item">
                              <div class="entry-thumb">

                                  @if ($footballTerrain->medias->first() != null)
                                          <a href="#" ><img src="{{$footballTerrain->medias->first()->link }}" alt="" /></a>
                                    @else
                                      <a href="#" ><img src="{{asset('images/all/5.jpg')}}" alt="" /></a>
                                  @endif

                              </div>
                              <div class="entry-content">
                                  <header>
                                      <span class="entry-date"><span class="kopa-minus"></span>{{$footballTerrain->sport->title}}</span>
                                      <h4 class="entry-title"><a href="#">{{$footballTerrain->name}}</a></h4>
                                  </header>
                              </div>
                          </article>

                      </li>
                    @endforeach
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
                                          <img  src="images/unkown.jpg"   alt="">
                                          <div class="listing-counter"><span>10 </span> Clubs</div>
                                          <div class="listing-item-cat">
                                              <h3><a href="listing.html">Terrain</a></h3>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod te</p>
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
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod te</p>
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
                                              <a href="blog-single.html"><img src="images/all/15.jpg"   alt=""></a>
                                          </div>
                                          <div class="card-post-content fl-wrap">
                                              <h3><a href="blog-single.html">{{$post->title}}</a></h3>
                                              <p>{{$post->content}}</p>
                                              <div class="post-author"><a href="#"><img src="images/avatar/4.jpg" alt=""><span>Par , {{$post->user->first_name}} {{$post->user->last_name}}</span></a></div>
                                              <div class="post-opt">
                                                  <ul>
                                                      <li><i class="fa fa-calendar-check-o"></i> <span>{{\Carbon\Carbon::parse($post->created_at)->format('dd/mm/Y')}}</span></li>
                                                      <li><i class="fa fa-eye"></i> <span>264</span></li>
                                                      <li><i class="fa fa-tags"></i> <a href="#">Photography</a>  </li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </article>
                                  </div>
                              @endforeach
                          </div>
                          <a href="#" class="btn  big-btn circle-btn  dec-btn color-bg flat-btn">Lis tout<i class="fa fa-eye"></i></a>
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
<script>
    $(".get_current_location").click(function()
    {
        getCurrentLocation($(this).attr("data-input"));
    })

</script>
@endsection
