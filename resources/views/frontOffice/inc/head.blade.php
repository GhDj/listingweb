<head>
          <!--=============== basic  ===============-->
          <meta charset="UTF-8">
          {{-- <title>Olympiade</title> --}}
          <title>{{ $title or '' }}</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
          <meta name="robots" content="index, follow"/>
          <meta name="keywords" content=""/>
          <meta name="description" content=""/>
          <!--=============== css  ===============-->


          <link type="text/css" rel="stylesheet" href="{{asset('css/frontOffice/css/widget.css')}}">
          <link type="text/css" rel="stylesheet" href="{{asset('css/frontOffice/css/reset.css')}}">
          <link type="text/css" rel="stylesheet" href="{{asset('css/frontOffice/css/plugins.css')}}">
          <link type="text/css" rel="stylesheet" href="{{asset('css/frontOffice/css/style.css')}}">
          <link type="text/css" rel="stylesheet" href="{{asset('css/frontOffice/css/color.css')}}">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

          {{-- <link rel="stylesheet" type="text/css" href="{{ asset ('plugins/toastr/toastr.css') }}"> --}}

          <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


          <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/sweetalert/sweetalert.css">
          <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/sweetalert/swal-forms.css">

      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

          <!--=============== favicons ===============-->
          <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <style>
        a.act-link
        {
            color:#4DB7FE!important;
        }
    </style>
</head>
