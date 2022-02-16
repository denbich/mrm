<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/logos/icon.png">
  <link rel="icon" type="image/png" href="/assets/img/logos/icon.png">
  <title> @yield('title') | MRM Rybnik </title>
  <!--     Fonts and icons     -->
  <style>

      @font-face {
    font-family: 'Favela';
    font-style: normal;
    font-weight: 100;
    font-stretch: 100%;
    src: url({{ url('/assets/fonts/Favela-Thin.woff2') }}) format('woff2');
}
      @font-face {
    font-family: 'Favela';
    font-style: normal;
    font-weight: 200;
    font-stretch: 100%;
    src: url({{ url('/assets/fonts/Favela-ExtraLight.woff2') }}) format('woff2');
}
      @font-face {
    font-family: 'Favela';
    font-style: normal;
    font-weight: 300;
    font-stretch: 100%;
    src: url({{ url('/assets/fonts/Favela-Light.woff2') }}) format('woff2');
}
      @font-face {
    font-family: 'Favela';
    font-style: normal;
    font-weight: 400;
    font-stretch: 100%;
    src: url({{ url('/assets/fonts/Favela-Regular.woff2') }}) format('woff2');
}
@font-face {
    font-family: 'Favela';
    font-style: normal;
    font-weight: 500;
    font-stretch: 100%;
    src: url({{ url('/assets/fonts/Favela-Medium.woff2') }}) format('woff2');
}
@font-face {
    font-family: 'Favela';
    font-style: normal;
    font-weight: 600;
    font-stretch: 100%;
    src: url({{ url('/assets/fonts/Favela-SemiBold.woff2') }}) format('woff2');
}
@font-face {
    font-family: 'Favela';
    font-style: normal;
    font-weight: 700;
    font-stretch: 100%;
    src: url({{ url('/assets/fonts/Favela-Bold.woff2') }}) format('woff2');
}
@font-face {
    font-family: 'Favela';
    font-style: normal;
    font-weight: 900;
    font-stretch: 100%;
    src: url({{ url('/assets/fonts/Favela-Black.woff2') }}) format('woff2');
}
  </style>
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.0.1" rel="stylesheet" />
</head>

<body class="">

    @yield('content')

  <!--   Core JS Files   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="/assets/js/argon-dashboard.min.js?v=2.0.0"></script>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

  @yield('script')
</body>

</html>
