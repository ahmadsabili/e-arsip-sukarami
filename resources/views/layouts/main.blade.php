<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{ url('assets/img/logo/logo-palembang.png') }}" rel="icon">
  <title>E-Arsip {{ isset($title) ? ' | '.$title : '' }}</title>
  @include('layouts.inc.ext-css')
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('layouts.inc.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('layouts.inc.navbar')
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $header }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item {{ isset($subTitle) ? '' : 'active' }}" {{ isset($subTitle) ? '' : "aria-current='page'" }}>{{ $header }}</li>
                @if (isset($subTitle))
                <li class="breadcrumb-item active" aria-current="page">{{ $subTitle }}</li>
                @endif
            </ol>
        </div>
          @yield('content')
          <!--Row-->
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      @include('layouts.inc.footer')
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  @include('layouts.inc.ext-js')
  @yield('js')
</body>

</html>