@section('title','Linear Independance Calculator')
@section('meta-description','Linear Independance Calculator')
@extends('layouts.layout')

@section('content')
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="mb-4 w-100 w-md-50 w-lg-25">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Linear Independance Calculator</li>
            </ol>
          </nav>
        </div>
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 me-auto">
                <h1 class="text-dark pt-1 mb-0">Linear Independance Calculator</h1>
              </div>
            </div>
          </div>
          {{-- <div class="tab-content tab-space">
            <div class="tab-pane active" id="preview-forms-simple">

            </div>
          </div> --}}
          <div class="container">
            <form id="calculatorForm" action="{{ url('/linear-dependance') }}" method="post">
              @csrf
            <div class="row justify-content-center py-2">
              <div class="col-lg-12">
                <div class="mb-4 text-center">
                  {{-- <p class="lead mb-0">Enter the engine horsepower of a car and select the drive system to find its wheel horsepower.</p> --}}
                </div>
              </div>
            </div>
            <div class="row justify-content-between py-2">
              <div class="col-lg-4 ms-lg-auto col-md-4 col-sm-3">
                <label for="vectors"># of Vectors</label>
                <div class="input-group input-group-static flex-nowrap mb-4">
                  <input class="form-control" placeholder="a" type="number" id="vectors" disabled name="vectors" value="3">
                {{-- <div class="dropdown"> --}}
                  <button class="btn bg-gradient-primary mb-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                  </button>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3" id="vector-dropdown">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;" data-val="2">2</a></li>
                    <li><a class="dropdown-item border-radius-md active" href="javascript:;" data-val="3">3</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;" data-val="4">4</a></li>
                  </ul>
                {{-- </div> --}}
              </div>
              </div>
              <div class="col-lg-4 ms-lg-auto col-md-4 col-sm-3">
                <label for="vectors"># of Coordinates</label>
                <div class="input-group input-group-static flex-nowrap mb-4">
                  <input class="form-control" placeholder="a" type="number" id="coordinates" disabled name="coordinates" value="2">
                  <button class="btn bg-gradient-primary dropdown-toggle mb-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                  </button>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3" id="coord-dropdown">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;" data-val="1">1</a></li>
                    <li><a class="dropdown-item border-radius-md active" href="javascript:;" data-val="2">2</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;" data-val="3">3</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;" data-val="4">4</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="row justify-content-center py-2">
              <div class="col-lg-8 bg-light py-3 rounded">
                <div class="mb-4 border-bottom border-warning text-center">
                  <p class="lead mb-0"><b>u</b> = ( a<sub>1</sub> a<sub>2</sub> )</p>
                </div>
                <div class="mb-4 border-bottom border-warning text-center">
                <p class="lead mb-0"><b>v</b> = ( b<sub>1</sub> b<sub>2</sub> )</p>
                </div>
                <div class="mb-4 border-bottom border-warning text-center">
                <p class="lead mb-0"><b>w</b> = ( c<sub>1</sub> c<sub>2</sub> )</p>
              </div>
              </div>
            </div>

            <div class="row align-items-center text-center justify-content-center py-2 block-row" id="u-row">
              <div class="col-lg-3">
                <label>u</label>
              </div>
              <div class="col-lg-5" id="u">
                <div class="input-group input-group-static mb-4">
                  <input class="form-control" placeholder="b₂" type="number" name="u[]">
                </div>
                <div class="input-group input-group-static mb-4">
                  <input class="form-control" placeholder="a" type="number" name="u[]">
                </div>
              </div>
            </div>
            <div class="row align-items-center text-center justify-content-center py-2 block-row" id="v-row">
              <div class="col-lg-3">
                <label>v</label>
              </div>
              <div class="col-lg-5" id="v">
                <div class="input-group input-group-static mb-4">
                  <input class="form-control" placeholder="a" type="number" name="v[]">
                </div>
                <div class="input-group input-group-static mb-4">
                  <input class="form-control" placeholder="a" type="number" name="v[]">
                </div>
              </div>
            </div>
            <div class="row align-items-center text-center justify-content-center py-2 block-row" id="w-row">
              <div class="col-lg-3">
                <label>w</label>
              </div>
              <div class="col-lg-5" id="w">
                <div class="input-group input-group-static mb-4">
                  <input class="form-control" placeholder="a" type="number" name="w[]">
                </div>
                <div class="input-group input-group-static mb-4">
                  <input class="form-control" placeholder="a" type="number" name="w[]">
                </div>
              </div>
            </div>
            <div class="row align-items-center text-center justify-content-center py-2 d-none block-row" id="t-row">
              <div class="col-lg-3">
                <label>t</label>
              </div>
              <div class="col-lg-5" id="t">
                <div class="input-group input-group-static mb-4">
                  <input class="form-control" placeholder="a" type="number" name="t[]">
                </div>
                <div class="input-group input-group-static mb-4">
                  <input class="form-control" placeholder="a" type="number" name="t[]">
                </div>
              </div>
            </div>
            <div class="row justify-content-center py-2">
              <div class="col-lg-8">
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

        {{-- <div class="px-3 py-2">
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
        </div> --}}
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $('#vector-dropdown li a').on('click',function(e){
    e.preventDefault();
    $('#vector-dropdown li a').removeClass('active');
    var vector = $(this).data('val');
    var coord = $('#coordinates').val();

    $('#vectors').val(vector);
    $(this).addClass('active');
    layvectors(vector,coord);
  });
  $('#coord-dropdown li a').on('click',function(e){
    e.preventDefault();
    $('#coord-dropdown li a').removeClass('active');
    var coord = $(this).data('val');
    var vector = $('#vectors').val();

    $('#coordinates').val(coord);
    $(this).addClass('active');
    layvectors(vector,coord);
  });
  function layvectors(vector, coord){
    $('.block-row').removeClass('d-none');
    var uhtml = '';
    var vhtml = '';
    var whtml = '';
    var thtml = '';
    switch (vector) {
      case 2:
      $('#w-row').addClass('d-none');
      $('#t-row').addClass('d-none');
      for (var i = 0; i < coord; i++) {
        uhtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control" placeholder="a'+i+'" type="number" name="u[]"> \
        </div>';
        vhtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control" placeholder="b'+i+'" type="number" name="v[]"> \
        </div>';
      }
        break;
      case 3:
      $('#t-row').addClass('d-none');
      for (var i = 0; i < coord; i++) {
        uhtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control" placeholder="a'+i+'" type="number" name="u[]"> \
        </div>';
        vhtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control" placeholder="b'+i+'" type="number" name="v[]"> \
        </div>';
        whtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control" placeholder="c'+i+'" type="number" name="w[]"> \
        </div>';
      }
      break;
      case 4:
      for (var i = 0; i < coord; i++) {
        uhtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control" placeholder="a'+i+'" type="number" name="u[]"> \
        </div>';
        vhtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control" placeholder="b'+i+'" type="number" name="v[]"> \
        </div>';
        whtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control" placeholder="c'+i+'" type="number" name="w[]"> \
        </div>';
        thtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control" placeholder="d'+i+'" type="number" name="t[]"> \
        </div>';
      }
      break;

    }
    $('u').html(uhtml);
    $('v').html(vhtml);
    $('w').html(whtml);
    $('t').html(thtml);

  }
  $('#calculatorForm').on('submit',function(e){
    e.preventDefault();
    // var data = $(this).serialize();
    // var method = $(this).attr('method');
    // var url = $(this).attr('action');
    // $.ajax({
    //   url : url,
    //   method: method,
    //   data : data,
    //   success: function(data){
    //     var html = '<div class="alert alert-dark text-white font-weight-bold" >'+data.response+'</div>';
    //     $('#response').html(html);
    //   },
    //   error: (error) => {console.log(error)}
    // });
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
