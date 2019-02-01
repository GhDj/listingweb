 <!--=============== scripts  ===============-->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.js"> </script>

<script type="text/javascript" src="{{asset('js/frontOffice/plugins.js')}}"></script>

<script type="text/javascript" src="{{asset('js/frontOffice/scripts.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUk9fxzm6iDOe6UKvXAZVLOckLOMzHSpE&amp;libraries=places&amp;callback=initAutocomplete"></script>

<script type="text/javascript" src="{{asset('js/frontOffice/map_infobox.js')}}"></script>

<script type="text/javascript" src="{{asset('js/frontOffice/markerclusterer.js')}}"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

  {!! Toastr::message() !!}
<script type="text/javascript">

 $('#phone').mask('00000000');

</script>

@if($errors->count() > 0 and !Auth::check())
<script>

$(document).ready(function(){
  $('.modal').fadeIn();
  $("html, body").addClass("hid-body");
});
</script>
@endif

<script type="text/javascript">

(function ($) {
    "use strict";
    var markerIcon = {
        anchor: new google.maps.Point(22, 16),
        url: '{{asset('images/soccer.png')}}',
    }

    function mainMap() {
              function locationData(locationURL, locationCategory, locationImg, locationTitle, locationAddress, locationPhone, locationStarRating, locationRevievsCounter) {


                  return ('<div class="map-popup-wrap"><div class="map-popup"><div class="infoBox-close"><i class="fa fa-times"></i></div><div class="map-popup-category">' + locationCategory + '</div><a href="' + locationURL + '" class="listing-img-content fl-wrap"><img src="' + locationImg + '" alt=""></a> <div class="listing-content fl-wrap"><div class="card-popup-raining map-card-rainting" data-staRrating="' + locationStarRating + '"><span class="map-popup-reviews-count">( ' + locationRevievsCounter + ' reviews )</span></div><div class="listing-title fl-wrap"><h4><a href=' + locationURL + '>' + locationTitle + '</a></h4><span class="map-popup-location-info"><i class="fa fa-map-marker"></i>' + locationAddress + '</span><span class="map-popup-location-phone"><i class="fa fa-phone"></i>' + locationPhone + '</span></div></div></div></div>')
              }



              @isset($results)
              var locations = [
              @foreach ($results as $result)
              @if ($result->medias->count()>0)
              [locationData('{{ route('showTerrainDetails',['id' => $result->id]) }}', '{{$result->category->category}}', '{{$result->medias->first()->link}}', '{{$result->name}}', '{{$result->complex->address->city}}','{{$result->complex->phone}}', "5", "27"), {{$result->complex->address->latitude}}, {{$result->complex->address->longitude}}, 0, markerIcon],

              @else
              [locationData('{{ route('showTerrainDetails',['id' => $result->id]) }}', '{{$result->category->category}}', 'images/unkown.jpg', '{{$result->name}}', '{{$result->complex->address->city}}','{{$result->complex->phone}}', "5", "27"), {{$result->complex->address->latitude}}, {{$result->complex->address->longitude}}, 0, markerIcon],

              @endif
              @endforeach
              ];
              @endisset

              @isset($terrains)
              var locations = [
              @foreach ($terrains as $terrain)
              @if ($terrain->medias->count()>0)
              [locationData('{{ route('showTerrainDetails',['id' => $terrain->id]) }}', '{{$terrain->category->category}}', '{{$terrain->medias->first()->link}}', '{{$terrain->name}}', '{{$terrain->complex->address->city}}','{{$terrain->complex->phone}}', "5", "27"), {{$terrain->complex->address->latitude}}, {{$terrain->complex->address->longitude}}, 0, markerIcon],

              @else
              [locationData('{{ route('showTerrainDetails',['id' => $terrain->id]) }}', '{{$terrain->category->category}}', 'images/unkown.jpg', '{{$terrain->name}}', '{{$terrain->complex->address->city}}','{{$terrain->complex->phone}}', "5", "27"), {{$terrain->complex->address->latitude}}, {{$terrain->complex->address->longitude}}, 0, markerIcon],

              @endif
              @endforeach
              ];
              @endisset
              @isset($clubs)
              var locations = [
              @foreach ($clubs as $club)
              @if ($club->medias->count()>0)
              [locationData('{{ route('showClubDetails',['id' => $club->id]) }}', '{{$club->terrain->category->category}}', '{{$club->medias->first()->link}}', '{{$club->name}}', '{{$club->terrain->complex->address->city}}','{{$club->terrain->complex->phone}}', "5", "27"), {{$club->terrain->complex->address->latitude}}, {{$club->terrain->complex->address->longitude}}, 0, markerIcon],

              @else
              [locationData('{{ route('showClubDetails',['id' => $club->id]) }}', '{{$club->terrain->category->category}}', 'images/unkown.jpg', '{{$club->name}}', '{{$club->terrain->complex->address->city}}','{{$club->terrain->complex->phone}}', "5", "27"), {{$club->terrain->complex->address->latitude}}, {{$club->terrain->complex->address->longitude}}, 0, markerIcon],

              @endif
              @endforeach
              ];
              @endisset

          var map = new google.maps.Map(document.getElementById('map-main'), {
              zoom: 6,
              scrollwheel: false,
              center: new google.maps.LatLng(46.360364,2.281369),
              mapTypeId: google.maps.MapTypeId.ROADMAP,
              zoomControl: false,
              mapTypeControl: false,
              scaleControl: false,
              panControl: false,
              fullscreenControl: true,
              navigationControl: false,
              streetViewControl: false,
              animation: google.maps.Animation.BOUNCE,
              gestureHandling: 'cooperative',
              styles: [{
                  "featureType": "administrative",
                  "elementType": "labels.text.fill",
                  "stylers": [{
                      "color": "#444444"
                  }]
              }]
          });

          var geocoder = new google.maps.Geocoder();

           google.maps.event.addListener(map, 'click', function(event) {
             geocoder.geocode({
               'latLng': event.latLng
             }, function(results, status) {
               if (status == google.maps.GeocoderStatus.OK) {
                 if (results[0]) {


               $('#autocomplete-input').val(results[0].formatted_address);

               var pos = results[0].geometry.location;

                 $('#latitude').val(pos.lat());
                 $('#longitude').val(pos.lng());

                 $('#autocomplete').val(results[0].formatted_address);

                 var pos = results[0].geometry.location;

                   $('#latitudeClub').val(pos.lat());
                   $('#longitudeClub').val(pos.lng());


                 }
               }
             });
           });


          var boxText = document.createElement("div");
          boxText.className = 'map-box'
          var currentInfobox;
          var boxOptions = {
              content: boxText,
              disableAutoPan: true,
              alignBottom: true,
              maxWidth: 0,
              pixelOffset: new google.maps.Size(-145, -45),
              zIndex: null,
              boxStyle: {
                  width: "260px"
              },
              closeBoxMargin: "0",
              closeBoxURL: "",
              infoBoxClearance: new google.maps.Size(1, 1),
              isHidden: false,
              pane: "floatPane",
              enableEventPropagation: false,
          };
          var markerCluster, marker, i;
          var allMarkers = [];
          var clusterStyles = [{
              textColor: 'white',
              url: '',
              height: 50,
              width: 50
          }];


          for (i = 0; i < locations.length; i++) {
              marker = new google.maps.Marker({
                  position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                  icon: locations[i][4],
                  id: i
              });
              allMarkers.push(marker);
              var ib = new InfoBox();
              google.maps.event.addListener(ib, "domready", function () {
                  cardRaining()
              });
              google.maps.event.addListener(marker, 'click', (function (marker, i) {
                  return function () {
                      ib.setOptions(boxOptions);
                      boxText.innerHTML = locations[i][0];
                      ib.close();
                      ib.open(map, marker);
                      currentInfobox = marker.id;
                      var latLng = new google.maps.LatLng(locations[i][1], locations[i][2]);
                      map.panTo(latLng);
                      map.panBy(0, -180);
                      google.maps.event.addListener(ib, 'domready', function () {
                          $('.infoBox-close').click(function (e) {
                              e.preventDefault();
                              ib.close();
                          });
                      });
                  }
              })(marker, i));
          }
          var options = {
              gridSize: 50,
              maxZoom:18,
              imagePath: '{{asset('images/soccer.png')}}',
              styles: clusterStyles,
              minClusterSize: 0
          };
          markerCluster = new MarkerClusterer(map, allMarkers, options);
          google.maps.event.addDomListener(window, "resize", function () {
              var center = map.getCenter();
              google.maps.event.trigger(map, "resize");
              map.setCenter(center);
          });

          $('.nextmap-nav').click(function (e) {
              e.preventDefault();
              map.setZoom(18);
              var index = currentInfobox;
              if (index + 1 < allMarkers.length) {
                  google.maps.event.trigger(allMarkers[index + 1], 'click');
              } else {
                  google.maps.event.trigger(allMarkers[0], 'click');
              }
          });
          $('.prevmap-nav').click(function (e) {
              e.preventDefault();
              map.setZoom(18);
              if (typeof (currentInfobox) == "undefined") {
                  google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
              } else {
                  var index = currentInfobox;
                  if (index - 1 < 0) {
                      google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
                  } else {
                      google.maps.event.trigger(allMarkers[index - 1], 'click');
                  }
              }
          });
          $('.map-item').click(function (e) {
              e.preventDefault();
       		map.setZoom(18);
              var index = currentInfobox;
              var marker_index = parseInt($(this).attr('href').split('#')[1], 10);
              google.maps.event.trigger(allMarkers[marker_index], "click");
  			if ($(this).hasClass("scroll-top-map")){
  			  $('html, body').animate({
  				scrollTop: $(".map-container").offset().top+ "-80px"
  			  }, 500)
  			}
  			else if ($(window).width()<1064){
  			  $('html, body').animate({
  				scrollTop: $(".map-container").offset().top+ "-80px"
  			  }, 500)
  			}
          });
          var zoomControlDiv = document.createElement('div');
          var zoomControl = new ZoomControl(zoomControlDiv, map);

          function ZoomControl(controlDiv, map) {
              zoomControlDiv.index = 1;
              map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
              controlDiv.style.padding = '5px';
              var controlWrapper = document.createElement('div');
              controlDiv.appendChild(controlWrapper);
              var zoomInButton = document.createElement('div');
              zoomInButton.className = "mapzoom-in";
              controlWrapper.appendChild(zoomInButton);
              var zoomOutButton = document.createElement('div');
              zoomOutButton.className = "mapzoom-out";
              controlWrapper.appendChild(zoomOutButton);
              google.maps.event.addDomListener(zoomInButton, 'click', function () {
                  map.setZoom(map.getZoom() + 1);
              });
              google.maps.event.addDomListener(zoomOutButton, 'click', function () {
                  map.setZoom(map.getZoom() - 1);
              });
          }


      }
      var map = document.getElementById('map-main');
      if (typeof (map) != 'undefined' && map != null) {
          google.maps.event.addDomListener(window, 'load', mainMap);
      }

    function singleMap() {
        var myLatLng = {
            lng: $('#singleMap').data('longitude'),
            lat: $('#singleMap').data('latitude'),
        };
        var single_map = new google.maps.Map(document.getElementById('singleMap'), {
            zoom: 14,
            center: myLatLng,
            scrollwheel: false,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: false,
            panControl: false,
            navigationControl: false,
            streetViewControl: false,
            styles: [{
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [{
                    "color": "#f2f2f2"
                }]
            }]
        });
        var markerIcon2 = {
            url: '{{asset('images/soccer.png')}}',
        }
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: single_map,
            icon: markerIcon2,
            title: 'Notre Emplacement'
        });
        var zoomControlDiv = document.createElement('div');
        var zoomControl = new ZoomControl(zoomControlDiv, single_map);

        function ZoomControl(controlDiv, single_map) {
            zoomControlDiv.index = 1;
            single_map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
            controlDiv.style.padding = '5px';
            var controlWrapper = document.createElement('div');
            controlDiv.appendChild(controlWrapper);
            var zoomInButton = document.createElement('div');
            zoomInButton.className = "mapzoom-in";
            controlWrapper.appendChild(zoomInButton);
            var zoomOutButton = document.createElement('div');
            zoomOutButton.className = "mapzoom-out";
            controlWrapper.appendChild(zoomOutButton);
            google.maps.event.addDomListener(zoomInButton, 'click', function () {
                single_map.setZoom(single_map.getZoom() + 1);
            });
            google.maps.event.addDomListener(zoomOutButton, 'click', function () {
                single_map.setZoom(single_map.getZoom() - 1);
            });
        }
    }
    var single_map = document.getElementById('singleMap');
    if (typeof (single_map) != 'undefined' && single_map != null) {
        google.maps.event.addDomListener(window, 'load', singleMap);
    }


    function singleComplexMap() {
        var myLatLng = {
            lng: $('#singleComplexMap').data('longitude'),
            lat: $('#singleComplexMap').data('latitude'),
        };
        var single_complex_map = new google.maps.Map(document.getElementById('singleComplexMap'), {
            zoom: 6,
            center: myLatLng,
            scrollwheel: false,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: false,
            panControl: false,
            navigationControl: false,
            streetViewControl: false,
            styles: [{
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [{
                    "color": "#f2f2f2"
                }]
            }]
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: single_complex_map,
            title: 'Notre Emplacement'
        });
        var geocoder = new google.maps.Geocoder();

         google.maps.event.addListener(single_complex_map, 'click', function(event) {
           geocoder.geocode({
             'latLng': event.latLng
           }, function(results, status) {
             if (status == google.maps.GeocoderStatus.OK) {
               if (results[0]) {


             $('#autocomplete-input').val(results[0].formatted_address);

             var pos = results[0].geometry.location;

               $('#latitude').val(pos.lat());
               $('#longitude').val(pos.lng());

               $('#autocomplete').val(results[0].formatted_address);

               var pos = results[0].geometry.location;

                 $('#latitudeClub').val(pos.lat());
                 $('#longitudeClub').val(pos.lng());


               }
             }
           });
         });
        var zoomControlDiv = document.createElement('div');
        var zoomControl = new ZoomControl(zoomControlDiv, single_complex_map);

        function ZoomControl(controlDiv, single_complex_map) {
            zoomControlDiv.index = 1;
            single_complex_map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
            controlDiv.style.padding = '5px';
            var controlWrapper = document.createElement('div');
            controlDiv.appendChild(controlWrapper);
            var zoomInButton = document.createElement('div');
            zoomInButton.className = "mapzoom-in";
            controlWrapper.appendChild(zoomInButton);
            var zoomOutButton = document.createElement('div');
            zoomOutButton.className = "mapzoom-out";
            controlWrapper.appendChild(zoomOutButton);
            google.maps.event.addDomListener(zoomInButton, 'click', function () {
                single_complex_map.setZoom(single_complex_map.getZoom() + 1);
            });
            google.maps.event.addDomListener(zoomOutButton, 'click', function () {
                single_complex_map.setZoom(single_complex_map.getZoom() - 1);
            });
        }
    }
    var single_complex_map = document.getElementById('singleComplexMap');
    if (typeof (single_complex_map) != 'undefined' && single_complex_map != null) {
        google.maps.event.addDomListener(window, 'load', singleComplexMap);
    }
})(this.jQuery);

</script>

<script type="text/javascript" src="{{asset('js/frontOffice/widget.js')}}"></script>
