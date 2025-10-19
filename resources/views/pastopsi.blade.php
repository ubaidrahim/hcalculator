@extends('layouts.layout')
@section('title','Pascal to PSI Converter - Easily Convert Pressure Units')
@section('meta-description','Convert Pressure Units from Pascal to PSI awith our free and accurate Pascal to PSI converter. ')
@section('headsection')
  <link rel="canonical" href="https://hcalculator.com/pascal-to-psi-converter" />
@endsection
@section('content')
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="mb-4 w-100 w-md-50 w-lg-25">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pascal to PSI Converter</li>
            </ol>
          </nav>
        </div>
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 me-auto">
                <h1 class="text-dark pt-1 mb-0">Pascal to PSI Converter</h1>
              </div>
            </div>
          </div>
          {{-- <div class="tab-content tab-space">
            <div class="tab-pane active" id="preview-forms-simple">

            </div>
          </div> --}}
          <div class="container">
            <div class="row justify-content-center align-items-center py-2">
              <div class="col-lg-3">
                <div class="input-group input-group-static mb-4">
                  <label>Pascal (N/m<sup>2</sup>)</label>
                  <input class="form-control" placeholder="Enter Pascal Value" type="number" name="i1">
                </div>
              </div>
              <div class="col-lg-2 text-center">
                <h4>to</h4>
              </div>
              <div class="col-lg-3">
                <div class="input-group input-group-static mb-4">
                  <label>PSI (lb/in<sup>2</sup>)</label>
                  <input class="form-control" placeholder="Enter PSI Value" type="number" name="i2">
                </div>
              </div>
            </div>
              {{-- <div class="row justify-content-center py-2">
              <div class="col-lg-4">
                <button type="submit" id="calculate" class="btn bg-gradient-primary w-100">Calculate</button>
              </div>
            </div> --}}
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 text-center" id="response">

              </div>
            </div>
          </div>
        </div>

        <div class="px-3 py-2">
          {{-- <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <a href="{{ url('/whp-to-hp-calculator') }}" class="btn bg-gradient-secondary shadow-primary">WHP to HP Calculator</a>
              </div>
            </div>
          </div> --}}
          <div class="container border p-2">

            <div class="row">
              <div class="col-lg-12">
                <h2>Pascal:</h2>
                <p>Pascal is the SI unit of pressure. It is equal to one newton per square meter, and is named after Blaise Pascal, an eminent French mathematician, physicist, philosopher, and scientist. 1 Pascal (Pa) is equal to 0.00014503773 psi.</p>
                <h2>How to Convert Pascal to Psi?</h2>
                <p class="lead">In order to convert pascals to psi, multiply the pascal value by 0.00014503773 or divide it by 6894.75729.</p>
                <p class="lead"><strong>Pascal to psi formula:</strong></p>
                <i class="lead">Pascal x 0.00014503773</i>
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
  $('input[name="i1"]').on('change',function(){
    // var method = $(this).attr('method');
    // var url = $(this).attr('action');
    var value = $(this).val();
    $.ajax({
      url : '{{ url('/pascal-to-psi-converter') }}',
      method: 'post',
      data : {i1:value},
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success: function(data){
        $('input[name="i2"]').val(data.response);
        var html = '<div class="alert alert-primary text-white font-weight-bold" >'+data.response+' PSI (Pounds per Square Inch)</div>';
        $('#response').html(html);
      },
      error: function(err){
        console.log(err);
      }
    });
  });
  $('input[name="i2"]').on('change',function(){
    // var method = $(this).attr('method');
    // var url = $(this).attr('action');
    var value = $(this).val();
    $.ajax({
      url : '{{ url('/pascal-to-psi-converter') }}',
      method: 'post',
      data : {i2:value},
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success: function(data){
        $('input[name="i1"]').val(data.response);
        var html = '<div class="alert alert-primary text-white font-weight-bold" >'+data.response+' Pascal (Newton per Meter Square)</div>';
        $('#response').html(html);
      },
      error: function(err){
        console.log(err);
      }
    });
  });
  // $('#calculatorForm').on('submit',function(e){
  //   e.preventDefault();
  //   var data = $(this).serialize();
  //   var method = $(this).attr('method');
  //   var url = $(this).attr('action');
  //   $.ajax({
  //     url : url,
  //     method: method,
  //     data : data,
  //     success: function(data){
  //       var html = '<div class="alert alert-dark text-white font-weight-bold" >'+data.response+'</div>';
  //       $('#response').html(html);
  //     }
  //   });
  // });
  // $('#calculate').on('click',function(){
  //   var whp = $('input[name="i1"]').val();
  //   var dl = $('input[name="i2"]').val();
  //   var hp = whp/(1–dl);
  //   var html = '<div class="alert alert-dark text-white font-weight-bold" >Engine Horse Power: '+hp+'</div>';
  //   $('#response').html(html);
  // });

  </script>
@endsection
