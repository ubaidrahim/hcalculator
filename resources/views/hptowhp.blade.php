@section('title','WHP to HP Calculator')
@section('meta-description','Online Wheel Horse Power (Whp) to Engine Horse Power (Wp) Calculator')
@extends('layouts.layout')

@section('content')
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="mb-4 w-100 w-md-50 w-lg-25">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">WHP to HP Calculator</li>
            </ol>
          </nav>
        </div>
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 me-auto">
                <h1 class="text-dark pt-1 mb-0">Whp to HP Calculator</h1>
              </div>
            </div>
          </div>
          {{-- <div class="tab-content tab-space">
            <div class="tab-pane active" id="preview-forms-simple">

            </div>
          </div> --}}
          <div class="container">
            <form id="calculatorForm" action="{{ url('/whp-to-hp-calculator') }}" method="post">
              @csrf
            <div class="row justify-content-center py-2">
              <div class="col-lg-12">
                <div class="mb-4 text-center">
                  <p class="lead mb-0">Enter the wheel horsepower and choose the car's drivetrain to calculate HP from WHP.</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="input-group input-group-static mb-4">
                  <label>Wheel Horse Power</label>
                  <input class="form-control" placeholder="WHP" type="number" name="i1">
                </div>
                <div class="input-group input-group-static mb-4">
                  <label>Drive Terrain</label>
                  <select class="form-control" type="text" name="i2">
                    <option disabled selected>-- Select Drive Terrain --</option>
                    <option value="0.1">Front Wheel Drive</option>
                    <option value="0.15">Rear Wheel Drive</option>
                    <option value="0.25">All Wheel Drive</option>
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
                <a href="{{ url('/wheel-horse-power-calculator') }}" class="btn bg-gradient-secondary shadow-primary">HP to WHP Calculator</a>
              </div>
            </div>
          </div>
          <div class="container border">

            <div class="row">
              <div class="col-lg-12">
                <h2>Formula</h2>
                <p class="lead">The formula below is used to calculate engine horsepower (hp) from wheel horsepower (WHP).</p>
                <i class="lead">HP = WHP * 1 / (1 – DL )</i>
                <ul>
                  <li>Where <b>HP</b> represents engine horsepower</li>
                  <li><b>WHP</b> is wheel horsepower</li>
                  <li><b>DL</b> represents drive train loss</li>
                </ul>
                <p>For front-wheel drive, the drive train loss is 10%; for rear-wheel drive, it is 15%; and for all-wheel drive, it is 25%.</p>
              </div>
              <div class="col-lg-12">
                <h2>What is the difference between HP & WHP</h2>
                <p>WHP stands for wheel horsepower and HP is typically used to refer to the true engine horsepower output. The difference is where the power is measured.Engine horsepower is measured at the flywheel, whereas wheel horsepower is measured at the wheels.The wheel horsepower number is typically 20%-45% lower than the engine horsepower number.</p>
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
