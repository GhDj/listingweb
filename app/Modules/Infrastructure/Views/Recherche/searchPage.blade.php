@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Page de Recherche' ])



@endsection



@section('header')

  @include('frontOffice.inc.header')

@endsection


@section('content')
  <!-- wrapper -->
  <div id="wrapper">
      <div class="content">

        <!--section -->
        <section  style="padding:0">
            <div class="cirle-bg">
                <div class="bg" data-bg="images/bg/circle.png"></div>
            </div>
            <div class="container">
                <div class="join-wrap fl-wrap" style="padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="listsearch-options fl-wrap" id="lisfw" >
                              <div class="container">
                                  <div class="widget kopa-entry-list-widget">
                                    <div class="list-container-2">
                                        <ul class="tabs-2 clearfix">
                                            <li class="active"><a href="#tab-1-6" style="color:black">Search Terrains</a></li>
                                            <li><a href="#tab-1-7"  style="color:black">Search Clubs</a></li>
                                        </ul><!--tabs-2-->
                                    </div>
                                    <div class="tab-container-2">
                                      <div class="tab-content-2" id="tab-1-6">
                                          <ul class="kopa-entry-list clearfix">
                                              <li>
                                                <!-- listsearch-input-wrap  -->
                                                <div class="listsearch-input-wrap fl-wrap">
                                                  <form action="{{ route('handleFilterMaps') }}" method="post">
                                                        {{ csrf_field() }}

                                                        <input type="hidden" name="latitude" id="latitude">

                                                        <input type="hidden" name="longitude" id="longitude">
                                                    <div class="listsearch-input-item">
                                                        <i class="mbri-key single-i"></i>
                                                        <input type="text" placeholder="Nom de stade" name="name" value="{{ old('name') }}"/>
                                                    </div>
                                                    <div class="listsearch-input-item">
                                                          <select data-placeholder="tous les categories" class="chosen-select" name="category" id="category" >
                                                              <option value="-1">tous les categories</option>
                                                              @foreach ($categories as $categorie )
                                                                  <option value="{{$categorie->category}}">{{$categorie->category}}</option>
                                                              @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="listsearch-input-item">
                                                        <i class="mbri-key single-i"></i>
                                                        <input type="text" placeholder="Ou" value="{{ old('address') }}" name="address" id="autocomplete-input" />
                                                    </div>

                                                    <div class="hidden-listing-filter fl-wrap">
                                                      <div class="distance-input fl-wrap">
                                                          <div class="distance-title"> Rayon autour de la destination sélectionnée <span></span> km</div>
                                                          <div class="distance-radius-wrap fl-wrap">
                                                              <input class="distance-radius rangeslider--horizontal" type="range" min="1" max="100" step="1" value="50"  name = "distance" data-title="Radius around selected destination">
                                                          </div>
                                                      </div>
                                                      <!-- Checkboxes -->
                                                      <div class=" fl-wrap filter-tags">
                                                          <h4>Filtrer par catégorie</h4>
                                                          @foreach ($categories as $categorie)
                                                            <input id="check-{{$categorie->category}}" type="checkbox" name="categories[]" value="{{$categorie->category}}">
                                                            <label for="check-{{$categorie->category}}">{{$categorie->category}}</label>
                                                          @endforeach
                                                      </div>
                                                  </div>
                                                  <!-- hidden-listing-filter end -->
                                                  <div class="more-filter-option">More Filters <span></span></div>

                                                  <div class="listsearch-input-item" style="margin-top:15px;">

                                                  <button class="button fs-map-btn">Update</button>

                                                  </div>

                                                  </form>
                                                </div>
                                                <!-- listsearch-input-wrap end -->
                                              </li>
                                          </ul>
                                      </div>
                                      <div class="tab-content-2" id="tab-1-7">
                                          <ul class="kopa-entry-list clearfix">
                                              <li>
                                                <!-- listsearch-input-wrap  -->
                                                <div class="listsearch-input-wrap fl-wrap">
                                                  <form action="{{ route('handleFilterClubs') }}" method="post">
                                                        {{ csrf_field() }}

                                                        <input type="hidden" name="latitudeClub" id="latitudeClub">

                                                        <input type="hidden" name="longitudeClub" id="longitudeClub">
                                                    <div class="listsearch-input-item">
                                                        <i class="mbri-key single-i"></i>
                                                        <input type="text" placeholder="Nom de Club" name="name" value=""/>
                                                    </div>
                                                    <div class="listsearch-input-item">
                                                          <select data-placeholder="Tous les sports" class="chosen-select" name="speciality" id="speciality" >
                                                              <option value="-1">Tous les sports</option>
                                                              @foreach ($sports as $sport )
                                                                  <option value="{{$sport->id}}">{{$sport->speciality}}</option>
                                                              @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="listsearch-input-item">
                                                        <i class="mbri-key single-i"></i>
                                                        <input type="text" placeholder="Ou" value="" name="address" id="autocomplete"/>
                                                    </div>

                                                    <div class="hidden-listing-filter fl-wrap">
                                                      <div class="distance-input fl-wrap">
                                                          <div class="distance-title">  Rayon autour de la destination sélectionnée <span></span> km</div>
                                                          <div class="distance-radius-wrap fl-wrap">
                                                              <input class="distance-radius rangeslider--horizontal" type="range" min="1" max="100" step="1" value="50" name = "distance" data-title="Radius around selected destination">
                                                          </div>
                                                      </div>
                                                      <!-- Checkboxes -->
                                                      <div class=" fl-wrap filter-tags">
                                                          <h4>Filtrer par sport</h4>
                                                          @foreach ($sports as $sport)
                                                            <input id="check-{{$sport->id}}" type="checkbox" name="specialitys[]" value="{{$sport->id}}">
                                                            <label for="check-{{$sport->id}}">{{$sport->speciality}}</label>
                                                          @endforeach
                                                      </div>
                                                  </div>
                                                  <!-- hidden-listing-filter end -->
                                                  <div class="more-filter-option">More Filters <span></span></div>

                                                  <div class="listsearch-input-item" style="margin-top:15px;">

                                                  <button class="button fs-map-btn">Update</button>

                                                  </div>

                                                  </form>
                                                </div>
                                                <!-- listsearch-input-wrap end -->
                                              </li>
                                          </ul>
                                      </div>

                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--section end -->
          <!-- Map -->
          <div class="map-container column-map right-pos-map" style="width:30%;">
              <div id="map-main"></div>
              <ul class="mapnavigation">
                  <li><a href="#" class="prevmap-nav">Prev</a></li>
                  <li><a href="#" class="nextmap-nav">Next</a></li>
              </ul>
          </div>
          <!-- Map end -->
          <!--col-list-wrap -->
          <div class="col-list-wrap left-list" style="width:70%;">

              <!-- list-main-wrap-->
              <div class="list-main-wrap fl-wrap card-listing">
                  <div class="container">

                  @isset($terrains)
                    @foreach ($terrains as $terrain)
                      <!-- listing-item -->
                      <div class="listing-item list-layout">
                          <article class="geodir-category-listing fl-wrap">
                              <div class="geodir-category-img" style="width:35%">
                                  <img src="images/all/8.jpg" alt="">
                                  <div class="overlay"></div>
                                  <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
                              </div>
                              <div class="geodir-category-content fl-wrap" style="width:35%">
                                  <a class="listing-geodir-category" href="listing.html">{{$terrain->category->category}}</a>


                                  <h3><a href="{{ route('showTerrainDetails',['id' => $terrain->id]) }}">{{$terrain->name}}</a></h3>

                                  <div class="geodir-category-location"><a href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$terrain->complex->name}},{{$terrain->complex->address->city}},{{$terrain->complex->address->address}}</a></div>


                                  <div class="geodir-category-options " >


                                      <div class="search-item-1">
                                      <ul>
                                        <li><a href="#">Test1</a></li>
                                        <li>Test2</li>
                                        <li>Test3</li>
                                      </ul>
                                      </div>
                                  </div>
                              </div>
                              <div class="geodir-category-content " style="width:30%">


                      <div class="geodir-category-options ">
                          <div class="box-widget-item">
                            <div class="opening-hours">
                              <ul>

                                @foreach ($terrain->schedules as $schedule)
                                <li><span class="opening-hours-day">{{$schedule->day}} </span><span class="opening-hours-time">{{$schedule->start_at->format('H:i')}} - {{$schedule->ends_at->format('H:i')}}</span></li>
                                @endforeach

                              </ul>

                            </div>
                          </div>
                        </div>
                              </div>
                          </article>
                      </div>
                      <!-- listing-item end-->

                    @endforeach

                  @endisset

                  @isset($clubs)
                    @foreach ($clubs as $club)
                      <!-- listing-item -->
                      <div class="listing-item list-layout">
                          <article class="geodir-category-listing fl-wrap">
                              <div class="geodir-category-img" style="width:35%">
                             <img src="@if ($club->medias->count() > 0)
                                      {{  $club->medias->first()->link}}
                                      @else
                                        images/all/9.jpg
                                  @endif" alt="">
                                  <div class="overlay"></div>
                                  <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
                              </div>
                              <div class="geodir-category-content fl-wrap" style="width:35%">

                                <a class="listing-geodir-category" href="listing.html">{{ucfirst($club->terrain->complex->name)}}</a>


                                  <h3><a href="{{ route('showClubDetails',['id' => $club->id]) }}">{{$club->name}}</a></h3>

                                  <div class="geodir-category-location"><a href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$club->terrain->complex->name}},{{$club->terrain->complex->address->city}},{{$club->terrain->complex->address->address}}</a></div>


                                  <div class="geodir-category-options " >


                                      <div class="search-item-1">
                                      <ul>
                                        <li><a href="#">Test1</a></li>
                                        <li>Test2</li>
                                        <li>Test3</li>
                                      </ul>
                                      </div>
                                  </div>
                              </div>
                              <div class="geodir-category-content " style="width:30%">
                              </div>
                          </article>
                      </div>
                      <!-- listing-item end-->

                    @endforeach

                  @endisset
                  </div>
                  <a class="load-more-button" href="#">Load more <i class="fa fa-circle-o-notch"></i> </a>
              </div>
              <!-- list-main-wrap end-->
          </div>
          <!--col-list-wrap -->
          <div class="limit-box fl-wrap"></div>

      </div>
      <!--content end -->
  </div>
  <!-- wrapper end -->

@endsection




@section('footer')

  @include('frontOffice.inc.footer')

@endsection
