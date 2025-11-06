@extends('layouts.layout')

@section('headsection')
<link rel="canonical" href="https://hcalculator.com/grade-curve-calculator" />
@endsection

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-8 mx-auto">

<div class="container mt-5">
    <h2 class="text-center mb-4">Grade Curve Calculator</h2>

    <form id="curveForm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Total Test Population:</label>
        <input type="number" name="total_students" class="form-control rounded-0 border-bottom" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Highest Score:</label>
        <input type="number" name="highest_score" class="form-control rounded-0 border-bottom" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Lowest Score:</label>
        <input type="number" name="lowest_score" class="form-control rounded-0 border-bottom" required>
    </div>

  <div class="d-flex gap-2">
    <button type="submit" class="btn btn-success w-50 py-2">Calculate</button>
    <button type="reset" class="btn btn-danger w-50 py-2" onclick="document.getElementById('resultArea').innerHTML = '';">Clear</button>
</div>

</form>

<div id="resultArea" class="mt-4"></div>

</div>

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
