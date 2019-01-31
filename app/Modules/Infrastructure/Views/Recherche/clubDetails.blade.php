
@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection



@section('header')

  @include('frontOffice.inc.header')

@endsection


@section('content')

  <style media="screen">
  .result ul li {
    width: 100%;
    margin-bottom:15px;
    float:left;
    padding-bottom:15px;
    color: #878C9F;
    border-bottom:1px solid #eee;
  }
  .result ul li span.club-level {
    float: right;
    font-weight:500;
    color:#999;
  }
  .result ul li span.club-name{
    float:left;
    color: #878C9F;
    font-weight:600;
  }
  .list-single-main-wrapper .home a:first-child:before{
  	content:'';
  	position:absolute;
  	width:4px;
  	height:4px;
    color: red;
  	background:#fff;
  	border-radius:100%;
  	right:8px;
  	top:50%;
    margin-top:5px;
  }
  </style>

<!-- wrapper -->
<div id="wrapper">
  <!--  content  -->
<div class="content">
  <!--  section  -->

      @include('Infrastructure::inc.headerItems')

  <!--  section end -->
  <!--  section  -->
    <section class="gray-section no-top-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="list-single-main-wrapper fl-wrap" id="sec2">
            <div class="breadcrumbs gradient-bg  fl-wrap home"><a href="#" style="margin-left:3%">Home</a><a href="#">Listings</a><span>Club Sportif</span></div>

            <!-- list-single-main-item -->
            <div class="list-single-main-item fl-wrap" id="sec2">
              <div class="list-single-main-item-title fl-wrap">
                <h3>Description</h3>
              </div>

            <p>{{ $club->description}}</p>
            </div>
            <!-- list-single-main-item end -->

            <!-- list-single-main-item -->
            @foreach ($specialitys as $speciality)

              <div class="list-single-main-item fl-wrap" id="sec7">
                <div class="accordion">
                  <a class="toggle act-accordion" href="#"> {{$speciality->speciality}} <i class="fa fa-angle-down"></i></a>
                  <div class="accordion-inner visible">
                    <div class="box-widget result">
                      <div class="box-widget-content">
                        <ul>
                          @foreach (getTeams($club->id,$speciality->id,$speciality) as $teams)

                            @foreach ($teams as $team)

                                <li><span class="club-name">{{$team->name}} </span><span class="club-level">{{$team->level}}</span></li>

                            @endforeach


                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            <!-- list-single-main-item end -->
          </div>



        </div>
        <!--box-widget-wrap -->
        <div class="col-md-4">
          <div class="box-widget-wrap">
            <!--box-widget-item -->
            <div class="box-widget-item fl-wrap">
              <div class="box-widget widget-posts">

                <div class="box-widget-content"  style="padding:10px 30px">
                  <span class="current-status">Exercices</span>
                  <div class="accordion">
                    <div class="accordion-inner visible" style="padding-top:0px;">
                      <div class="box-widget result">
                        <div class="box-widget-content" style="padding:10px 30px">
                          <ul>
                            <li><span class="club-name"style="margin-left:3%">Type </span><span class="club-level" style="margin-right:8%">Time</span></li>
                            <li><span class="club-name">Equipe 2 </span><span class="club-level">Niveau 2</span></li>
                            <li><span class="club-name">Nombres d'équipe </span><span class="club-level">{{$club->teams->count()}}</span></li>
                            <li><span class="club-name"> Nombres de Sports </span><span class="club-level">{{$specialitys->count()}}</span></li>

                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-widget-content"  style="padding:10px 30px">
                  <span class="current-status">Equipes</span>
                  <ul>

                    @foreach ($club->teams as $team)

                      <li class="clearfix">
                        @foreach ($team->medias as $media)
                          <a href="#" class="widget-posts-img"><img src="{{ $media->link }}" alt=""></a>
                        @endforeach

                        <div class="widget-posts-descr">
                          <a href="#" title="">{{ $team->name }}</a>
                          <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 21 Mar 2017 </span>
                        </div>
                      </li>

                    @endforeach

                  </ul>
                </div>
                <div class="box-widget-content"  style="padding:10px 30px">
                  <span class="current-status">Sports</span>
                  <ul>
                    <li class="clearfix">
                      <a href="#" class="widget-posts-img"><img src="{{asset('images/all/single/13.jpg')}}" alt=""></a>
                      <div class="widget-posts-descr">
                        <a href="#" title="">Cafe "Lollipop"</a>
                        <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 21 Mar 2017 </span>
                      </div>
                    </li>
                    <li class="clearfix">
                      <a href="#" class="widget-posts-img"><img src="{{asset('images/all/single/14.jpg')}}" alt=""></a>
                      <div class="widget-posts-descr">
                        <a href="#" title=""> Apartment in the Center</a>
                        <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                      </div>
                    </li>
                    <li class="clearfix">
                      <a href="#" class="widget-posts-img"><img src="{{asset('images/all/single/15.jpg')}}" alt=""></a>
                      <div class="widget-posts-descr">
                        <a href="#" title="">Event in City Mol</a>
                        <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!--box-widget-item end -->
            <!--box-widget-item -->
            <div class="box-widget-item fl-wrap">
              <div class="box-widget-item-header">
                <h3>Galerie Photos : </h3>
              </div>
              <div class="box-widget opening-hours">
                <div class="box-widget-content">

                  <div class="gallery-items grid-small-pad  list-single-gallery three-coulms lightgallery">

                    <div class="row">
                      <div class="col-md-24">
                        <!-- 1 -->

                        @foreach ($club->medias as $media)

                          <div class="gallery-item">
                           <div class="grid-item-holder">
                             <div class="box-item">
                               <img src="{{$media->link}}" alt="">
                               <a href="{{$media->link}}" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                             </div>
                           </div>
                         </div>

                        @endforeach

                        <!-- 1 end -->
                      </div>

                    </div>


                  </div>
                </div>
              </div>

            </div>
            <!--box-widget-item end -->
            <!--box-widget-item -->
            <div class="box-widget-item fl-wrap">
              <div class="box-widget-item-header">
                <h3>**********: </h3>
              </div>
              <div class="box-widget widget-posts">
                <div class="box-widget-content">

                </div>
              </div>
            </div>
            <!--box-widget-item end -->
          </div>
        </div>
        <!--box-widget-wrap end -->
      </div>
    </div>
    </section>
  <!--  section end -->
    <div class="limit-box fl-wrap"></div>

</div>
  <!--  content end  -->
</div>
<a class="to-top"><i class="fa fa-angle-up"></i></a>
<!-- wrapper end -->
@endsection



@section('footer')

  @include('frontOffice.inc.footer')

@endsection

@section('scripts')

  <script type="text/javascript">

  $(document).ready(function() {

      $('.wichlist').click(function(e){
        e.preventDefault();
        var id = "";
        var terrainId = $(this).data('terrain');
        var clubId =  $(this).data('club');

        if (terrainId != null) {
          id = terrainId;
          type = "terrain";

        }
        if (clubId) {
          id = clubId;
          type = "club";
        }
       $.get("{{ route('showHome')}}/userWichlist/"+type+"/"+id).done(function (res) {
            if (res.status == "added") {
                $('#'+res.type+res.id+'>span').html('<img id="theImg" src="{{asset('img/like.png')}}" />');
            }
            if (res.status == "deleted") {
                $('#'+res.type+res.id+'>span').html('<img id="theImg" src="{{asset('img/unlike.png')}}" />');
              }

          });

      });
   });

  </script>

@endsection
