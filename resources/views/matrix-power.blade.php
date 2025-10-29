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
              <div class="col-lg-4 me-lg-auto col-md-4 col-sm-3">
                <label for="vectors">
                    Matrix Power
                </label>
                <div class="input-group input-group-static mb-4">
                  <input class="form-control text-center" placeholder="Power" type="number" name="n" value="2" required>
                </div>
              </div>
              <div class="col-lg-4 ms-lg-auto col-md-4 col-sm-3">
                <label for="vectors">Size of Matrix</label>
                <div class="input-group input-group-static flex-nowrap mb-4">
                  <input class="form-control" placeholder="a" type="number" id="size" disabled name="size" value="2">
                  <button class="btn bg-gradient-primary dropdown-toggle mb-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                  </button>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3" id="size-dropdown">
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
                <div class="mb-4 border-bottom border-warning text-center coordshow" id="ushowdiv">
                  <p class="lead mb-0"><b>u</b> = <span id="ushow">( a<sub>0</sub> a<sub>1</sub> )</span></p>
                </div>
                <div class="mb-4 border-bottom border-warning text-center coordshow" id="vshowdiv">
                <p class="lead mb-0"><b>v</b> = <span id="vshow">( b<sub>0</sub> b<sub>1</sub> )</span></p>
                </div>
                <div class="mb-4 border-bottom border-warning text-center coordshow" id="wshowdiv">
                <p class="lead mb-0"><b>w</b> = <span id="wshow">( c<sub>0</sub> c<sub>1</sub> )</span></p>
              </div>
                <div class="mb-4 border-bottom border-warning text-center d-none coordshow" id="tshowdiv">
                <p class="lead mb-0"><b>t</b> = <span id="tshow">( d<sub>0</sub> d<sub>1</sub> )</span></p>
              </div>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="row align-items-center text-center justify-content-center py-2 block-row border shadow rounded mb-2 w-100 w-md-50" id="u-row">
              <div class="col-lg-3">
                <h3>u</h3>
              </div>
              <div class="col-lg-5" id="u">
                <div class="input-group input-group-static mb-4">
                  <input class="form-control text-center" placeholder="a0" type="number" name="u[]" required>
                </div>
                <div class="input-group input-group-static mb-4">
                  <input class="form-control text-center" placeholder="a1" type="number" name="u[]" required>
                </div>
              </div>
            </div>
            <div class="row align-items-center text-center justify-content-center py-2 block-row border shadow rounded mb-2 w-100 w-md-50" id="v-row">
              <div class="col-lg-3">
                <h3>v</h3>
              </div>
              <div class="col-lg-5" id="v">
                <div class="input-group input-group-static mb-4">
                  <input class="form-control text-center" placeholder="b0" type="number" name="v[]" required>
                </div>
                <div class="input-group input-group-static mb-4">
                  <input class="form-control text-center" placeholder="b1" type="number" name="v[]" required>
                </div>
              </div>
            </div>
            <div class="row align-items-center text-center justify-content-center py-2 block-row border shadow rounded mb-2 w-100 w-md-50" id="w-row">
              <div class="col-lg-3">
                <h3>w</h3>
              </div>
              <div class="col-lg-5" id="w">
                <div class="input-group input-group-static mb-4">
                  <input class="form-control text-center" placeholder="c0" type="number" name="w[]" required>
                </div>
                <div class="input-group input-group-static mb-4">
                  <input class="form-control text-center" placeholder="c1" type="number" name="w[]" required>
                </div>
              </div>
            </div>
            <div class="row align-items-center text-center justify-content-center py-2 d-none block-row border shadow rounded mb-2 w-100 w-md-50" id="t-row">
              <div class="col-lg-3">
                <h3>t</h3>
              </div>
              <div class="col-lg-5" id="t">
                
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
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $('#size-dropdown li a').on('click',function(e){
    e.preventDefault();
    $('#size-dropdown li a').removeClass('active');
    var coord = $(this).data('val');

    $('#size').val(coord);
    $(this).addClass('active');
    laymatrix(vector,coord);
  });
  function laymatrix(vector, coord){
    $('.block-row').removeClass('d-none');
    $('.coordshow').removeClass('d-none');
    var uhtml = '';
    var vhtml = '';
    var whtml = '';
    var thtml = '';
    var ushow = '( ';
    var vshow = '( ';
    var wshow = '( ';
    var tshow = '( ';
    vector = parseInt(vector);
    switch (vector) {
      case 2:
      $('#w-row').addClass('d-none');
      $('#t-row').addClass('d-none');
      $('#wshowdiv').addClass('d-none');
      $('#tshowdiv').addClass('d-none');
      for (var i = 0; i < coord; i++) {
        uhtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form- text-center" required placeholder="a'+i+'" type="number" name="u[]"> \
        </div>';
        vhtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control text-center" required placeholder="b'+i+'" type="number" name="v[]"> \
        </div>';
        ushow += 'a<sub>'+i+'</sub> ';
        vshow += 'b<sub>'+i+'</sub> ';
      }
        break;
      case 3:
      $('#t-row').addClass('d-none');
      $('#tshowdiv').addClass('d-none');
      for (var i = 0; i < coord; i++) {
        uhtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control text-center" required placeholder="a'+i+'" type="number" name="u[]"> \
        </div>';
        vhtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control text-center" required placeholder="b'+i+'" type="number" name="v[]"> \
        </div>';
        whtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control text-center" required placeholder="c'+i+'" type="number" name="w[]"> \
        </div>';
        ushow += 'a<sub>'+i+'</sub> ';
        vshow += 'b<sub>'+i+'</sub> ';
        wshow += 'c<sub>'+i+'</sub> ';
      }
      break;
      case 4:
      for (var i = 0; i < coord; i++) {
        uhtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control text-center" required placeholder="a'+i+'" type="number" name="u[]"> \
        </div>';
        vhtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control text-center" required placeholder="b'+i+'" type="number" name="v[]"> \
        </div>';
        whtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control text-center" required placeholder="c'+i+'" type="number" name="w[]"> \
        </div>';
        thtml += '<div class="input-group input-group-static mb-4"> \
          <input class="form-control text-center" required placeholder="d'+i+'" type="number" name="t[]"> \
        </div>';
        ushow += 'a<sub>'+i+'</sub> ';
        vshow += 'b<sub>'+i+'</sub> ';        
        wshow += 'c<sub>'+i+'</sub> ';        
        tshow += 'd<sub>'+i+'</sub> ';
      }
      break;

    }
    $('#u').html(uhtml);
    $('#v').html(vhtml);
    $('#w').html(whtml);
    $('#t').html(thtml);
    $('#ushow').html(ushow+')');
    $('#vshow').html(vshow+')');
    $('#wshow').html(wshow+')');
    $('#tshow').html(tshow+')');

  }
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
      },
      error: (error) => {console.log(error)}
    });
  });

  </script>
@endsection
