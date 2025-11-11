@extends('layouts.layout')
@section('title','Multiply')
@section('meta-description','')

@section('content')
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="mb-4 w-100 w-md-50 w-lg-25">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Multiply Calculator</li>
            </ol>
          </nav>
        </div>
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 me-auto">
                <h1 class="text-dark pt-1 mb-0">Multiply Calculator</h1>
              </div>
            </div>
          </div>
          {{-- <div class="tab-content tab-space">
            <div class="tab-pane active" id="preview-forms-simple">

            </div>
          </div> --}}
          <div class="container">
            <form id="calculatorForm" action="{{ url('/test-one') }}" method="post">
              @csrf
            <div class="row justify-content-center py-2">
              <div class="col-lg-12">
                <div class="mb-4 text-center">
                  <p class="lead mb-0">Enter the first number and second number to find its result after multiplication.</p>
                </div>
              </div>
              <div class="col-lg-4">

                <div class="input-group input-group-static mb-4">
                  <label>Enter first number</label>
                  <input class="form-control" placeholder="First Number" type="decimal" name="i1">
                </div>
                <div class="input-group input-group-static mb-4">
                  <label>Enter Second Number</label>
                  <input class="form-control" placeholder="Second Number" type="decimal" name="i2">
                </div>
                <button type="submit" id="Multiply" class="btn bg-gradient-primary w-100">Multiply</button>
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
                <a href="{{ url('/test-one') }}" class="btn bg-gradient-secondary shadow-primary">Multiply Calculator</a>
              </div>
            </div>
          </div>
          <div class="container border">

            <div class="row">
              <div class="col-lg-12">
                <h2>Multiply Formula</h2>
                <p class="lead">Two numbers multiplication is calculated using the following formula.</p>
                <i class="lead">Multiply = First Number * Second Number</i>
                
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
