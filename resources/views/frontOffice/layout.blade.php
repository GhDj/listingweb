<!DOCTYPE html>
<html>
@yield('head')
@yield('css')
<body>
@include('frontOffice.inc.loader')
<div id="main">
    @include('sweet::alert')
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
