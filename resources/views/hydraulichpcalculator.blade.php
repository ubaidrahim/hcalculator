@extends('layouts.layout')
@section('title','Hydraulic HP Calculator')
@section('meta-description','')

@section('content')
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="mb-4 w-100 w-md-50 w-lg-25">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Hydraulic HP Calculator</li>
            </ol>
          </nav>
        </div>
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 me-auto">
                <h1 class="text-dark pt-1 mb-0">Hydraulic HP Calculator</h1>
              </div>
            </div>
          </div>
          {{-- <div class="tab-content tab-space">
            <div class="tab-pane active" id="preview-forms-simple">

            </div>
          </div> --}}
          <div class="container">
            <form id="calculatorForm" action="{{ url('/hydraulic-hp-calculator') }}" method="post">
              @csrf
            <div class="row justify-content-center py-2">
              <div class="col-lg-12">
                <div class="mb-4 text-center">
                  <p class="lead mb-0">Find the horsepower of a hydraulic motor with this Hydraulic Horsepower Calculator.</p>
                </div>
              </div>
              <div class="col-lg-4">

                <div class="input-group input-group-static mb-4">
                  <label>Enter Pressure (PSI):</label>
                  <input class="form-control" placeholder="Pressure (PSI)" type="decimal" name="i1"required>
                </div>
                <div class="input-group input-group-static mb-4">
                  <label>Enter Flow Rate (GPM):</label>
                  <input class="form-control" placeholder="Flow Rate (GPM)" type="decimal" name="i2"required>
                </div>
                <button type="submit" id="Calculate" class="btn bg-gradient-primary w-100">Calculate Hydraulic Horsepower</button>
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
                <a href="{{ url('/hydraulic-hp-calculator') }}" class="btn bg-gradient-secondary shadow-primary">Hydraulic HP Calculator</a>
              </div>
            </div>
          </div>
          <div class="container border">

            <div class="row">
              <div class="col-lg-12">
                <h2>How do you calculate hydraulic horsepower?</h2>
                <p class="lead">Hydraulic horsepower shows how much power a hydraulic system delivers based on how much <b>pressure</b> and <b>flow</b> it has.

                <p class="lead">Use this formula:

                <p class="lead"><b>HP = (PSI X GPM) ÷ 1714</b>

                <p class="lead">
                <ul>
                    <li><b>PSI</b> = system pressure</li>
                
                    <li><b>GPM</b> = flow rate</li>

                    <li><b>1714</b> = a constant that converts the numbers into horsepower</li>
                </ul>
                <p class="lead"><b>Example</b>

                <p class="lead">If the hydraulic system has a pressure of <b>1500</b> PSI and a flow rate of <b>25</b> GPM:

                <p class="lead">HP = (1500 X 25) ÷ 1714
                <p class="lead">HP = <b>21.88 horsepower</b>

                <p class="lead">So, the hydraulic system produces <b>about 21.88 HP</b> (rounded to the nearest hundredth).</p>
                
                
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
  

  </script>
@endsection
