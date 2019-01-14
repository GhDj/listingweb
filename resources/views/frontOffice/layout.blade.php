<!DOCTYPE html>
<html>
@yield('head')
<body>
@include('frontOffice.inc.loader')
<div id="main">
    @yield('header')
    @yield('sidebar')
    @yield('content')
    @yield('footer')
</div>
@include('frontOffice.inc.scripts')
@yield('scripts')
</body>
</html>
