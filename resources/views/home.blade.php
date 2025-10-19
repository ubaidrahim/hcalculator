@extends('layouts.layout')
@section('title','HOME')
@section('meta-description','')

@section('content')

  <div class="page-header py-5" style="background-image: url({{ asset('/assets/img/banner.jpg') }});" loading="lazy">
    <span class="mask bg-gradient-dark opacity-5"></span>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-7 d-flex justify-content-center flex-column">
          <h1 class="text-white mb-4">H-Calculator Hub</h1>
          <p class="text-white opacity-8 lead pe-5 me-5">Free online calculators for all in finance, mathematics, trigonometry, and other fields.</p>
          {{-- <div class="buttons">
            <a href="{{ route('contact') }}" class="btn btn-white mt-4">Get in Touch</a>
            <a href="{{ route('about') }}" class="btn text-white shadow-none mt-4">Read more</a>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row justify-space-between py-2">
              <div class="col-lg-3 me-auto">
                <p class="lead text-dark pt-1 mb-0">Our Calculators</p>
              </div>
              {{-- <div class="col-lg-3">
                <div class="nav-wrapper position-relative end-0">
                  <ul class="nav nav-pills nav-fill flex-row p-1" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#preview-forms-simple" role="tab" aria-selected="true">
                        <i class="fas fa-desktop text-sm me-2"></i> Preview
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#code-forms-simple" role="tab" aria-selected="false">
                        <i class="fas fa-code text-sm me-2"></i> Code
                      </a>
                    </li>
                  </ul>
                </div>
              </div> --}}
            </div>
          </div>
          {{-- <div class="tab-content tab-space">
            <div class="tab-pane active" id="preview-forms-simple">

            </div>
          </div> --}}
<div class="container">
<div class="row border-bottom py-3">
  <div class="col-lg-6 my-auto">
    <h3 class="mt-5 mt-lg-0">WHP to HP Calculator</h3>
    <p class="pe-5">Enter the wheel horsepower and choose the car's drivetrain to calculate HP from WHP.</p>
    <a href="{{ url('/whp-to-hp-calculator') }}" class="text-primary icon-move-right">Calculate Now
      <i class="fas fa-arrow-right text-sm ms-1"></i>
    </a>
  </div>
  {{-- <div class="col-lg-6 mt-lg-0 mt-5 ps-lg-0 ps-0">
    <div class="p-3 info-horizontal">
      <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
        <i class="fas fa-ship opacity-10"></i>
      </div>
      <div class="description ps-3">
        <p class="mb-0">It becomes harder for us to give others a hand. <br> We get our heart broken by people we love.</p>
      </div>
    </div>

    <div class="p-3 info-horizontal">
      <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
        <i class="fas fa-handshake opacity-10"></i>
      </div>
      <div class="description ps-3">
        <p class="mb-0">As we live, our hearts turn colder. <br>Cause pain is what we go through as we become older.</p>
      </div>
    </div>
    <div class="p-3 info-horizontal">
      <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
        <i class="fas fa-hourglass opacity-10"></i>
      </div>
      <div class="description ps-3">
        <p class="mb-0">When we lose family over time. <br> What else could rust the heart more over time? Blackgold.</p>
      </div>
    </div>
  </div> --}}
</div>
<div class="row border-bottom py-3">
  <div class="col-lg-6 my-auto">
    <h3 class="mt-5 mt-lg-0">Wheel Horse Power Calculator</h3>
    <p class="pe-5">Enter the engine horsepower and select the drive system to determine a car’s wheel horsepower.</p>
    <a href="{{ url('/wheel-horse-power-calculator') }}" class="text-primary icon-move-right">Calculate Now
      <i class="fas fa-arrow-right text-sm ms-1"></i>
    </a>
  </div>
</div>
<div class="row border-bottom py-3">
  <div class="col-lg-6 my-auto">
    <h3 class="mt-5 mt-lg-0">Pascals to PSI Converter</h3>
    <p class="pe-5">Converter Pascals to PSI & Vice Versa.</p>
    <a href="{{ url('/pascal-to-psi-converter') }}" class="text-primary icon-move-right">Calculate Now
      <i class="fas fa-arrow-right text-sm ms-1"></i>
    </a>
  </div>
</div>
<div class="row border-bottom py-3">
  <div class="col-lg-6 my-auto">
    <h3 class="mt-5 mt-lg-0">Fermat's Little Theorem</h3>
    <p class="pe-5">Calculate values for Fermat's little Theorem.</p>
    <a href="{{ url('/fermats-little-theorem-calculator') }}" class="text-primary icon-move-right">Calculate Now
      <i class="fas fa-arrow-right text-sm ms-1"></i>
    </a>
  </div>
</div>
<div class="row border-bottom py-3">
  <div class="col-lg-6 my-auto">
    <h3 class="mt-5 mt-lg-0">De Moirvre's Theorem</h3>
    <p class="pe-5">Calculate values for De Moivre's Theorem.</p>
    <a href="{{ url('/demoivres-theorem-calculator') }}" class="text-primary icon-move-right">Calculate Now
      <i class="fas fa-arrow-right text-sm ms-1"></i>
    </a>
  </div>
</div>
<div class="row border-bottom py-3">
  <div class="col-lg-6 my-auto">
    <h3 class="mt-5 mt-lg-0">Weighted Average Calculator</h3>
    <p class="pe-5">Calculate Weighted Mean or Weightage Average value.</p>
    <a href="{{ url('/weighted-average-calculator') }}" class="text-primary icon-move-right">Calculate Now
      <i class="fas fa-arrow-right text-sm ms-1"></i>
    </a>
  </div>
</div>
</div>


        </div>
      </div>
    </div>
  </div>

@endsection
