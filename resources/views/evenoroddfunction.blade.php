@extends('layouts.layout')
@section('title','Even or Odd Function Calculator')
@section('meta-description','')

@section('content')
<style>
  .content-section h5 {
    color: #005999;
    margin-top: 25px;
    border-bottom: 2px solid #0077cc;
    padding-bottom: 4px;
  }
  .example-box {
    background-color: #eef5ff;
    border-left: 4px solid #0077cc;
    padding: 10px 15px;
    margin: 10px 0;
    border-radius: 5px;
  }
  code {
    background-color: #f8f9fa;
    padding: 2px 5px;
    border-radius: 3px;
    font-family: Consolas, monospace;
  }
</style>
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="mb-4 w-100 w-md-50 w-lg-25">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Even or Odd Function Calculator</li>
            </ol>
          </nav>
        </div>
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row justify-space-between py-2">
              <div class="col-lg-12 me-auto">
                <h1 class="text-dark pt-1 mb-0">Even or Odd Function Calculator</h1>
              </div>
            </div>
          </div>
          {{-- <div class="tab-content tab-space">
            <div class="tab-pane active" id="preview-forms-simple">

            </div>
          </div> --}}
          <div class="container">
          <form id="calculatorForm" action="{{ url('/even-or-odd-fun') }}" method="post">
  @csrf
  <div class="input-group input-group-static mb-4">
    <label>Function F(x) = or Y = :</label>
    <input class="form-control"
          id="expression"
           placeholder="f(x)=2x^2-3"
           type="text"
           name="expression"
           value="{{ old('expression', $expression) }}"
           autocomplete="off"
           required>
  </div>
  <div class="d-flex justify-content-center flex-wrap">
    <button type="button" class="btn btn-outline-secondary functionbtn" data-function="sin(x)">sin(x)</button>
    <button type="button" class="btn btn-outline-secondary functionbtn" data-function="cos(x)">cos(x)</button>
    <button type="button" class="btn btn-outline-secondary functionbtn" data-function="tan(x)">tan(x)</button>
    <button type="button" class="btn btn-outline-secondary functionbtn" data-function="abs(x)">abs(x)</button>
    <button type="button" class="btn btn-outline-secondary functionbtn" data-function="exp(x,2)">exp(x,2)</button>
    <button type="button" class="btn btn-outline-secondary functionbtn" data-function="log(x,2)">log(x,2)</button>
    <button type="button" class="btn btn-outline-secondary functionbtn" data-function="sqrt(x)">sqrt(x)</button>
    <button type="button" class="btn btn-outline-secondary functionbtn" data-function="pow(x,2)">pow(x,2)</button>
    <button type="button" class="btn btn-outline-secondary functionbtn" data-function="floor(x)">floor(x)</button>
    <button type="button" class="btn btn-outline-secondary functionbtn" data-function="ceil(x)">ceil(x)</button>
  </div>

  <button type="submit" id="check" class="btn bg-gradient-primary w-100">
    Check
  </button>
</form>

<div id="response" class="text-center mt-3"></div>
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
                <a href="{{ url('/even-or-odd-fun') }}" class="btn bg-gradient-secondary shadow-primary">Even Odd Function Calculator</a>
              </div>
            </div>
          </div>
          <div class="container border">

            <div class="row">
              <div class="col-lg-12">
                <h2>Even Odd Function calculator Formula</h2>
                <p class="lead">An online even or odd function calculator will help you to identify a certain function is even, odd, or neither function. Usually, the sign of values in the function did not matter during the calculation of function values, and only half values in the domain will be used. In this article, we will look at the definitions, properties, and how to find if a function is even or odd.</p>
                <h3>What is an Even, Odd, or Neither Function?</h3>
                <br><br>
<h4>Understanding Even, Odd, or Neither Functions</h4>

<div class="content-section">
  <h5>🔹 Even Function</h5>
  <p>
    A function <code>f(x)</code> is <strong>even</strong> if it satisfies:
    <br><code>f(-x) = f(x)</code>
  </p>
  <p><strong>Graphical meaning:</strong> Even functions are <em>symmetric about the y-axis</em>.</p>

  <div class="example-box">
    <strong>Examples:</strong>
    <ul>
      <li><code>f(x) = x²</code></li>
      <li><code>f(x) = |x|</code></li>
      <li><code>f(x) = cos(x)</code></li>
    </ul>
    <p><strong>Why?</strong> For <code>f(x) = x²</code>: <code>f(-x) = (-x)² = x² = f(x)</code></p>
  </div>

  <h5>🔹 Odd Function</h5>
  <p>
    A function <code>f(x)</code> is <strong>odd</strong> if it satisfies:
    <br><code>f(-x) = -f(x)</code>
  </p>
  <p><strong>Graphical meaning:</strong> Odd functions are <em>symmetric about the origin</em>.</p>

  <div class="example-box">
    <strong>Examples:</strong>
    <ul>
      <li><code>f(x) = x³</code></li>
      <li><code>f(x) = sin(x)</code></li>
      <li><code>f(x) = x</code></li>
    </ul>
    <p><strong>Why?</strong> For <code>f(x) = x³</code>: <code>f(-x) = (-x)³ = -x³ = -f(x)</code></p>
  </div>

  <h5>🔹 Neither</h5>
  <p>
    If a function is <strong>neither even nor odd</strong>, it doesn’t have either symmetry property.
  </p>

  <div class="example-box">
    <strong>Example:</strong>
    <p><code>f(x) = x² + x</code></p>
    <ul>
      <li><code>f(-x) = (-x)² + (-x) = x² - x</code></li>
      <li><code>f(-x) ≠ f(x)</code> and <code>f(-x) ≠ -f(x)</code></li>
      <li>⇒ <strong>Neither</strong></li>
    </ul>
  </div>

  <h5>🔹 Summary Table</h5>
  <div class="table-responsive">
    <table class="table table-bordered text-center">
      <thead class="table-primary">
        <tr>
          <th>Type</th>
          <th>Condition</th>
          <th>Symmetry</th>
          <th>Examples</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Even</td>
          <td><code>f(-x) = f(x)</code></td>
          <td>y-axis</td>
          <td><code>x²</code>, <code>cos(x)</code>, <code>|x|</code></td>
        </tr>
        <tr>
          <td>Odd</td>
          <td><code>f(-x) = -f(x)</code></td>
          <td>Origin</td>
          <td><code>x³</code>, <code>sin(x)</code>, <code>x</code></td>
        </tr>
        <tr>
          <td>Neither</td>
          <td>Neither condition holds</td>
          <td>No symmetry</td>
          <td><code>x² + x</code>, <code>eˣ</code></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
$(document).on('click','.functionbtn',function(){
  let fun = $(this).attr('data-function');
  let exp = $('#expression').val();
  $('#expression').val(exp+fun);
});
$('#calculatorForm').on('submit', function(e) {
    e.preventDefault();

    var $form = $(this);
    var data = $form.serialize();
    var url = $form.attr('action');
    var method = $form.attr('method');

    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function(data) {
            var alertClass = data.error ? 'alert-danger' : 'alert-dark';
            var html = '<div class="alert ' + alertClass + ' text-white font-weight-bold">' +
                       data.response +
                       '</div>';
            $('#response').html(html);
        },
        error: function(xhr) {
            let msg = 'Something went wrong.';
            if (xhr.status === 422 && xhr.responseJSON?.errors?.expression) {
                msg = xhr.responseJSON.errors.expression[0];
            }
            $('#response').html(
                '<div class="alert alert-danger">' + msg + '</div>'
            );
        }
    });
});
</script>
@endsection
