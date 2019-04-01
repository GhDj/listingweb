<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->
    <title>{{ config('app.name') }} - Administration - {{ $title }}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <script src="{{ asset('plugins') }}/jquery/jquery-v4.js"></script>

    <link rel="stylesheet" href="{{ asset('css/backOffice') }}/style.css">
    <link rel="stylesheet" href="{{ asset('plugins') }}/perfect-scrollbar/perfect-scrollbar.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select-chosen') }}/select-chosen.css" />
    <script src="{{ asset('plugins') }}/full-calendar/lib/moment.min.js"></script>
    <!-- sweet alert -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert')}}/sweetalert.css"/>
    <script src="{{asset('plugins/sweetalert')}}/sweetalert.min.js"></script>
</head>