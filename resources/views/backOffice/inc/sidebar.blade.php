<div class="side-content-wrap">
    <div class="sidebar-left open" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item @if($current == 'dashboard') active @endif">
                <a class="nav-item-hold" href="{{route('showAdminDashboard')}}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Tableau de bord</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item @if($current == 'Complexs')  active @endif" data-item="users">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-MaleFemale"></i>
                    <span class="nav-text">Utilisateurs</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item @if(($current == 'users') || ($current == 'terrainsList') || ($current == 'clubsList')) active @endif" data-item="infras">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Building"></i>
                    <span class="nav-text">Infrastructures</span>
                </a>
                <div class="triangle"></div>
            </li>

            {{--<li class="nav-item @if($current == 'Complexs') active @endif">
                <a class="nav-item-hold" href="{{route('showComplexsList')}}">
                    <i class="nav-icon  i-Building"></i>
                    <span class="nav-text">Complexs</span>
                </a>
                <div class="triangle"></div>
            </li>--}}

            {{--<li class="nav-item @if($current == 'terrainsList') active @endif">
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
            </li>--}}
            <li class="nav-item @if($current == 'complexRequest') active @endif" data-item="demandes">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Security-Check"></i>
                    <span class="nav-text">Demande d'ajout</span>
                </a>
                <div class="triangle"></div>
            </li>
            {{--<li class="nav-item @if($current == 'validation') active @endif" >
                <a class="nav-item-hold" href="">
                    <span class="nav-text">Blog</span>
                </a>
                <div class="triangle"></div>
            </li>--}}

            {{--<li class="nav-item @if($current == 'mediaRequest') active @endif" >
                <a class="nav-item-hold" href="{{route('showMediaRequest')}}">
                    <span class="nav-text">Medias</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item @if($current == 'categoryRequest') active @endif" >
                <a class="nav-item-hold" href="{{route('showCategoryRequest')}}">
                    <span class="nav-text">Catégories</span>
                </a>
                <div class="triangle"></div>
            </li>--}}
        </ul>
    </div>

    <div class="sidebar-left-secondary" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->

        <ul class="childNav" data-parent="users">
           <li class="nav-item">
                <a class="" href="{{route('showUsersList')}}">
                    <i class="nav-icon i-Boy"></i>
                    <span class="item-name">Sportifs</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="" href="{{route('showUsersList')}}">
                    <i class="nav-icon i-Boy"></i>
                    <span class="item-name">Responsables Complexes Publics</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="" href="{{route('showUsersList')}}">
                    <i class="nav-icon i-Boy"></i>
                    <span class="item-name">Responsables Complexes Privés</span>
                </a>
            </li>





        </ul>

        <ul class="childNav" data-parent="infras">
            <li class="nav-item">
                <a class="" href="{{route('showComplexsList')}}">
                    <i class="nav-icon i-Building"></i>
                    <span class="item-name">Complexes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="" href="{{route('showTerrainsList')}}">
                    <i class="nav-icon i-Window"></i>
                    <span class="item-name">Terrains</span>
                </a>
            </li>



            <li class="nav-item">
                <a class="" href="{{route('showClubsList')}}">
                    <i class="nav-icon i-Posterous"></i>
                    <span class="item-name">Club</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="" href="{{route('showReportsList')}}">
                    <i class="nav-icon i-Danger"></i>
                    <span class="item-name">Signalements des problèmes</span>
                </a>
            </li>





        </ul>

        <ul class="childNav" data-parent="demandes">
            <li class="nav-item">
                <a class="" href="{{route('showComplexRequest')}}">
                    <i class="nav-icon i-Building"></i>
                    <span class="item-name">Complexes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="" href="{{route('showClubRequest')}}">
                    <i class="nav-icon i-Posterous"></i>
                    <span class="item-name">Clubs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="" href="{{route('showCategoryRequest')}}">
                    <i class="nav-icon i-Window"></i>
                    <span class="item-name">Catégories</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="" href="{{route('showMediaRequest')}}">
                    <i class="nav-icon i-Posterous"></i>
                    <span class="item-name">Médias</span>
                </a>
            </li>





        </ul>


    </div>
    <div class="sidebar-overlay"></div>
</div>