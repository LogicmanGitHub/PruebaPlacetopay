<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Prueba PSE</title>

    <!-- Bootstrap core CSS -->
    <link href= {{ asset('css/bootstrap.min.css') }} rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href= {{ asset('navbar.css') }} rel="stylesheet">

    <script src= {{ asset('js/jquery-3.2.1.min.js') }} ></script>
    <script src= {{ asset('js/bootstrap.min.js') }} ></script>
     
  </head>

  <body>
    @include('shared.navbar')
    @yield('content')
  <body>
  </html>
