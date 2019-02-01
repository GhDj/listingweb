@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection



@section('header')

  @include('frontOffice.inc.header')

@endsection
@section('content')

  <style media="screen">
  .add-list-media-header {
  margin-bottom: 15px;
  padding: 15px 20px 3px;
  margin-left: 35px;
  width: auto;
}

.custom-form input[type="text"],.custom-form input[type=email]{

  padding: 15px 20px 15px 20px;

}

  </style>

  <!-- wrapper -->
      <div id="wrapper">
          <!--content -->
          <div class="content">
              <!--section -->
              <section>
                  <!-- container -->
                  <div class="container">
                      <!-- profile-edit-wrap -->
                      <div class="profile-edit-wrap">
                          <div class="profile-edit-page-header">
                              <h2>Edit profile</h2>
                              <div class="breadcrumbs"><a href="#">Accueil</a><a href="#">Profile</a><span>Votre Profile</span></div>
                          </div>
                          <div class="row">
                            @include('User::frontOffice.inc.asideProfile')
                              <div class="col-md-7">
                                  <!-- profile-edit-container-->
                                  <div class="profile-edit-container">
                                      <div class="profile-edit-header fl-wrap">
                                          <h4>My Account</h4>
                                      </div>
                                      <div class="custom-form">
                                        <form action="{{route('handleUpdateUserProfile')}}"  method="post">

                                          {{ csrf_field() }}

                                          <div class="form-group row">
                                            <label for ="first_name">Prénom * </label>
                                            <div class="col-md-12">
                                              <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{Auth::user()->first_name}}" />
                                              @if ($errors->has('first_name'))
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                              </span>
                                              @endif
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for ="last_name">Nom * </label>
                                            <div class="col-md-12">
                                              <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{Auth::user()->last_name}}" />
                                              @if ($errors->has('last_name'))
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                              </span>
                                              @endif
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for ="mail">Email Address * </label>
                                            <div class="col-md-12">
                                              <input id="mail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{Auth::user()->email}}" />
                                              @if ($errors->has('email'))
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                              @endif
                                            </div>
                                          </div>

                                          <div class="form-group row">
                                            <label for ="phone">Téléphone * </label>
                                            <div class="col-md-12">
                                              <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{Auth::user()->phone}}" />
                                              @if ($errors->has('phone'))
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                              </span>
                                              @endif
                                            </div>
                                          </div>

                                          <div class="form-group row">
                                            <label for ="ad">Adresse * </label>
                                            <div class="col-md-12">
                                              <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{Auth::user()->address->address}}" />
                                              @if ($errors->has('address'))
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                              </span>
                                              @endif
                                            </div>
                                          </div>

                                          <label> Genre </label>
                                              <div style="margin-left:70px;">
                                                <label class="radio">
                                                <input type="radio" name="gender" value="1"

                                                      @if (Auth::user()->gender == 1)
                                                        checked
                                                      @endif

                                                > <span>Homme</span> </label>
                                                <label class="radio">
                                                <input type="radio" name="gender"  value="2"

                                                @if (Auth::user()->gender == 2)
                                                  checked
                                                @endif

                                                > <span>Femme</span> </label>
                                              </div>
                                                <button class="btn  big-btn  color-bg flat-btn">Enregistrer<i class="fa fa-angle-right"></i></button>
                                        </form>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="edit-profile-photo fl-wrap">
                                    @if (Auth::user()->picture != null)
                                        <img src="{{asset(Auth::user()->picture)}}" class="respimg" alt="">
                                        @else
                                          <img src="{{asset('img/unknown.png')}}" class="respimg" alt="">
                                    @endif
                                      <div class="change-photo-btn">

                                        <form action="{{route('handleUpdateUserProfilePicture')}}" enctype="multipart/form-data" id = "avatarForm" method="post">
                                          {{ csrf_field() }}
                                          <div class="photoUpload" style="width:180px">
                                              <span><i class="fa fa-upload"></i> Upload Photo</span>
                                              <input type="file" name="avatar" class="upload" id= "avatar">
                                          </div>
                                          @if ($errors->has('avatar'))
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                          </span>
                                          @endif
                                        </form>

                                      </div>
                                  </div>
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

@section('scripts')
  <script type="text/javascript">
document.getElementById("avatar").onchange = function() {
 document.getElementById("avatarForm").submit();
};
  </script>

@endsection
