@extends('layouts.layout')

@section('title','Critical Calculator | Critical Speed Calculator')
@section('meta-description','Calculate critical speed easily using our free online Critical Calculator. Enter your shaft data, choose units, and get results instantly.')

@section('headsection')
<link rel="canonical" href="https://hcalculator.com/critical-calculator" />
@endsection

@section('content')
<div class="container-fluid mt-5">
  <div class="row">
    <div class="col-lg-12 mx-auto">

      {{-- Breadcrumb --}}
      <div class="mb-4 w-100 w-md-50 w-lg-25">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Critical Calculator</li>
          </ol>
        </nav>
      </div>

      <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
        <div class="container border-bottom">
          <div class="row justify-space-between py-2">
            <div class="col-lg-12 me-auto">
              <h1 class="text-dark pt-1 mb-0">Critical Speed Calculator</h1>
            </div>
          </div>
        </div>

        {{-- Main Calculator Card --}}
        <div class="container">
          <div class="card shadow p-4">
            <h3 class="text-center mb-4">Calculate Critical Speed (Nc)</h3>

            <form id="criticalForm" method="POST">
              @csrf

              {{-- Unit Selection --}}
              <div class="mb-3">
                <label class="form-label">Select Unit:</label>
                <select name="unit" class="form-select" required >
                   <option value="in">Inches (in)</option>
                  <option value="mm">Millimeters (mm)</option>
                 
                </select>
              </div>

              {{-- Diameter & Length in one row --}}
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Root Diameter (d) <span id="diameter-unit">(in)</span></label>
                  <input type="number" step="any" name="diameter" class="form-control rounded-0 border-bottom" required >
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Distance Between Bearings (L) <span id="length-unit">(in)</span></label>
                  <input type="number" step="any" name="length" class="form-control rounded-0 border-bottom" required>
                </div>
              </div>

              {{-- Boundary Condition --}}
              <div class="mb-3">
                <label class="form-label">End Fixity:</label>
        <select name="condition" class="form-select" required>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select>


              </div>

              {{-- Buttons --}}
              <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary w-50">Calculate</button>
                <button type="button" id="resetBtn" class="btn btn-secondary w-50">Reset</button>
              </div>
            </form>

            {{-- Result Box --}}
            <div id="resultBox" class="alert alert-success text-center mt-4 d-none">
              <strong>Critical Speed (Nc):</strong> <span id="rpmResult"></span>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

{{-- Script --}}
<script>
document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById('criticalForm');
  const resultBox = document.getElementById('resultBox');
  const rpmResult = document.getElementById('rpmResult');
  const resetBtn = document.getElementById('resetBtn');
  const unitSelect = document.querySelector('select[name="unit"]');
  const diaUnit = document.getElementById('diameter-unit');
  const lenUnit = document.getElementById('length-unit');

  // Update units dynamically
  unitSelect.addEventListener('change', function() {
    const selected = this.value === 'in' ? '(in)' : '(mm)';
    diaUnit.textContent = selected;
    lenUnit.textContent = selected;
  });

  // AJAX form submit
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(form);

    fetch("{{ url('/critical-calculator') }}", {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
        "Accept": "application/json"
      },
      body: formData
    })
    .then(response => {
      if (!response.ok) throw new Error("Network error");
      return response.json();
    })
    .then(data => {
      resultBox.classList.remove('d-none');
      rpmResult.textContent = data.rpm.toLocaleString() + ' RPM';
    })
    .catch(error => {
      console.error("Error:", error);
      alert("Something went wrong. Please try again.");
    });
  });

  // Reset form
  resetBtn.addEventListener('click', function() {
    form.reset();
    resultBox.classList.add('d-none');
    diaUnit.textContent = '(mm)';
    lenUnit.textContent = '(mm)';
  });
});
</script>
@endsection
