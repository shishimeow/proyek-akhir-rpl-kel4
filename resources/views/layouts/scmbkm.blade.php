<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>MBKM</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href={{ asset("vendor/assets/fonts/boxicons.css") }} />

    <!-- Core CSS -->
    <link rel="stylesheet" href={{ asset("vendor/assets/css/core.css") }} class="template-customizer-core-css" />
    <link rel="stylesheet" href={{ asset("vendor/assets/css/theme-default.css") }} class="template-customizer-theme-css" />
    <link rel="stylesheet" href={{ asset("css/assets/demo.css") }} />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href={{ asset("vendor/assets/libs/perfect-scrollbar/perfect-scrollbar.css") }} />

    <link rel="stylesheet" href={{ asset("vendor/assets/libs/apex-charts/apex-charts.css") }} />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src={{ asset("vendor/assets/js/helpers.js") }}></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src={{ asset("js/assets/config.js") }}></script>
  </head>

  <body>

    @yield('container')

  </body>
</html>
