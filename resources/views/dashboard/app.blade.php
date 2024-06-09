<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}} " rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}} " rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}} " rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}} " rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  @yield('styles')
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn"></i>
      <div style="width: 20px"></div>
      {{-- <a href="{{route('homepage')}}" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a> --}}
    </div><!-- End Logo -->




  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      {{-- {{dd(Route::currentRouteName())}} --}}
      <li class="nav-item ">
        <a class="nav-link {{Route::currentRouteName() == 'homepage' ? '' : 'collapsed'}}" href="{{route('homepage')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item ">
        <a class="nav-link {{Route::currentRouteName() == 'dashboard.products' ? '' : 'collapsed'}}"
          href="{{route('dashboard.products')}}">
          <i class="bi bi-minecart-loaded"></i>
          <span>Products Master</span>
        </a>
      </li><!-- End Blank Page Nav -->
      <li class="nav-item ">
        <a class="nav-link {{Route::currentRouteName() == 'dashboard.sales' ? '' : 'collapsed'}}"
          href="{{route('dashboard.sales')}}">
          <i class="bi bi-layout-text-sidebar"></i>
          <span>Sales Master</span>
        </a>
      </li><!-- End Blank Page Nav -->

      <li class="nav-item ">
        <a class="nav-link {{(Route::currentRouteName() == 'dashboard.tests' || Route::currentRouteName() == 'tests.generate') ? '' : 'collapsed'}}"
          href="{{route('dashboard.tests')}}">
          <i class="bi bi-file-earmark"></i>
          <span>Apriori Algorithm</span>
        </a>
      </li><!-- End Blank Page Nav -->
      <hr>
      <li class="nav-item ">
        <a class="nav-link {{(Route::currentRouteName() == 'dashboard.cancer') ? '' : 'collapsed'}}"
          href="{{route('dashboard.cancer')}}">
          <i class="bi bi-virus"></i>
          <span>Oral Cancer Data</span>
        </a>
      </li><!-- End Blank Page Nav -->
      <li class="nav-item ">
        <a class="nav-link {{(Route::currentRouteName() == 'dashboard.knn.test') ? '' : 'collapsed'}}"
          href="{{route('dashboard.knn.test')}}">
          <i class="bi bi-file-earmark"></i>
          <span>K-NN Algorithm</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  {{-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Tishreen University</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer --> --}}

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>