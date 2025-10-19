@extends('layouts.layout')
@section('title','De Moivre\'s Theorem Calculator - Free Online Tool')
@section('meta-description','Free Online De Moivre\'s Theorem Calculator that calculates the powers of complex numbers. Quick, accurate results every time. Calculate now!')
@section('headsection')
<link rel="canonical" href="https://hcalculator.com/demoivres-theorem-calculator" />
@endsection
@section('content')
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="mb-4 w-100 w-md-50 w-lg-25">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">De Moivre's Theorem</li>
            </ol>
          </nav>
        </div>
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 me-auto">
                <h1 class="text-dark pt-1 mb-0">De Moivre's Teorem</h1>
              </div>
            </div>
          </div>
          {{-- <div class="tab-content tab-space">
            <div class="tab-pane active" id="preview-forms-simple">

            </div>
          </div> --}}
          <div class="container">
            <form id="calculatorForm" action="{{ url('/demoivres-theorem-calculator') }}" method="post">
              @csrf
            <div class="row justify-content-center py-2">
              <div class="col-lg-12">
                <div class="mb-4 text-center">
                  {{-- <p class="lead mb-0">Enter the engine horsepower of a car and select the drive system to find its wheel horsepower.</p> --}}
                </div>
              </div>
              <div class="col-lg-4">

                <div class="input-group input-group-static mb-4">
                  <label>Enter value for <i>n</i></label>
                  <input class="form-control" min="1" step="1" type="number"  name="n">
                </div>
                <div class="input-group input-group-static mb-4">
                  <label>Enter value for <i>x<sub>1</sub></i></label>
                  <input class="form-control" step="1" type="number" name="x1">
                </div>
                <div class="input-group input-group-static mb-4">
                  <label>Enter value for <i>x<sub>2</sub></i></label>
                  <input class="form-control" step="1" type="number" name="x2">
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
          <div class="container border">

            <div class="row">
              <div class="col-lg-12">
                <h2>De Moivre's Theorem Formula:</h2>
                <p class="lead">The de Moivre theorem explains how to calculate the powers of complex numbers.</p>
                <p>For any complex number x and any integer n,</p>
                <i class="lead">(cos x + i sin x)n = cos(nx) + isin (nx)</i>
                <h2>How to Use De Moivre’s Theorem Calculator?</h2>
                <ol>
                  <li>Enter the complex number z into the calculator. Complex numbers are typically written in the form <b>a + b<i>i</i></b>, where a is the real part and b is the imaginary part. For example, the complex number <b>3 + 4<i>i</i></b> would be entered as <b>3+4<i>i</i></b>.</li>
                  <li>Enter the positive integer <b>n</b> into the calculator. This is the power to which you want to raise the complex number <b>z</b>.</li>
                  <li>Click the <b>"Calculate"</b> button to compute <b>(z<sup>n</sup>)</b> based on De Moivre's Theorem.</li>
                  <li>The calculator will display the result in both polar and rectangular form. The polar form of a complex number is written as <i>(r, θ)</i>, where <b>r</b> is the modulus <i>(magnitude)</i> of the number and <i>θ</i> is the argument <i>(angle)</i> in polar coordinates. The rectangular form of a complex number is written as <b>a + b<i>i</i></b>, where <b>a</b> is the real part and <b>b</b> is the imaginary part.</li>
                </ol>
                <p>For example, if you entered the complex number <b>3 + 4<i>i</i></b> and the integer 3 into the calculator, the result would be displayed as <b>(5, 0.93)</b> in polar form and -7+24i in rectangular form.</p>

              </div>
              <div class="col-lg-12">
                <h2>Uses of De Moivre's Theorem</h2>
                <p>De Moivre's Theorem is a useful mathematical result that has a number of applications in various fields. Some of the key uses of De Moivre's Theorem include:</p>
                <ol>
                    <li><b>Complex number manipulation: </b>De Moivre's Theorem allows us to easily perform calculations involving complex numbers, such as raising them to a power or finding their roots.</li>
                    <li><b>Trigonometry: </b>De Moivre's Theorem can be used to derive trigonometric identities and to simplify complex trigonometric expressions.</li>
                    <li><b>Eigenvalues and eigenvectors: </b>In linear algebra, De Moivre's Theorem is used to find the eigenvalues and eigenvectors of matrices.</li>
                    <li><b>Signal processing: </b>De Moivre's Theorem is used in the analysis and processing of signals, such as audio and image signals.</li>
                    <li><b>Quantum mechanics: </b>De Moivre's Theorem is used in the study of quantum mechanics to describe the behavior of particles and systems at the atomic and subatomic level.</li>
                    <li><b>Other fields: </b>De Moivre's Theorem has applications in various other fields, including engineering, computer science, and economics.</li>
                </ol>
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
        var html = '<div class="alert alert-dark text-white" >'+data.response+'</div>';
        $('#response').html(html);
      },
      error: (error) => {console.log(error)}
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
