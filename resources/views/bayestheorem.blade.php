@section('title','Bayes Theorem Calculator')
@section('meta-description','Bayes Theorem Calculator')
@extends('layouts.layout')

@section('content')
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="mb-4 w-100 w-md-50 w-lg-25">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Bayes Theorem</li>
            </ol>
          </nav>
        </div>
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 me-auto">
                <h1 class="text-dark pt-1 mb-0">Bayes Theorem</h1>
              </div>
            </div>
          </div>
          {{-- <div class="tab-content tab-space">
            <div class="tab-pane active" id="preview-forms-simple">

            </div>
          </div> --}}
          <div class="container">
            <form id="calculatorForm" action="{{ url('/bayes-theorem') }}" method="post">
              @csrf
            <div class="row justify-content-center py-2">
              <div class="col-lg-4 mx-auto">
                <div class="input-group input-group-static mb-4">
                  <label>Probability of A to B (0 - 100 %)</label>
                  <input class="form-control" placeholder="P (A | B)" type="number" min="0" max="100" name="pab">
                </div>
                <div class="input-group input-group-static mb-4">
                  <label>Probability of B to A (0 - 100 %)</label>
                  <input class="form-control" placeholder="P (B | A)" type="number" min="0" max="100" name="pba">
                </div>
                <div class="input-group input-group-static mb-4">
                  <label>Probability of A (0 - 100 %)</label>
                  <input class="form-control" placeholder="P (A)" type="number" min="0" max="100" name="pa">
                </div>
                <div class="input-group input-group-static mb-4">
                  <label>Probability of B (0 - 100 %)</label>
                  <input class="form-control" placeholder="P (B)" type="number" min="0" max="100" name="pb">
                </div>
              </div>
            </div>
              <div class="row justify-content-center py-2">
              <div class="col-lg-4">
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
