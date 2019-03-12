<div class="col-md-3">
    <div class="fixed-bar fl-wrap">
        <div class="user-profile-menu-wrap fl-wrap">
            <!-- user-profile-menu-->
            <div class="user-profile-menu">
                <h3>Main</h3>
                <ul>
                  <li><a href="{{route('showUserDashboard')}}"><i class="fa fa-gears"></i>Profile</a></li>
                    @if (!checkProfessionnelRole(Auth::user()))
                    <li> <a href="{{route('showFavoriteList')}}"><i class="fa fa-gears"></i>Favorite list</a></li>
                    @endif
                    <li><a href="{{route('showUserProfile')}}"><i class="fa fa-user-o"></i> Modifié Votre Profile</a></li>
                    <li><a href="{{route('showUserPassword')}}"><i class="fa fa-unlock-alt"></i>Changer Votre Mot de Passe</a></li>
                </ul>
            </div>
            <!-- user-profile-menu end-->
            <!-- user-profile-menu-->
            @if (checkProfessionnelRole(Auth::user()))

              <div class="user-profile-menu">
                  <h3>Listings</h3>
                  <ul>
                      <li><a href="{{route('showUserListingTerrain')}}"><i class="fa fa-th-list"></i> Consulté Votre List Terrain </a></li>
                      <li><a href="{{route('showUserListingClub')}}"><i class="fa fa-th-list"></i> Consulté Votre List Club </a></li>
                      <li><a href="#"><i class="fa fa-comments-o"></i>Les Avis </a></li>
                      <li><a href="{{route('showUserAddComplex')}}" class="user-profile-act"><i class="fa fa-plus-square-o"></i> Ajouter Des Complexes</a></li>
                      <li><a href="{{route('showUserAddTerrain')}}" class="user-profile-act"><i class="fa fa-plus-square-o"></i> Ajouter Des Terrains</a></li>
                      <li><a href="{{route('showUserAddEquipement')}}" class="user-profile-act"><i class="fa fa-plus-square-o"></i> Ajouter Des Equipments</a></li>
                      <li><a href="{{route('showUserAddClub')}}" class="user-profile-act"><i class="fa fa-plus-square-o"></i> Ajouter Des Clubs</a></li>
                      <li><a href="{{route('showUserAddTeam')}}" class="user-profile-act"><i class="fa fa-plus-square-o"></i> Ajouter Des Equipe</a></li>

                  </ul>
              </div>

            @endif

            <!-- user-profile-menu end-->
            <a href="{{route('handleLogout')}}" class="log-out-btn">Déconnecter</a>
        </div>
    </div>
</div>
