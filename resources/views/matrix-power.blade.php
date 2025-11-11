@section('title','Matrix Power Calculator')
@section('meta-description','Matrix Power Calculator')
@extends('layouts.layout')
@section('headsection')
<style>
</style>
@endsection
@section('content')
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="mb-4 w-100 w-md-50 w-lg-25">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Matrix Power Calculator</li>
            </ol>
          </nav>
        </div>
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 me-auto">
                <h1 class="text-dark pt-1 mb-0">Matrix Power Calculator</h1>
              </div>
            </div>
          </div>
          {{-- <div class="tab-content tab-space">
            <div class="tab-pane active" id="preview-forms-simple">

            </div>
          </div> --}}
          <div class="container">
            <form id="calculatorForm" action="{{ url('/matrix-power-calculator') }}" method="post">
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
                <label for="vectors">Size of Matrix</label>
                <div class="input-group input-group-static flex-nowrap mb-4">
                  <input class="form-control" placeholder="a" type="number" id="size" disabled name="size" value="2">
                  <button class="btn bg-gradient-primary dropdown-toggle mb-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                  </button>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3" id="size-dropdown">
                    <li><a class="dropdown-item border-radius-md active" href="javascript:;" data-val="2">2</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;" data-val="3">3</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;" data-val="4">4</a></li>
                  </ul>
                </div>
              </div>
              
              <div class="col-lg-4 ms-lg-auto col-md-4 col-sm-3">
                <label for="vectors">
                    Power
                </label>
                <div class="input-group input-group-static mb-4">
                  <input class="form-control text-center" placeholder="Power" type="number" name="n" value="2" required>
                </div>
              </div>
            </div>
            <div class="row justify-content-center py-2 d-none">
              <div class="col-lg-8 bg-light py-3 rounded">
                <div class="mb-4 border-bottom border-warning text-center coordshow" id="ushowdiv">
                  <p class="lead mb-0"><b>u</b> = <span id="ushow">( a<sub>0</sub> a<sub>1</sub> )</span></p>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
            <div class="row align-items-center text-center justify-content-center py-2 border shadow rounded mb-2 w-100 w-md-100 flex-nowrap" id="u-row">
              
              <div class="col">
                <div class="input-group input-group-static mb-4">
                  <input class="form-control text-center" placeholder="a[0][0]" type="number" name="u[0][]" required>
                </div>
                <div class="input-group input-group-static mb-4">
                  <input class="form-control text-center" placeholder="a[0][1]" type="number" name="u[0][]" required>
                </div>
              </div>
              <div class="col">
                <div class="input-group input-group-static mb-4">
                  <input class="form-control text-center" placeholder="a[1][0]" type="number" name="u[1][]" required>
                </div>
                <div class="input-group input-group-static mb-4">
                  <input class="form-control text-center" placeholder="a[1][1]" type="number" name="u[1][]" required>
                </div>
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
        <div class="px-3 py-2">
          <div class="container border">
            <div class="row">
              <div class="col-lg-12">
                <h2>Matrix Power Calculator</h2>
                <h3>(Supports Negative Powers & Exact Arithmetic)</h3>
                <p class="lead">This calculator computes the <b>integer power of a square matrix A<sup>n</sup></b> using <b>exact rational arithmetic</b> (no floating-point errors).</p>
                <p class="lead">It supports both <b>positive and negative integer powers</b>, ensuring mathematically correct results even for inverses</p>
                <h3>How it Works</h3>
                <ul>
                  <li>For <b>n ≥ 0</b>, it multiplies the matrix by itself n times using fast <b>exponentiation by squaring</b> (O(log n)).</li>
                  <li>For <b>n < 0</b>, it first computes the <b>exact matrix inverse</b> via <b>Gauss–Jordan elimination</b> over rational numbers, then raises that inverse to ∣n∣.</li>
                  <li>All operations are <b>integer-safe</b>, ensuring no precision loss.</li>
                </ul>
                <h3>Formula</h3>
                <p class="lead">For a square matrix <b>A</b> and an integer <b>n</b>:</p>
                <p class="text-center my-3">
                    <img src="{{ asset('assets/img/matrix_power_formula.png') }}" 
                        alt="Matrix Power Formula" 
                        class="img-fluid" 
                        style="max-width: 400px;">
                </p>
                <p>where</p>
                <ul>
                  <li><i>A<sup>-1</sup></i> = the <b>inverse</b> of matrix <b>A</b></li>
                  <li><i>I</i> = the <b>identity matrix</b> (1’s on the diagonal, 0’s elsewhere)</li>
                </ul>
                <p>This means:
                  <ul>
                    <li>Positive powers repeat multiplication.</li>
                    <li>Zero power always gives the identity matrix.</li>
                    <li>Negative powers first find the inverse, then apply the positive power to it.</li>
                  </ul>
                </p>
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
    laymatrix(coord);
  });
  function laymatrix(coord){
    var uhtml = '';
      for (var i = 0; i < coord; i++) {
        uhtml += '<div class="col">';
      for (var j = 0; j < coord; j++) {
        uhtml += `<div class="input-group input-group-static mb-4">
          <input class="form-control text-center" required placeholder="a[${i}][${j}]" type="number" name="u[${i}][]">
        </div>`;
      }
      uhtml += '</div>';
      }
        
    $('#u-row').html(uhtml);

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
        result = data.result;
        var html = '<div class="alert alert-dark text-white font-weight-bold" >';
          html += `<div class="d-flex align-items-start justify-content-center w-100">
            The resultant matrix is:</div>`;
          $.each(result,function (key,val){
            html += `<div class="d-flex align-items-start justify-content-center w-100">
                  <div class="col text-end matrixstart p-2">[</div>`;
            html += '<div class="col d-flex justify-content-center">';
              $.each(val,function(k1,val1){
                html += `<span class="text-center p-2">${val1}</span>`;
              });
            html += `</div><div class="col text-start matrixend p-2">]</div></div>`;
          });
          html += '</div>'
        $('#response').html(html);
      },
      error: (error) => {console.log(error)}
    });
  });

  </script>
@endsection
