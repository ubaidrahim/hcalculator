<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="@yield('meta-description')">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/app-icon-76X76.png')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="google-site-verification" content="B7l7FjAV25BtQLlp3mku0D3sZ9MnR2DLMIgnLeuPU-Q" />
  <link rel="icon" type="image/png" href="{{asset('assets/img/favicon-32x32.png')}}">
  <title>
    @yield('title') - H Calculator
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script src="{{asset('assets/js/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-5Q647LVHYB"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4247094152424431"
     crossorigin="anonymous"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-5Q647LVHYB');
  </script>
  @yield('headsection')
</head>

<body class="forms-sections">
  <!-- Navbar Light -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container-fluid flex-column">
      <a class="navbar-brand m-0" href="{{url('/')}}" data-placement="bottom">
        <img src="{{ asset('assets/img/newlogo1.png') }}" width="380" class="d-inline-block align-top" alt="">
        {{-- <strong>H</strong> Calculator --}}
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 mt-3 ps-lg-5" id="navigation">
        <ul class="navbar-nav navbar-nav-hover mx-auto align-items-center">
            <li class="nav-item mx-2"><a class="ps-2 text-nowrap" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item dropdown dropdown-hover mx-2">
            <a class="ps-2 d-flex justify-content-center cursor-pointer align-items-center text-nowrap" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">

              Automotive Calculators
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-md border" aria-labelledby="dropdownMenuDocs">
              <div class="d-none d-lg-block">
                <ul class="list-group">
                  <li class="nav-item list-group-item border-0 p-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ url('whp-to-hp-calculator') }}">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">WHP to HP Calculator</h6>

                    </a>
                  </li>
                  <li class="nav-item list-group-item border-0 p-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ url('wheel-horse-power-calculator') }}">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Wheel Horse Power Calculator</h6>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="row d-lg-none">
                <div class="col-md-12 g-0">
                  <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ url('whp-to-hp-calculator') }}">
                    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">WHP to HP Calculator</h6>

                  </a>
                  <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ url('wheel-horse-power-calculator') }}">
                    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Wheel Horse Power Calculator</h6>

                  </a>
                  

                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown dropdown-hover mx-2">
            <a class="ps-2 d-flex justify-content-center cursor-pointer align-items-center text-nowrap" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">

              Physics Calculators
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-md border" aria-labelledby="dropdownMenuDocs">
              <div class="d-none d-lg-block">
                <ul class="list-group">
                  <li class="nav-item list-group-item border-0 p-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ url('/pascal-to-psi-converter') }}">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Pascal to PSI Calculator</h6>
                      {{-- <span class="text-sm">Explore our collection of fully designed components</span> --}}
                    </a>
                  </li>

                </ul>
              </div>
              <div class="row d-lg-none">
                <div class="col-md-12 g-0">
                  <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ url('/pascal-to-psi-converter') }}">
                    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Pascal to PSI Calculator</h6>
                    {{-- <span class="text-sm">Explore our collection of fully designed components</span> --}}
                  </a>

                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown dropdown-hover mx-2">
            <a class="ps-2 d-flex justify-content-center cursor-pointer align-items-center text-nowrap" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">

              Mathematical Calculators
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-md border" aria-labelledby="dropdownMenuDocs">
              <div class="d-none d-lg-block">
                <ul class="list-group">
                  <li class="nav-item list-group-item border-0 p-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ url('/fermats-little-theorem-calculator') }}">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Fermat's Little Theorem</h6>

                    </a>
                  </li>
                  <li class="nav-item list-group-item border-0 p-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ url('/demoivres-theorem-calculator') }}">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">De Moivre's Theorem</h6>

                    </a>
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ url('/weighted-average-calculator') }}">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Weighted Average Calculator</h6>

                    </a>
                  </li>

                </ul>
              </div>
              <div class="row d-lg-none">
                <div class="col-md-12 g-0">
                  <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ url('/fermats-little-theorem-calculator') }}">
                    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Fermat's Little Theorem</h6>

                  </a>
                  <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ url('/demoivres-theorem-calculator') }}">
                    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">De Moivre's Theorem</h6>

                  </a>
                  <a class="dropdown-item py-2 ps-3 border-radius-md" href="{{ url('/weighted-average-calculator') }}">
                    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Weighted Average Calculator</h6>

                  </a>

                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item mx-2"><a class="ps-2 text-nowrap" href="{{route('contact')}}">Contact Us</a></li>
          {{-- <li class="nav-item ms-lg-auto">
            <a class="nav-link nav-link-icon me-2" href="https://github.com/creativetimofficial/soft-ui-design-system" target="_blank">
              <i class="fa fa-github me-1"></i>
              <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Star us on Github">Github</p>
            </a>
          </li>
          <li class="nav-item my-auto ms-3 ms-lg-0">
            <a href="https://www.creative-tim.com/product/material-kit-pro" class="btn btn-sm  bg-gradient-primary  mb-0 me-1 mt-2 mt-md-0">Upgrade to Pro</a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  @yield('content')
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="{{route('about')}}" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            About Us
          </a>
          <a href="{{route('team')}}" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Our Team
          </a>
          <a href="{{route('contact')}}" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Contact Us
          </a>
          <a href="{{route('privacyPolicy')}}" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
          Privacy Policy
          </a>
          <a href="{{route('termsOfUse')}}" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Terms of Use
          </a>
        </div>
        {{-- <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-dribbble"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div> --}}
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © {{ date("Y") }}
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/prism.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/highlight.min.js')}}"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="{{asset('assets/js/plugins/parallax.min.js')}}"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="{{asset('assets/js/material-kit.min.js')}}" type="text/javascript"></script>
</body>

</html>
