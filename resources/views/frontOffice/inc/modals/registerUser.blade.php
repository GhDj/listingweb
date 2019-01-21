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
                <label>Email * </label>
                <input name="email" type="text" onClick="this.select()" value="">
                <label>Mot De passe * </label>
                <input name="password" type="password" onClick="this.select()" value="">
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
                                <input type="radio" name="type" value="2" checked>
                                <span>Propriétaire</span>
                              </label>
                            </div>
                          </div>
                          <!--col end-->
                          <!--col -->
                          <div class="col-md-4">
                            <div class="add-list-media-header">
                              <label class="radio inline">
                                <input type="radio" name="type" value="4">
                                <span>Internaute</span>
                              </label>
                            </div>
                          </div>
                          <!--col end-->

                        </div>


                  <label>Nom * </label>
                  <input name="last_name" type="text" onClick="this.select()" value="">
                  <label>Prénom *</label>
                  <input name="first_name" type="text" onClick="this.select()" value="">
                  <label>Téléphone  *</label>
                  <input name="phone" type="text" onClick="this.select()" value="" id ="phone" placeholder="590 xx xx xx">
                  <label>Téléphone  *</label>
                  <div >
                        <select data-placeholder="Choisir Votre sexe" class="custom-select" name="gender" id="gender">
                            <option value="1">Homme</option>
                            <option value="2">Femme</option>
                            <option value="-1">Autre</option>

                      </select>
                  </div>
                  <label>Email  *</label>
                  <input name="email" type="text" onClick="this.select()" value="">
                  <label>Mot De Passe *</label>
                  <input name="password" type="password" onClick="this.select()" value="">
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
