@extends('layouts.layout')
@section('title','Fermats Little Theorem Calculator ')
@section('meta-description','Online calculator to determine Fermat\'s Little Theorem validity. Identify prime numbers quickly and simplify modular arithmetic calculations. Try it now!')
@section('headsection')
<link rel="canonical" href="https://hcalculator.com/fermats-little-theorem-calculator" />
@endsection
@section('content')
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="mb-4 w-100 w-md-50 w-lg-25">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Fermat's Little Theorem</li>
            </ol>
          </nav>
        </div>
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 me-auto">
                <h1 class="text-dark pt-1 mb-0">Fermat's Little Theorem</h1>
              </div>
            </div>
          </div>
          {{-- <div class="tab-content tab-space">
            <div class="tab-pane active" id="preview-forms-simple">

            </div>
          </div> --}}
          <div class="container">
            <form id="calculatorForm" action="{{ url('/fermats-little-theorem-calculator') }}" method="post">
              @csrf
            <div class="row justify-content-center py-2">
              <div class="col-lg-12">
                <div class="mb-4 text-center">
                  {{-- <p class="lead mb-0">Enter the engine horsepower of a car and select the drive system to find its wheel horsepower.</p> --}}
                </div>
              </div>
              <div class="col-lg-4">

                <div class="input-group input-group-static mb-4">
                  <label>Enter an Integer (a)</label>
                  <input class="form-control" placeholder="a" min="2" step="1" value="2" type="number"  name="a">
                </div>
                <div class="input-group input-group-static mb-4">
                  <label>Enter a Prime Number (p)</label>
                  <input class="form-control" placeholder="p" min="3" step="1" value="7" type="number" name="p">
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
          {{-- <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <a href="{{ url('/whp-to-hp-calculator') }}" class="btn bg-gradient-secondary shadow-primary">WHP to HP Calculator</a>
              </div>
            </div>
          </div> --}}
          <div class="container border">

            <div class="row">
              <div class="col-lg-12">
                <h2>Fermat's Little Theorem Calculator: How does it work?</h2>
                <p class="lead">Fermat's Little Theorem states that if p is a prime number and a is an integer such that <i>a</i> is not divisible by <i>p</i>, then <i>a^(p-1) ≡ 1 (mod p)</i>. As a result, if you multiply a by (p-1) and divide it by p, you get 1 as the remainder.</p>
                <p>Fermat's Little Theorem can be verified using a calculator as follows:</p>
                <p>Let's say we want to verify that the theorem holds for a = 3 and p = 7. Using the calculator, we can calculate <i>3^(7-1) % 7</i>:</p>
                <i class="lead">3<sup>(7-1)</sup> % 7 = 3<sup>6</sup> % 7 = 729 % 7 = 9 % 7 = 2</i>
                <p>Since the remainder is not 1, Fermat's Little Theorem does not hold for these values of <i>p</i> and <i>a</i>.</p>
                <p>If we try a different value of <i>a</i>, such as <i>a = 2</i>, we can verify that the theorem does hold:</p>
                <i class="lead">2<sup>(7-1)</sup> % 7 = 2<sup>6</sup> % 7 = 64 % 7 = 1</i>
                <p>The remainder is 1, as the theorem predicts.</p>
                <p>You can check Fermat's Little Theorem for other values of p and a using a similar process. Make sure you use a calculator or computer program that can handle large exponents and remainders.</p>
                {{-- <ul>
                  <li>Where <b>WHP</b> represents a wheel horsepower</li>
                  <li><b>EHP</b> stands for engine horsepower</li>
                  <li><b>LF</b> is the drive train loss factor
                    <ul>
                      <li>front wheel drive = 1.1</li>
                      <li>rear wheel drive = 1.15</li>
                      <li>all wheel drive = 1.2</li>
                    </ul>
                  </li>
                </ul> --}}
              </div>
              <div class="col-lg-12">
                <h2>What are the real life applications of Fermat's little theorem?</h2>
                <p>Fermat's little theorem is a fundamental result in number theory that states that if p is a prime number and a is any integer, then <i>a<sup>p</sup> ≡ a (mod p)</i>. This means that the remainder of the division of a^p by p is always equal to a.</p>
                <p>There are a number of applications and implications of Fermat's little theorem. The following are a few examples:</p>
                <ol>
                    <li><b>Primality testing:</b> One way to determine whether a number is prime is to check whether it satisfies Fermat's Little Theorem. If a^p ≡ a (mod p) for all values of a, then p is likely to be a prime number.</li>
                    <li><b>Modular arithmetic:</b> Fermat's little theorem can be used to perform modular arithmetic, which is a system of arithmetic in which all numbers "wrap around" after a certain value. This can be useful for calculating large numbers or for working with numbers in a computer, where the range of possible values is limited.</li>
                    <li><b>Cryptography:</b> Fermat's little theorem is also used in some cryptographic systems, such as the RSA algorithm, which is widely used to secure internet communications.</li>
                    <li><b>Other applications:</b> Fermat's little theorem also has applications in other areas of mathematics, such as group theory and algebraic geometry. It is also used in some algorithms for efficiently solving problems in computer science, such as the Pollard-Rho algorithm for integer factorization.</li>
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
    console.log(data,method,url);
    $.ajax({
      url : url,
      method: method,
      data : data,
      success: function(data){
        //console.log(data);
        var html = '<div class="alert alert-dark text-white font-weight-bold" >'+data.response+'</div>';
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
