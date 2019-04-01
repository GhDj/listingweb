<div class="side-content-wrap">
    <div class="sidebar-left open" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item @if($current == 'dashboard') active @endif">
                <a class="nav-item-hold" href="{{route('showAdminDashboard')}}">
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item @if($current == 'users') active @endif">
                <a class="nav-item-hold" href="{{route('showUsersList')}}">
                    <span class="nav-text">Utilisateurs</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item @if($current == 'addComplex') active @endif">
                <a class="nav-item-hold" href="{{route('showAddComplexAdmin')}}">
                    <span class="nav-text">Complexs</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item @if($current == 'terrainsList') active @endif">
                <a class="nav-item-hold" href="{{route('showTerrainsList')}}">
                    <span class="nav-text">Terrains</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item @if($current == 'clubsList') active @endif">
                <a class="nav-item-hold" href="{{route('showClubsList')}}">
                    <span class="nav-text">Club</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item @if($current == 'validation') active @endif" >
                <a class="nav-item-hold" href="">
                    <span class="nav-text">Blog</span>
                </a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>

    <div class="sidebar-left-secondary" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->



    </div>
    <div class="sidebar-overlay"></div>
</div>