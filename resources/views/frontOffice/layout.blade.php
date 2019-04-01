<html>
@yield('head')
@yield('css')
<body>
@include('sweet::alert')
@include('frontOffice.inc.loader')
<div id="main">

    @yield('header')
    @yield('sidebar')
    @yield('content')
    @yield('footer')
</div>
@include('frontOffice.inc.scripts')
@include('frontOffice.inc.modals.registerUser')
@yield('scripts')
</body>
</html>
