<html lang="en">
@yield('head')
<body>
@include('sweet::alert')
<div class="app-admin-wrap">
    @yield('header')
    @yield('sidebar')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
    @yield('content')
    @include('backOffice.inc.footer')
    </div>
</div>
@include('backOffice.inc.scripts')
</body>
</html>