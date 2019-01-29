<div class="col-md-3">
    <div class="fixed-bar fl-wrap">
        <div class="user-profile-menu-wrap fl-wrap">
            <!-- user-profile-menu-->
            <div class="user-profile-menu">
                <h3>Main</h3>
                <ul>
                  <li><a href="{{route('showUserDashboard')}}"><i class="fa fa-gears"></i>Dashboard</a></li>
                    <li><a href="{{route('showUserProfile')}}"><i class="fa fa-user-o"></i> Modifié Votre Profile</a></li>
                    <li><a href="{{route('showUserMessage')}}"><i class="fa fa-envelope-o"></i> Cobsulté Votre Message <span>3</span></a></li>
                    <li><a href="{{route('showUserMessage')}}"><i class="fa fa-unlock-alt"></i>Changer Votre Mot de Passe</a></li>
                </ul>
            </div>
            <!-- user-profile-menu end-->
            <!-- user-profile-menu-->
            <div class="user-profile-menu">
                <h3>Listings</h3>
                <ul>
                    <li><a href="dashboard-listing-table.html"><i class="fa fa-th-list"></i> Consulté Votre List </a></li>
                    <li><a href="dashboard-review.html"><i class="fa fa-comments-o"></i>Les Avis </a></li>
                    <li><a href="dashboard-add-listing.html" class="user-profile-act"><i class="fa fa-plus-square-o"></i> Ajouter Des Terrains</a></li>
                </ul>
            </div>
            <!-- user-profile-menu end-->
            <a href="#" class="log-out-btn">Log Out</a>
        </div>
    </div>
</div>
