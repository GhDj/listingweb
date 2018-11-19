<!DOCTYPE html>
<html>
@yield('head')
<body class="online-course-2x skin-green">
@include('sweet::alert')
<div class="wrapper">
    @yield('header')
    @yield('sidebar')
    @yield('content')
    @yield('footer')
</div>
@include('backOffice.inc.scripts')
</body>
</html>
