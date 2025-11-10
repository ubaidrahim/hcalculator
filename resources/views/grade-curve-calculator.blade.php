@extends('layouts.layout')

@section('title','Grade Curve Calculator')
@section('headsection')
<link rel="canonical" href="https://hcalculator.com/grade-curve-calculator" />
@endsection

@section('content')
<div class="container mt-5">
  <div class="row">
{{-- Breadcrumb --}}
      <div class="mb-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Grade Curve Calculator</li>
          </ol>
        </nav>
      </div>

<div class="card shadow-lg p-4">
    <h1 class="text-center mb-4">Grade Curve Calculator</h1>

    <form id="curveForm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Total Test Population:</label>
        <input type="number" name="total_students" class="form-control rounded-0 border-bottom" required>
    </div>

   <div class="d-flex gap-4">
     <div class="w-50 mb-md-4 mb-3">
        <label class="form-label">Highest Score:</label>
        <input type="number" name="highest_score" class="form-control rounded-0 border-bottom" required>
    </div>

    <div class="w-50 mb-md-4 mb-3">
        <label class="form-label">Lowest Score:</label>
        <input type="number" name="lowest_score" class="form-control rounded-0 border-bottom" required>
    </div>
   </div>

  <div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary w-50 py-2 m-0">Calculate</button>
    <button type="reset" class="btn btn-secondary w-50 py-2 m-0" onclick="document.getElementById('resultArea').innerHTML = '';">Clear</button>
</div>

</form>

<div id="resultArea" class="mt-4"></div>

</div>
  </div>
</div>



<section class="critical-speed-info container mt-4">
  <h2>Grade Curve Calculator Overview</h2>
  <p>
   This calculator helps you assign letter grades based on a <strong>normal distribution curve</strong>,
    ensuring a balanced and statistically fair spread of results across a class.
    It’s designed for educators and institutions that use relative grading rather than absolute score thresholds.
  </p>

  <h3>How It Works</h3>
  <p>
   By entering the <strong>total number of students</strong>, the <strong>highest score</strong>, and the <strong>lowest score</strong>, the calculator determines the full score range and divides it into grade intervals (A–F).
 Grades are allocated according to the standard normal distribution model:
 <br>
 <strong>A = 2%, B = 14%, C = 68%, D = 14%, F = 2%.</strong>
 <p>This approach assumes that most students achieve around the average score (Grade C), 
    with fewer students earning very high (A) or very low (F) marks — similar to a bell-shaped curve.
</p>

  <h3>Output</h3>
  <p>
    The results display the number of students and score range for each grade category, helping visualize the performance spread across the class.
 It’s a quick, transparent way to model curved grading and maintain fairness across varying levels of exam difficulty.
  </p>
</section>
<script>
document.getElementById('curveForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("{{ route('grade-curve-calculator') }}", {
        method: "POST",
        body: formData,
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": document.querySelector('input[name=_token]').value
        }
    })
    .then(res => res.json())
    .then(data => {
        let output =
        `<div class="border p-4 rounded" style="background:#eefbf3; border-color:#21c285;">
            <h4 class="text-center fw-bold">${data.total} students</h4>
            <p class="text-center">Score range: ${data.low} – ${data.high}</p>
            <p class="text-center text-primary">
                • Assumes normal distribution (A 2%, B 14%, C 68%, D 14%, F 2%)
            </p>

            <table class="table table-bordered text-center">
                <thead class="table-success">
                    <tr>
                        <th>GRADE</th>
                        <th>STUDENTS</th>
                        <th>SCORE RANGE</th>
                    </tr>
                </thead>
                <tbody>`;

        Object.entries(data.results).forEach(([grade, value]) => {
            output += `
                <tr>
                    <td>${grade}</td>
                    <td>${value.students}</td>
                    <td>${value.range[0]} – ${value.range[1]}</td>
                </tr>`;
        });

        output += `</tbody></table></div>`;
        document.getElementById('resultArea').innerHTML = output;
    })
    .catch(error => console.log(error));
});
</script>

@endsection
