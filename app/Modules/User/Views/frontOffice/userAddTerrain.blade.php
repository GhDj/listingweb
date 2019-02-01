@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection



@section('header')

  @include('frontOffice.inc.header')

@endsection

@section('content')
  <!-- wrapper -->
<div id="wrapper">
    <!--content -->
    <div class="content">
        <!--section -->
        <section id="sec1">
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>Ajouter Un terrain<</h2>
                        <div class="breadcrumbs"><a href="#">Accueil</a><a href="#">Profile</a><span>Ajouter Un terrain</span></div>
                    </div>
                    <div class="row">
                      @include('User::frontOffice.inc.asideProfile')
                        <div class="col-md-9">
                            <!-- profile-edit-container-->
                            <div class="profile-edit-container add-list-container">
                                <div class="profile-edit-header fl-wrap">
                                    <h4>Informations</h4>
                                </div>
                                <div class="custom-form">
                                    <label>Nom de Terrain <i class="fa fa-briefcase"></i></label>
                                    <input type="text" placeholder="Name of your business" value=""/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Type de Sport</label>
                                            <select data-placeholder="All Categories" class="chosen-select" >
                                                <option>All Categories</option>
                                                <option>Shops</option>
                                                <option>Hotels</option>
                                                <option>Restaurants</option>
                                                <option>Fitness</option>
                                                <option>Events</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- profile-edit-container end-->
                            <!-- profile-edit-container-->
                            <div class="profile-edit-container add-list-container">
                                <div class="profile-edit-header fl-wrap">
                                      <h4>Emplacement /  Contacts</h4>
                                </div>
                                <div class="custom-form">
                                    <label>Addresse<i class="fa fa-map-marker"></i></label>
                                    <input type="text" placeholder="Address of your business" value=""/>
                                    <div class="row">
                                      <div class="col-md-6">
                                            <label>Latitude:<i class="fa fa-map-marker"></i></label>
                                            <input type="text" id="lat" placeholder="" value=""/>
                                        </div>
                                      <div class="col-md-6">
                                            <label>Longitude:<i class="fa fa-map-marker"></i></label>
                                            <input type="text" id="long" placeholder="" value=""/>
                                        </div>
                                    </div>
                                    <div class="map-container">
                                        <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
                                    </div>
                                    <label>Ville</label>
                                    <select data-placeholder="Location" class="chosen-select" >
                                        <option>All Locations</option>
                                        <option>Bronx</option>
                                        <option>Brooklyn</option>
                                        <option>Manhattan</option>
                                        <option>Queens</option>
                                        <option>Staten Island</option>
                                    </select>
                                    <label>Téléphone<i class="fa fa-phone"></i></label>
                                    <input type="text" placeholder="Your Phone" value=""/>
                                    <label>Email<i class="fa fa-envelope-o"></i></label>
                                    <input type="text" placeholder="Your Email" value=""/>
                                    <label>Site Weeb<i class="fa fa-globe"></i></label>
                                    <input type="text" placeholder="Your Website" value=""/>
                                </div>
                            </div>
                            <!-- profile-edit-container end-->
                            <!-- profile-edit-container-->
                            <div class="profile-edit-container add-list-container">
                                <div class="profile-edit-header fl-wrap">
                                    <h4>Ajouter des photos</h4>
                                </div>
                                <div class="custom-form">
                                    <div class="row">
                                        <!--col -->
                                        <div class="col-md-4">
                                            <div class="add-list-media-header">
                                                <label class="radio inline">
                                                <input type="radio" name="gender"  checked>
                                                <span>Background image</span>
                                                </label>
                                            </div>
                                            <div class="add-list-media-wrap">
                                                <form   class="fuzone">
                                                    <div class="fu-text">
                                                        <span><i class="fa fa-picture-o"></i> Click here or drop files to upload</span>
                                                    </div>
                                                    <input type="file" class="upload">
                                                </form>
                                            </div>
                                        </div>
                                        <!--col end-->
                                        <!--col -->
                                        <div class="col-md-4">
                                            <div class="add-list-media-header">
                                                <label class="radio inline">
                                                <input type="radio" name="gender">
                                                <span>Carousel</span>
                                                </label>
                                            </div>
                                            <div class="add-list-media-wrap">
                                                <form   class="fuzone">
                                                    <div class="fu-text">
                                                        <span><i class="fa fa-picture-o"></i> Cliquez ici ou déposez des fichiers à télécharger</span>
                                                    </div>
                                                    <input type="file" class="upload">
                                                </form>
                                            </div>
                                        </div>
                                        <!--col end-->
                                        <!--col -->
                                        <div class="col-md-4">
                                            <div class="add-list-media-header">
                                                <label class="radio inline">
                                                <input type="radio" name="gender">
                                                <span>Video</span>
                                                </label>
                                            </div>
                                            <div class="add-list-media-wrap">
                                                <label>Youtube  <i class="fa fa-youtube"></i></label>
                                                <input type="text" placeholder="https://www.youtube.com/" value=""/>
                                                <label>Vimeo <i class="fa fa-vimeo"></i></label>
                                                <input type="text" placeholder="https://vimeo.com/" value=""/>
                                                <div class="change-photo-btn">
                                                    <div class="photoUpload">
                                                        <span><i class="fa fa-upload"></i> Download Video</span>
                                                        <input type="file" class="upload">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--col end-->
                                    </div>
                                </div>
                            </div>
                            <!-- profile-edit-container end-->
                            <!-- profile-edit-container-->
                          

                        </div>
                    </div>
                </div>
                <!--profile-edit-wrap end -->
            </div>
            <!--container end -->
        </section>
        <!-- section end -->
            <div class="limit-box fl-wrap"></div>
    </div>
</div>
<!-- wrapper end -->

@endsection
@section('footer')

  @include('frontOffice.inc.footer')

@endsection
