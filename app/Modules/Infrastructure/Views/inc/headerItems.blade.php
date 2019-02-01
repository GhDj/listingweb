<section class="list-single-section" data-scrollax-parent="true" id="sec1">
    <div class="slideshow-container" data-scrollax="properties: { translateY: '200px' }">
      @isset($terrain)
        @foreach ($terrain->medias as $media)

          <!-- slideshow-item -->
          <div class="slideshow-item">
            <div class="bg" data-bg="{{$media->link}}"></div>
          </div>
          <!--  slideshow-item end  -->

        @endforeach
      @endisset

      @isset($club)
        @foreach ($club->medias as $media)

          <!-- slideshow-item -->
          <div class="slideshow-item">
            <div class="bg" data-bg="{{$club->link}}"></div>
          </div>
          <!--  slideshow-item end  -->

        @endforeach
      @endisset



    </div>
    <div class="overlay"></div>
    <div class="list-single-header absolute-header fl-wrap">
      <div class="container">
        <div class="list-single-header-item">
          <div class="list-single-header-item-opt fl-wrap">
            <div class="list-single-header-cat fl-wrap">


              @isset($terrain)
                <a href="#">{{  $terrain->category->category  }}</a>
              @endisset
              @isset($club)
                <a href="#">{{  $club->terrain->category->category  }}</a>

              @endisset
            </div>
          </div>
          @isset($terrain)
            <h2>{{  $terrain->name  }}</h2>
          @endisset
          @isset($club)
            <h2>{{  $club->name  }}</h2>
          @endisset


          <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
            <span>(8 reviews)</span>
          </div>
          <div class="list-post-counter single-list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-6">
              <div class="list-single-header-contacts fl-wrap">
                <ul>
                @isset($terrain)

                  <li><i class="fa fa-phone"></i><a href="#">{{   $terrain->complex->phone }}</a></li>
                  <li><i class="fa fa-map-marker"></i><a href="#">{{  $terrain->complex->address->city  }},{{  $terrain->complex->address->country  }} </a></li>
                  <li><i class="fa fa-envelope-o"></i><a href="#">{{  $terrain->complex->email  }}
                      <blade domain.com</a> </li>

                @endisset

                @isset($club)

                  <li><i class="fa fa-phone"></i><a href="#">{{  $club->terrain->complex->phone  }}</a></li>
                  <li><i class="fa fa-map-marker"></i><a href="#">{{  $club->terrain->complex->address->city  }},{{  $club->terrain->complex->address->country  }} </a></li>
                  <li><i class="fa fa-envelope-o"></i><a href="#">{{  $club->terrain->complex->email  }}
                      <blade domain.com</a> </li>

                @endisset
                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <div class="fl-wrap list-single-header-column">
                @if (Auth::check() and Auth::user()->status == 1)

                  @isset($terrain)
                  <span class="viewed-counter wichlist" id ="terrain{{$terrain->id}}" data-terrain = "{{ $terrain->id }}"><span>
                    @if (is_null(Auth::user()->wishlists->where('wished_id',$terrain->id)->where('wished_type','App\Modules\Infrastructures\Models\Terrain')->first()))
                      <img src="{{asset('img/unlike.png')}}" alt="">
                        @else
                      <img src="{{asset('img/like.png')}}" alt="">
                    @endif
                    </span> Favorie</span>
                @endif




                <span class="viewed-counter"><i class="fa fa-share-alt"></i> Partager </span>
                <span class="viewed-counter"><i class="fa fa-location-arrow"></i>Y aller </span>
                @endisset

                @isset($club)

                  @if (Auth::check() and Auth::user()->status == 1)
                    <span class="viewed-counter wichlist" id ="club{{$club->id}}" data-club = "{{ $club->id }}"><span>
                  @if (is_null(Auth::user()->wishlists->where('wished_id',$club->id)->where('wished_type','App\Modules\Infrastructures\Models\Club')->first()))
                    <img src="{{asset('img/unlike.png')}}" alt="">
                      @else
                    <img src="{{asset('img/like.png')}}" alt="">
                  @endif
                    </span> Favorie</span>
                    @endif


                <span class="viewed-counter wichlist" ata-club = "{{ $club->id }}"> Partager </span>
                <span class="viewed-counter"><i class="fa fa-location-arrow"></i>Y aller </span>
                @endisset

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
