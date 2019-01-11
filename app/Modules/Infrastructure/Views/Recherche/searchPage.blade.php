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

                                  <!-- listsearch-input-wrap  -->
                                  <div class="listsearch-input-wrap fl-wrap">
                                    <form action="{{ route('handleSearchMaps') }}" method="post">
                                          {{ csrf_field() }}
                                      <div class="listsearch-input-item">
                                          <i class="mbri-key single-i"></i>
                                          <input type="text" placeholder="Nom de stade" name="name" value=""/>
                                      </div>
                                      <div class="listsearch-input-item">
                                            <select data-placeholder="All Sports" class="chosen-select" name="category" >
                                                <option value="-1">All Categories</option>
                                                @foreach ($categories as $categorie )
                                                    <option value="{{$categorie->category}}">{{$categorie->category}}</option>
                                                @endforeach
                                          </select>
                                      </div>
                                      <div class="listsearch-input-item">
                                          <i class="mbri-key single-i"></i>
                                          <input type="text" placeholder="Ou" value="" name="address" id="autocomplete-input"/>
                                      </div>

                                      <div class="hidden-listing-filter fl-wrap">
                                        <div class="distance-input fl-wrap">
                                            <div class="distance-title"> Radius around selected destination <span></span> km</div>
                                            <div class="distance-radius-wrap fl-wrap">
                                                <input class="distance-radius rangeslider--horizontal" type="range" min="1" max="100" step="1" value="1" data-title="Radius around selected destination">
                                            </div>
                                        </div>
                                        <!-- Checkboxes -->
                                        <div class=" fl-wrap filter-tags">
                                            <h4>Filter by Tags</h4>
                                            <input id="check-aa" type="checkbox" name="check">
                                            <label for="check-aa">Elevator in building</label>
                                            <input id="check-b" type="checkbox" name="check">
                                            <label for="check-b">Friendly workspace</label>
                                            <input id="check-c" type="checkbox" name="check">
                                            <label for="check-c">Instant Book</label>
                                            <input id="check-d" type="checkbox" name="check">
                                            <label for="check-d">Wireless Internet</label>
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

                  @isset($results)
                    @foreach ($results as $result)


                      <!-- listing-item -->
                      <div class="listing-item list-layout">
                          <article class="geodir-category-listing fl-wrap">
                              <div class="geodir-category-img" style="width:35%">
                                  <img src="images/all/8.jpg" alt="">
                                  <div class="overlay"></div>
                                  <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
                              </div>
                              <div class="geodir-category-content fl-wrap" style="width:35%">
                                  <a class="listing-geodir-category" href="listing.html">{{$result->category->category}}</a>


                                  <h3><a href="{{ route('showTerrainDetails',['id' => $result->id]) }}">{{$result->name}}</a></h3>

                                  <div class="geodir-category-location"><a href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$result->complex->name}},{{$result->complex->address->city}},{{$result->complex->address->address}}</a></div>


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

                                @foreach ($result->schedules as $schedule)


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
