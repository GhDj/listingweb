<section class="parallax-section single-par list-single-section" data-scrollax-parent="true" id="sec1" style="background-color: #4db7fe;">
   {{-- <div class="slideshow-container" data-scrollax="properties: { translateY: '200px' }">

      @isset($terrain)
            @if ($terrain->medias->count() > 0)

                @foreach ($terrain->medias as $media)

                <!-- slideshow-item -->
                    <div class="slideshow-item">
                        <div class="bg" data-bg="{{$media->link}}"></div>
                    </div>
                    <!--  slideshow-item end  -->

                @endforeach

            @else
                <img src="" alt="">
                <div class="slideshow-item">
                    <div class="bg" data-bg="{{ asset('images/unkown.jpg') }}"></div>
                </div>
            @endif

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



    </div>--}}
    <div class="bg par-elem " data-bg="" data-scrollax="properties: { translateY: '30%' }" style="transform: translateZ(0px) translateY(-2.45148%);"></div>

    <div class="overlay"></div>
    <div class="bubble-bg"></div>
    <div class="list-single-header absolute-header fl-wrap">
      <div class="container">
        <div class="list-single-header-item">
          <div class="list-single-header-item-opt fl-wrap">
            <div class="list-single-header-cat fl-wrap">
                @isset($terrain)
                      <a href="#">{{  $terrain->category->title  }}</a>
                @endisset
                @isset($clubDetail)
                      <a href="#">{{  $clubDetail->sports()->first()->sport->title  }}</a>
                @endisset
            </div>
          </div>
            @isset($terrain)
              <h2>{{  $terrain->name  }}</h2>
                <span class="section-separator"></span>
            @endisset
            @isset($clubDetail)
              <h2>{{  $clubDetail->name  }}</h2>
                <span class="section-separator"></span>
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
                      {{--<span class="viewed-counter"><i class="fa fa-share-alt"></i> Partager </span>--}}
                      <div class="share-holder hid-share">
                          <div class="showshare"><span>Partager</span><i class="fa fa-share"></i></div>
                          <div class="share-container isShare"></div>
                      </div>
                @if (Auth::check() and Auth::user()->status == 2)

                  <span class="viewed-counter wichlist" id ="terrain{{$terrain->id}}" data-terrain = "{{ $terrain->id }}">
                      <span>
                    @if (is_null(Auth::user()->wishlists->where('wished_id',$terrain->id)->where('wished_type','App\Modules\Complex\Models\Terrain')->first()))
                      <img src="{{asset('img/unlike.png')}}" alt="">
                        @else
                      <img src="{{asset('img/like.png')}}" alt="">
                    @endif
                    </span> Favorie
                  </span>
                    @else
                          <span class="viewed-counter wichlist show-reg-form modal-open" id ="terrain{{$terrain->id}}" data-terrain = "{{ $terrain->id }}">
                      <span>


                              <img src="{{asset('img/unlike.png')}}" alt="">

                    </span> Favorie
                  </span>
                @endif

                    <span class="viewed-counter"><i class="fa fa-eye"></i>Vues -  {{ $terrain->complex->view_count }} </span>

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
                        @else
                            <span class="viewed-counter wichlist show-reg-form modal-open" id ="terrain{{$clubDetail->id}}" data-terrain = "{{ $clubDetail->id }}">
                      <span>

                              <img src="{{asset('img/unlike.png')}}" alt="">

                    </span> Favorie
                  </span>
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
