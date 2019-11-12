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
                    @if (checkAthleticRole(Auth::user()))
                        <li><a href="{{route('showMediaList')}}"><i class="fa fa-image"></i>Mes Photos
                                <span>{{count(Auth::user()->medias)}}</span> </a></li>
                        <li><a href="{{route('showReviewList')}}"><i class="fa fa-comments-o"></i>Mes Avis
                                <span>{{count(Auth::user()->reviews)}}</span> </a></li>
                    @endif



                </ul>
            </div>
            <!-- user-profile-menu end-->
            <!-- user-profile-menu-->
            @if (checkPrivateComplexRole(Auth::user())|| checkPublicComplexRole(Auth::user()))
                <div class="user-profile-menu">
                    <h3>Listings</h3>
                    <ul>

                        @if(!Auth::user()->complex)
                            @if(checkPrivateComplexRole(Auth::user()))
                                <li><a href="{{route('showUserAddComplex')}}"><i
                                                class="fa fa-plus-square-o"></i> Ajouter Votre complexe</a></li>
                            @endif
                        @else
                            @if(Auth::user()->complex->infrastructure)
                                <li><a href="{{route('showUserEditInfrastructure')}}"><i class="fa fa-gears"></i>Modifier infrastructure</a></li>
                            @else
                                <li><a href="{{route('showUserAddInfrastructure')}}"><i class="fa fa-gears"></i>Ajouter
                                        infrastructure</a></li>

                            @endif
                            <li><a href="{{route('showEditComplex')}}"><i class="fa fa-plus-square-o"></i> Modifier Complexe</a></li>
                                <li><a href="{{route('showUserListingPrix')}}"><i class="fa fa-plus-square-o"></i> Les prix </a></li>
                                <li><a href="{{route('showReviewList')}}"><i class="fa fa-comments-o"></i>Avis des sportifs
                                        {{--<span>{{count(Auth::user()->reviews)}}</span>--}} </a></li>
                                <li><a href="{{route('showUserListingReports')}}"><i class="fa fa-plus-square-o"></i> Signalement des problèmes </a></li>


                        @endif
                        @if(checkPrivateComplexRole(Auth::user())||(checkPublicComplexRole(Auth::user())&&(Auth::user()->complex)))
                            <li><a href="{{route('showUserListingTerrain')}}"><i class="fa fa-th-list"></i>
                                    Liste Terrains </a></li>
                        @endif

                    </ul>
                </div>

            @endif


            @if(checkClubRole(Auth::user()))

                <div class="user-profile-menu">
                    <h3>Gestion du Club</h3>
                    <ul>
                        @if(Auth::user()->club()->first() != null)
                            @if(Auth::user()->club()->first()->status->status == 0)
                                <li><a href="#" class="user-profile-act"><i class="fa fa-th-list"></i> Club en vérification </a></li>

                                @else(Auth::user()->club()->first()->status->status == 1)
                                <li><a href="{{route('showUserAddClub')}}"><i class="fa fa-th-list"></i> Modifier club </a></li>
                                <li><a href="{{route('showUserAddTeam')}}"><i class="fa fa-th-list"></i> Ajouter Equipe </a></li>
                            @endif
                        @else
                            <li><a href="{{route('showUserAddClub')}}"><i class="fa fa-th-list"></i> Ajouter club </a></li>

                        @endif

                    </ul>
                </div>
        @endif

        <!-- user-profile-menu end-->
            <a href="{{route('handleLogout')}}" class="log-out-btn">Déconnecter</a>
        </div>
    </div>
</div>
