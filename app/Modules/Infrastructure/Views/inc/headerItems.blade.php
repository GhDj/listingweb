<section class="list-single-section" data-scrollax-parent="true" id="sec1">
    <div class="slideshow-container" data-scrollax="properties: { translateY: '200px' }">
      <!-- slideshow-item -->
      <div class="slideshow-item">
        <div class="bg" data-bg="images/bg/36.jpg"></div>
      </div>
      <!--  slideshow-item end  -->
      <!-- slideshow-item -->
      <div class="slideshow-item">
        <div class="bg" data-bg="images/bg/37.jpg"></div>
      </div>
      <!--  slideshow-item end  -->
      <!-- slideshow-item -->
      <div class="slideshow-item">
        <div class="bg" data-bg="images/bg/38.jpg"></div>
      </div>
      <!--  slideshow-item end  -->
    </div>
    <div class="overlay"></div>
    <div class="list-single-header absolute-header fl-wrap">
      <div class="container">
        <div class="list-single-header-item">
          <div class="list-single-header-item-opt fl-wrap">
            <div class="list-single-header-cat fl-wrap">
              <a href="#">{{  $result->category->category  }}</a>
              <span> Ouvert <i class="fa fa-check"></i></span>
            </div>
          </div>
          <h2>{{  $result->name  }}</h2>

          <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
            <span>(8 reviews)</span>
          </div>
          <div class="list-post-counter single-list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-6">
              <div class="list-single-header-contacts fl-wrap">
                <ul>
                  <li><i class="fa fa-phone"></i><a href="#">{{  $result->category->category  }}</a></li>
                  <li><i class="fa fa-map-marker"></i><a href="#">{{  $result->complex->address->city  }},{{  $result->complex->address->country  }} </a></li>
                  <li><i class="fa fa-envelope-o"></i><a href="#">{{  $result->complex->email  }}
                      <blade domain.com</a> </li>
                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <div class="fl-wrap list-single-header-column">
                <span class="viewed-counter"><i class="fa fa-heart"></i>Favorie</span>
                <span class="viewed-counter"><i class="fa fa-share-alt"></i> Partager </span>
                <span class="viewed-counter"><i class="fa fa-location-arrow"></i>Y aller </span>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
