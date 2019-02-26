<!-- header-->
<header class="main-header dark-header fs-header sticky">
            <div class="header-inner">
                <div class="logo-holder">
                    <a href="{{route('showHome')}}"><img src="{{asset('images/logo.png')}}" alt=""></a>
                </div>
                <div class="header-search vis-header-search">
                    <div class="header-search-input-item">
                        <input type="text" placeholder="mot clé" value=""/>
                    </div>
                    <div class="header-search-select-item">
                        <select data-placeholder="All Categories" class="chosen-select" >
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="header-search-button" onclick="window.location.href='listing.html'">Chercher</button>
                </div>
                <div class="show-search-button"><i class="fa fa-search"></i> <span>Search</span></div>
             @if (Auth::check() and Auth::user()->status == 2)
                  <div class="header-user-menu">
                      <div class="header-user-name">
                        @if (Auth::user()->picture != null)
                            <span><img src="{{asset(Auth::user()->picture)}}" alt=""></span>
                            @else
                              <span><img src="{{asset('img/unknown.png')}}" alt=""></span>
                        @endif

                          Salut , {{Auth::user()->first_name}} {{ Auth::user()->last_name}}
                      </div>
                      <ul>
                          <li><a href="{{route('showUserDashboard')}}">Profile</a></li>
                          @if (checkProfessionnelRole(Auth::user()))
                             <li><a href="{{route('showUserListingTerrain')}}"> Mes Terrains</a></li>
                             <li><a href="{{route('showUserListingClub')}}"> Mes Clubs</a></li>
                              <li><a href="{{route('showUserAddComplex')}}"> Ajouter complex</a></li>
                          @endif
                            <li><a href="{{route('handleLogout')}}">Déconnecter</a></li>
                      </ul>
                  </div>
                  @else
                    <div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>Connecter</div>

                @endif

                <!-- nav-button-wrap-->
                <div class="nav-button-wrap color-bg">
                    <div class="nav-button">
                        <span></span><span></span><span></span>
                    </div>
                </div>
                <!-- nav-button-wrap end-->
                <!--  navigation -->
                <div class="nav-holder main-menu">
                    <nav>
                        <ul>
                            <li>
                                <a href="{{route('showHome')}}" class="{{$activatedLink['home']}}">Accueil</a>
                            </li>

                            <li>
                                <a href="{{route('showFaq')}}" class="{{$activatedLink['faq']}}">Faq</a>
                            </li>

                            <li>
                                <a href="{{route('showContact')}}" class="{{$activatedLink['contact']}}">Contact</a>
                            </li>

                            <li>
                                <a href="#">Clubs <i class="fa fa-caret-down"></i></a>
                                <!--second level -->
                                <ul>
                                    <li><a href="listing.html">Exemple</a></li>
                                    <li>
                                        <a href="#">Exemple 2 <i class="fa fa-caret-down"></i></a>
                                        <!--third  level  -->
                                        <ul>
                                            <li><a href="listing-single.html">Exzmple 1</a></li>
                                        </ul>
                                        <!--third  level end-->
                                    </li>
                                </ul>
                                <!--second level end-->
                            </li>
                            <li>
                                <a href="blog.html">Terrains </a>
                            </li>
                            <li>
                                <a href="#">Complex <i class="fa fa-caret-down"></i></a>
                                <!--second level -->
                                <ul>
                                    <li><a href="about.html">Exmple</a></li>
                                </ul>
                                <!--second level end-->
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- navigation  end -->
            </div>
        </header>
<!--  header end -->
