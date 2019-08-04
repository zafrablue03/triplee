<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="{{ asset('assets/img/fav.png') }}" />
    <!-- Title -->
    <title>{{ env('APP_NAME') }}</title>
    <!-- *************
        ************ Common Css Files *************
        ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/style.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- *************
        ************ Vendor Css Files *************
        ************ -->
    <!-- Datepickers css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/daterange/daterange.css') }}" />

    @stack('additionalCSS')

</head>