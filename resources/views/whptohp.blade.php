@extends('layouts.layout')
@section('title','Wheel Horse Power Calculator')
@section('meta-description','Calculate wheel horsepower (WHP) to horsepower (HP) online. Simply enter your WHP and tire size to accurately determine the horsepower of your vehicle. Try now!')
@section('headsection')
<link rel="canonical" href="https://hcalculator.com/whp-to-hp-calculator" />
@endsection
@section('content')
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="mb-4 w-100 w-md-50 w-lg-25">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Wheel Horse Power Calculator</li>
            </ol>
          </nav>
        </div>
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 me-auto">
                <h1 class="text-dark pt-1 mb-0">Wheel Horse Power Calculator</h1>
              </div>
            </div>
          </div>
          {{-- <div class="tab-content tab-space">
            <div class="tab-pane active" id="preview-forms-simple">

            </div>
          </div> --}}
          <div class="container">
            <form id="calculatorForm" action="{{ url('/wheel-horse-power-calculator') }}" method="post">
              @csrf
            <div class="row justify-content-center py-2">
              <div class="col-lg-12">
                <div class="mb-4 text-center">
                  <p class="lead mb-0">Enter the engine horsepower of a car and select the drive system to find its wheel horsepower.</p>
                </div>
              </div>
              <div class="col-lg-4">

                <div class="input-group input-group-static mb-4">
                  <label>Engine Horse Power</label>
                  <input class="form-control" placeholder="EHP" type="number" name="i1">
                </div>
                <div class="input-group input-group-static mb-4">
                  <label>Drive Terrain</label>
                  <select class="form-control" type="text" name="i2">
                    <option disabled selected>-- Select Drive Terrain --</option>
                    <option value="1.1">Front Wheel Drive</option>
                    <option value="1.15">Rear Wheel Drive</option>
                    <option value="1.2">All Wheel Drive</option>
                  </select>
                </div>
                <button type="submit" id="calculate" class="btn bg-gradient-primary w-100">Calculate</button>
              </div>
            </div>
            </form>
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 text-center" id="response">

              </div>
            </div>
          </div>
        </div>

        <div class="px-3 py-2">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <a href="{{ url('/whp-to-hp-calculator') }}" class="btn bg-gradient-secondary shadow-primary">WHP to HP Calculator</a>
              </div>
            </div>
          </div>
          <div class="container border">

            <div class="row">
              <div class="col-lg-12">
                <h2>Wheel Horsepower Formula</h2>
                <p class="lead">A car's horsepower is calculated using the following formula.</p>
                <i class="lead">WHP = EHP / DTLF</i>
                <ul>
                  <li>Where <b>WHP</b> represents a wheel horsepower</li>
                  <li><b>EHP</b> stands for engine horsepower</li>
                  <li><b>LF</b> is the drive train loss factor
                    <ul>
                      <li>front wheel drive = 1.1</li>
                      <li>rear wheel drive = 1.15</li>
                      <li>all wheel drive = 1.2</li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="col-lg-12">
                <h2>Wheel horsepower</h2>
                <p>The horsepower that a car's engine delivers to the wheels after accounting for drivetrain loss is known as wheel horsepower.</p>
              </div>
              <div class="col-lg-12">
                <h2>How is wheel horsepower calculated?</h2>
                <p><strong>The horsepower that a car's engine delivers to the wheels after accounting for drivetrain loss is known as wheel horsepower.</strong></p>
                <i class="lead">WHP = EHP / DTLF</i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $('#calculatorForm').on('submit',function(e){
    e.preventDefault();
    var data = $(this).serialize();
    var method = $(this).attr('method');
    var url = $(this).attr('action');
    $.ajax({
      url : url,
      method: method,
      data : data,
      success: function(data){
        var html = '<div class="alert alert-dark text-white font-weight-bold" >'+data.response+'</div>';
        $('#response').html(html);
      }
    });
  });
  // $('#calculate').on('click',function(){
  //   var whp = $('input[name="i1"]').val();
  //   var dl = $('input[name="i2"]').val();
  //   var hp = whp/(1–dl);
  //   var html = '<div class="alert alert-dark text-white font-weight-bold" >Engine Horse Power: '+hp+'</div>';
  //   $('#response').html(html);
  // });

  </script>
@endsection
