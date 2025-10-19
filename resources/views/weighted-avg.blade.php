@extends('layouts.layout')
@section('title','Weighted Mean Calculator | Weighted Average Calculator')
@section('meta-description','Calculate weighted means and averages with ease using our free online weighted average calculator. Enter your data, select your weightings, & click calculate.')
@section('headsection')
<link rel="canonical" href="https://hcalculator.com/weighted-average-calculator" />
@endsection
@section('content')
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="mb-4 w-100 w-md-50 w-lg-25">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Weighted Mean Calculator</li>
            </ol>
          </nav>
        </div>
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 me-auto">
                <h1 class="text-dark pt-1 mb-0">Weighted Mean Calculator</h1>
              </div>
            </div>
          </div>
          {{-- <div class="tab-content tab-space">
            <div class="tab-pane active" id="preview-forms-simple">

            </div>
          </div> --}}
          <div class="container">
            <form id="calculatorForm" action="{{ url('/weighted-average-calculator') }}" method="post">
              @csrf
            <div class="row justify-content-center py-2">
              <div class="col-lg-12">
                <div class="mb-4 text-center">
                  <p class="lead mb-0">Enter value of <i>X</i> along with Weighted Mean <i>W</i>.</p>
                </div>
              </div>
            </div>
            <div class="row justify-content-center py-2">
              <div class="col-5 col-lg-4">

                <div class="input-group input-group-static mb-4">
                  <label>Values for W<sub>n</sub> (Leave blank for 1)</label>
                </div>

              </div>
              <div class="col-5 col-lg-4">

                <div class="input-group input-group-static mb-4">
                  <label>Values for X<sub>n</sub> (Leave blank to skip)</label>
                </div>

              </div>
              <div class="col-2 col-lg-2">

              </div>
            </div>
            <div id="appendForm">
              <div class="row justify-content-center py-2">
                <div class="col-5 col-lg-4">
                  <div class="input-group input-group-static mb-4">
                    <input class="form-control"  type="number" name="wn[]">
                  </div>
                </div>
                <div class="col-5 col-lg-4">
                  <div class="input-group input-group-static mb-4">
                    <input class="form-control"  type="number" name="xn[]">
                  </div>
                </div>
                <div class="col-2 col-lg-2 text-center">
                  <button type="button" class="clear btn btn-light"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="row justify-content-center py-2">
                <div class="col-5 col-lg-4">
                  <div class="input-group input-group-static mb-4">
                    <input class="form-control"  type="number" name="wn[]">
                  </div>
                </div>
                <div class="col-5 col-lg-4">
                  <div class="input-group input-group-static mb-4">
                    <input class="form-control"  type="number" name="xn[]">
                  </div>
                </div>
                <div class="col-2 col-lg-2 text-center">
                  <button type="button" class="clear btn btn-light"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="row justify-content-center py-2">
                <div class="col-5 col-lg-4">
                  <div class="input-group input-group-static mb-4">
                    <input class="form-control"  type="number" name="wn[]">
                  </div>
                </div>
                <div class="col-5 col-lg-4">
                  <div class="input-group input-group-static mb-4">
                    <input class="form-control"  type="number" name="xn[]">
                  </div>
                </div>
                <div class="col-2 col-lg-2 text-center">
                  <button type="button" class="clear btn btn-light"><i class="fas fa-times"></i></button>
                </div>
              </div>
            </div>
              <div class="row justify-content-center py-2">
                <div class="col-12 col-lg-8">
                  <button type="button" class="add btn bg-gradient-primary w-100"><i class="fas fa-plus"></i> Add More</button>
                </div>
              </div>
              <button type="submit" id="calculate" class="btn bg-gradient-primary w-100">Calculate</button>
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
                <h2>Weighted Mean Formula</h2>
                <i class="lead">Weighted Mean = (w<sub>1</sub>*x<sub>1</sub> + w<sub>2</sub>*x<sub>2</sub> + ........ + w<sub>n</sub>*x<sub>n</sub>) / (x<sub>1</sub> + x<sub>n</sub> + ........ + x<sub>n</sub>)</i>
                <p>Where:</p>
                <ul>
                  <li><i>w<sub>1</sub>, w<sub>2</sub>, ..... , w<sub>n</sub></i> are the weights of each data point</li>
                  <li><i>x<sub>1</sub>, x<sub>2</sub>, ..... , x<sub>n</sub></i> are the values of each data point</li>
                </ul>
                <p class="lead">e.g: Weighted mean = (2 * 1 + 3 * 2 + 4 * 3) / (2 + 3 + 4) = 11 / 9 = 1.22222</p>
              </div>
              <div class="col-lg-12">
                <h2>How to Calculate Weighted Mean?</h2>
                <p>To calculate the weighted mean, you need two sets of data: the values and their corresponding weights. The weighted mean is obtained by multiplying each value by its corresponding weight, summing up these products, and dividing the result by the sum of the weights.</p>
                <p>Here's the step-by-step process to calculate the weighted mean:</p>
                <ol>
                  <li>Gather the values and their corresponding weights. Let's denote the values as <i>x<sub>1</sub>, x<sub>2</sub>, x<sub>3</sub>,..., x<sub>n</sub></i>, and their corresponding weights as w1, w2, w3,..., wn. Ensure that the number of values matches the number of weights.</li>

                    <li>Multiply each value by its corresponding weight. Calculate the product of each value and its weight: <i>x<sub>1</sub>*w<sub>1</sub>, x<sub>2</sub>*w<sub>2</sub>, x<sub>3</sub>*w<sub>3</sub>,..., x<sub>n</sub>*w<sub>n</sub></i>.</li>

                    <li>Sum up the products. Add up all the products obtained in the previous step: <i>(x<sub>1</sub>*w</sub>1</sub>) + (x<sub>2</sub>*w</sub>2</sub>) + (x<sub>3</sub>*w</sub>3</sub>) + ... + (x<sub>n</sub>*w</sub>n</sub>)</i>.</li>

                    <li>Sum up the weights. Calculate the sum of all the weights: <i>w<sub>1</sub> + w<sub>2</sub> + w<sub>3</sub> + ... + w<sub>n</sub></i>.</li>

                    <li>Divide the sum of products by the sum of weights. Divide the sum obtained in Step 3 by the sum obtained in Step 4: (x<sub>1</sub>*w<sub>1</sub> + x<sub>2</sub>*w<sub>2</sub> + x<sub>3</sub>*w<sub>3</sub> + ... + x<sub>n</sub>*w<sub>n</sub>) / (w1 + w2 + w3 + ... + wn).</li>
                    <li>The result of Step 5 is the weighted mean. This value represents the average of the values, taking into account their respective weights.</li>
                </ol>
              </div>
              <div class="col-lg-12">
                <h2>Importance of Weighted Mean in Real World</h2>
                <p>Here are some additional examples of how the weighted mean can be used:</p>
                <ul>
                  <li>To calculate the average salary of a company's employees, where some employees have more experience than others.</li>
                  <li>To calculate the average test score of a group of students, where some students have taken more practice tests than others.</li>
                  <li>To calculate the average cost of a car, where some cars have more features than others.</li>
                  <li>The weighted mean is a powerful tool that can be used to calculate the average of a set of data points, where some data points are more important than others.</li>
                </ul>
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
      },
      error: function(err){
        console.log(err);
      }
    });
  });
  $('.clear').on('click',function(){
    $(this).closest('.row').remove();
    //console.log(id);
  });
  $('.add').on('click',function(e){
    e.preventDefault();
    let html = '<div class="row justify-content-center py-2"> \
      <div class="col-5 col-lg-4"> \
        <div class="input-group input-group-static mb-4"> \
          <input class="form-control"  type="number" name="wn[]"> \
        </div> \
      </div> \
      <div class="col-5 col-lg-4"> \
        <div class="input-group input-group-static mb-4"> \
          <input class="form-control"  type="number" name="xn[]"> \
        </div> \
      </div> \
      <div class="col-2 col-lg-2 text-center"> \
        <button type="button" class="clear btn btn-light"><i class="fas fa-times"></i></button> \
      </div> \
    </div>';
    $('#appendForm').append(html);
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
