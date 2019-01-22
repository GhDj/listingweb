<style media="screen">
  .custom-form .custom-select{
    background-color: DodgerBlue;
    color: white;
    width: 100%;
    margin-bottom: 15px;

  }

  .custom-select {
    -webkit-tap-highlight-color: transparent;
    border-radius: 5px;
    border: solid 1px #e8e8e8;
    box-sizing: border-box;
    clear: both;
    cursor: pointer;
    display: block;
    float: left;
    font-family: inherit;
    font-size: 13px;
    font-weight: normal;
    font-weight: 400;
    height: 48px;
    line-height: 48px;
    outline: none;
    padding-left: 18px;
    padding-right: 30px;
    position: relative;
    text-align: left !important;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    white-space: nowrap;
    width: auto;
  }

  .main-register-form input {
    margin-bottom: 0;
  }

  .invalid-feedback strong{
      color: red;
  }

  .form-group{
    margin-bottom:20px;
  }
</style>

<!--register form -->
<div class="main-register-wrap modal">
  <div class="main-overlay"></div>
  <div class="main-register-holder">
    <div class="main-register fl-wrap">
      <div class="close-reg"><i class="fa fa-times"></i></div>
      <h3>Sign In <span>olym<strong>piade</strong> Sports</span></h3>
      <div class="soc-log fl-wrap">
        <p>Identifier avec les reseaux Socials.</p>
        <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Identifier Avec Facebook</a>
        <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Identifier Avec Twitter</a>
      </div>
      <div class="log-separator fl-wrap"><span>or</span></div>
      <div id="tabs-container">
        <ul class="tabs-menu">
          <li class="current"><a href="#tab-1">Login</a></li>
          <li><a href="#tab-2">Inscription</a></li>
        </ul>
        <div class="tab">
          <div id="tab-1" class="tab-content">
            <div class="custom-form">
              <form method="post" name="registerform" action = {{ route('handleUserLogin') }}>
                  {{ csrf_field() }}
                <div class="form-group row">
                      <label for="mail" > Email * </label>
                          <div class="col-md-12">
                              <input id="mail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  onClick="this.select()" required>
                            @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                </div>

                <div class="form-group row">
                        <label for="pass" > Mot De passe * </label>
                          <div class="col-md-12">
                              <input id="pass" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"   onClick="this.select()" required>
                            @if ($errors->has('password'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                </div>
                <button type="submit" class="log-submit-btn"><span>Identifier</span></button>
                <div class="clearfix"></div>
                <div class="filter-tags">
                  <input id="check-a" type="checkbox" name="check">
                  <label for="check-a">Sevenir De Moi</label>
                </div>
              </form>
              <div class="lost_password">
                <a href="#">Vous avez Oublié Votre Mot De Passe?</a>
              </div>
            </div>
          </div>
          <div class="tab">
            <div id="tab-2" class="tab-content">
              <div class="custom-form">
                <form method="post" name="registerform" class="main-register-form" id="main-register-form2" action = "{{ route('handleUserRegister') }}">
                    {{ csrf_field() }}
                  <label>Inscription Comme * </label>

                        <div class="row">
                          <!--col -->
                          <div class="col-md-4">
                            <div class="add-list-media-header">
                              <label class="radio inline">
                                <input type="radio" name="role" value="2" checked>
                                <span>Propriétaire</span>
                              </label>
                            </div>
                          </div>
                          <!--col end-->
                          <!--col -->
                          <div class="col-md-4">
                            <div class="add-list-media-header">
                              <label class="radio inline">
                                <input type="radio" name="role" value="4">
                                <span>Internaute</span>
                              </label>
                            </div>
                          </div>
                          <!--col end-->

                        </div>
                <div class="form-group row">
                          <label for="lastName" > Nom * </label>
                      <div class="col-md-12">
                              <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}"   onClick="this.select()" required>
                            @if ($errors->has('lastName'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('lastName') }}</strong>
                                  </span>
                              @endif
                          </div>
                </div>

                <div class="form-group row">
                          <label for="firstName" > Prénom * </label>
                      <div class="col-md-12">
                              <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}"   onClick="this.select()" required>
                            @if ($errors->has('firstName'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('firstName') }}</strong>
                                  </span>
                              @endif
                          </div>
                </div>

                <div class="form-group row">
                          <label for="phone" > Téléphone * </label>
                      <div class="col-md-12">
                              <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="590 xx xx xx"   onClick="this.select()" required>
                            @if ($errors->has('phone'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('phone') }}</strong>
                                  </span>
                              @endif
                          </div>
                </div>



                  <label>Choisir Votre Sexe  *</label>
                  <div >
                        <select data-placeholder="Choisir Votre sexe" class="custom-select" name="gender" id="gender">
                            <option value="1">Homme</option>
                            <option value="2">Femme</option>
                            <option value="-1">Autre</option>

                      </select>
                  </div>

                  <div class="form-group row">
                            <label for="lastName" > Email * </label>
                        <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"   onClick="this.select()" required>
                              @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                  </div>

                  <div class="form-group row">
                            <label for="password" > Mot de passe * </label>
                        <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  onClick="this.select()" required>
                              @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                  </div>

                  <div class="form-group row">
                          <label for="password_confirm">Veuillez Confirmez Votre Mode De Passe</label>
                            <div class="col-md-12">
                          <input id="password_confirm" type="password" name="password_confirmation"  onClick="this.select()" required>
                        </div>
                  </div>

                  <button type="submit" class="log-submit-btn"><span>Register</span></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--register form end -->
