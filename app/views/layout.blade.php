<!DOCTYPE html>
<html>
  <head>
    <title>{{ $title or "Dalal Street" }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/bootflat.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    @yield('stylesheet')
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @yield('before-body')
    @yield('body')
    @yield('after-body')
    <div class='notifications top-right'></div>
    <div class='notifications bottom-right'></div>
    <div class='notifications top-left'></div>
    <div class='notifications bottom-left'></div>
    <div id="raw"></div>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/notify.js"></script>
    @yield('javascript')
  </body>
</html>