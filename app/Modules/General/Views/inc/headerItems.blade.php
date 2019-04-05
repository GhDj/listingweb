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

      @isset($clubDetail)
        @foreach ($clubDetail->medias as $media)

          <!-- slideshow-item -->
          <div class="slideshow-item">
            <div class="bg" data-bg="{{$clubDetail->link}}"></div>
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
                @isset($clubDetail)
                      <a href="#">{{  $clubDetail->terrain->category->category  }}</a>
                @endisset
            </div>
          </div>
            @isset($terrain)
              <h2>{{  $terrain->name  }}</h2>
            @endisset
            @isset($clubDetail)
              <h2>{{  $clubDetail->name  }}</h2>
            @endisset

          @isset($starsTerrain)
              <div class="listing-rating card-popup-rainingvis" data-starrating2="{{$starsTerrain}}">
                @if (!empty($terrain->reviews))
                    <span>{{$terrain->reviews->count()}} reviews</span>
                    @else
                    <span>Aucune review</span>
                @endif
              </div>
          @endisset


          @isset($starsClub)
              <div class="listing-rating card-popup-rainingvis" data-starrating2="{{$starsClub}}">
              @if (!empty($clubDetail->reviews))
                  <span>{{$clubDetail->reviews->count()}} reviews</span>
                  @else
                    <span>Aucune review</span>
              @endif
            </div>
            @endisset


          @isset($terrain)
            <div id="favorieTerrains" class="list-post-counter single-list-post-counter"><span>{{$terrain->wishlists->count()}}</span><i class="fa fa-heart"></i></div>
          @endisset

          @isset($clubDetail)
            <div id="favorieClubs" class="list-post-counter single-list-post-counter"><span>{{$clubDetail->wishlists->count()}}</span><i class="fa fa-heart"></i></div>
          @endisset

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

                @isset($clubDetail)

                  <li><i class="fa fa-phone"></i><a href="#">{{  $clubDetail->terrain->complex->phone  }}</a></li>
                  <li><i class="fa fa-map-marker"></i><a href="#">{{  $clubDetail->terrain->complex->address->city  }},{{  $clubDetail->terrain->complex->address->country  }} </a></li>
                  <li><i class="fa fa-envelope-o"></i><a href="#">{{  $clubDetail->terrain->complex->email  }}
                      <blade domain.com</a> </li>

                @endisset
                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <div class="fl-wrap list-single-header-column">
                @isset($terrain)
                @if (Auth::check() and Auth::user()->status == 2)

                  <span class="viewed-counter wichlist" id ="terrain{{$terrain->id}}" data-terrain = "{{ $terrain->id }}"><span>
                    @if (is_null(Auth::user()->wishlists->where('wished_id',$terrain->id)->where('wished_type','App\Modules\Complex\Models\Terrain')->first()))
                      <img src="{{asset('img/unlike.png')}}" alt="">
                        @else
                      <img src="{{asset('img/like.png')}}" alt="">
                    @endif
                    </span> Favorie</span>
                @endif

                <span class="viewed-counter"><i class="fa fa-share-alt"></i> Partager </span>
                <span class="viewed-counter"><i class="fa fa-location-arrow"></i>Y aller </span>
                @endisset

                @isset($clubDetail)
                  @if (Auth::check() and Auth::user()->status == 2)
                    <span class="viewed-counter wichlist" id ="club{{$clubDetail->id}}" data-club = "{{ $clubDetail->id }}"><span>
                  @if (is_null(Auth::user()->wishlists->where('wished_id',$clubDetail->id)->where('wished_type','App\Modules\Complex\Models\Club')->first()))
                    <img src="{{asset('img/unlike.png')}}" alt="">
                      @else
                    <img src="{{asset('img/like.png')}}" alt="">
                  @endif
                    </span> Favorie</span>
                  @endif
                <span class="viewed-counter wichlist" ata-club = "{{ $clubDetail->id }}"><i class="fa fa-share-alt"></i> Partager </span>
                <span class="viewed-counter"><i class="fa fa-location-arrow"></i>Y aller </span>
              @endisset

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
