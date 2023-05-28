<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="assets/images/favicon.svg"
      type="image/x-icon"
    />
    <title>{{ $title }}</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href={{ asset("css/assetslogin/bootstrap.min.css") }} />
    <link rel="stylesheet" href={{ asset("css/assetslogin/main.css") }} />
  </head>
  <body>

    @yield('container')

  </body>
</html>
