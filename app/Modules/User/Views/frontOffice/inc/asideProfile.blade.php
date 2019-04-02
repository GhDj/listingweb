<div class="col-md-3">
    <div class="fixed-bar fl-wrap">
        <div class="user-profile-menu-wrap fl-wrap">
            <!-- user-profile-menu-->
            <div class="user-profile-menu">

                <ul>
                    <li><a href="{{route('showUserDashboard')}}"><i class="fa fa-gears"></i>Mon profil</a></li>
                    @if (checkAthleticRole(Auth::user()))
                        <li><a href="{{route('showFavoriteList')}}"><i class="fa fa-gears"></i>Mes favoris
                                <span>{{count(Auth::user()->wishlists)}}</span> </a></li>
                    @endif
                    <li><a href="{{route('showUserProfile')}}"><i class="fa fa-user-o"></i>Mes infos</a></li>
                    <li><a href="{{route('showUserPassword')}}"><i class="fa fa-unlock-alt"></i>Changer Votre Mot de
                            Passe</a></li>
                </ul>
            </div>
            <!-- user-profile-menu end-->
            <!-- user-profile-menu-->
            @if (checkPrivateComplexRole(Auth::user()))
                <div class="user-profile-menu">
                    <h3>Listings</h3>
                    <ul>
                        <li><a href="{{route('showUserListingTerrain')}}"><i class="fa fa-th-list"></i> Consulté Votre
                                List Terrain </a></li>
                        <li><a href="{{route('showUserAddComplex')}}" class="user-profile-act"><i
                                        class="fa fa-plus-square-o"></i> Ajouter Des Complexs</a></li>
                        <li><a href="{{route('showUserAddTerrain')}}" class="user-profile-act"><i
                                        class="fa fa-plus-square-o"></i> Ajouter Des Terrains</a></li>
                    </ul>
                </div>

            @endif

            @if(checkPublicComplexRole(Auth::user()) && (checkUserHasPublicComplex(Auth::user())))

                <div class="user-profile-menu">
                    <h3>Listings</h3>
                    <ul>
                        <li><a href="#"><i class="fa fa-th-list"></i> Modifier complexe </a></li>
                        <li><a href="#"><i class="fa fa-th-list"></i> Modifier terrain </a></li>
                    </ul>
                </div>

            @endif

            @if(checkClubRole(Auth::user()))

                <div class="user-profile-menu">
                    <h3>Listings</h3>
                    <ul>
                        <li><a href="#"><i class="fa fa-th-list"></i> Modifier club </a></li>
                        <li><a href="#"><i class="fa fa-th-list"></i> Ajouter Equipe </a></li>
                    </ul>
                </div>
        @endif

        <!-- user-profile-menu end-->
            <a href="{{route('handleLogout')}}" class="log-out-btn">Déconnecter</a>
        </div>
    </div>
</div>