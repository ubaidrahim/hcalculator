@extends('layouts.layout')

@section('title','Critical Speed Calculator')
@section('headsection')
<link rel="canonical" href="https://hcalculator.com/critical-speed-calculator" />
@endsection

@section('content')
<div class="container mt-5">
  <div class="row">

      {{-- Breadcrumb --}}
      <div class="mb-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Critical Speed Calculator</li>
          </ol>
        </nav>
      </div>

        {{-- Main Calculator Card --}}
          <div class="card shadow-lg p-4">
            <h3 class="text-center mb-4">Critical Speed Calculator (Nc)</h3>

            <form id="criticalForm" method="POST">
              @csrf

              {{-- Unit Selection --}}
              <div class="mb-3">
                <label class="form-label">Select Unit:</label>
                <select name="unit" class="form-select" required  style="padding: 0.5rem 1rem 0.5rem 0.5rem">
                   <option value="in">Inches (in)</option>
                  <option value="mm">Millimeters (mm)</option>
                 
                </select>
              </div>

              {{-- Diameter & Length in one row --}}
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Root Diameter (d) <span id="diameter-unit">(in)</span></label>
                  <input type="number" step="any" name="diameter" class="form-control rounded-0 border-bottom" required style="padding: 0.5rem 1rem 0.5rem 0.5rem">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Distance Between Bearings (L) <span id="length-unit">(in)</span></label>
                  <input type="number" step="any" name="length" class="form-control rounded-0 border-bottom" required style="padding: 0.5rem 1rem 0.5rem 0.5rem">
                </div>
              </div>

              {{-- Boundary Condition --}}
              <div class="mb-3">
                <label class="form-label">End Fixity:</label>
        <select name="condition" class="form-select" required style="padding: 0.5rem 1rem 0.5rem 0.5rem">
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select>


              </div>

              {{-- Buttons --}}
         <div class="d-flex w-100">
  <button type="submit" class="btn btn-primary flex-fill me-1">Calculate</button>
  <button type="button" id="resetBtn" class="btn btn-secondary flex-fill ms-1">Reset</button>
</div>


            </form>

            {{-- Result Box --}}
            <div id="resultBox" class="alert text-center mt-4 d-none" style="background:#eefbf3; border-color:#21c285;">
              <strong>Critical Speed (Nc):</strong> <span id="rpmResult"></span>
            </div>

          </div>
        </div>
      </div>

    </div>

<section class="critical-speed-info container mt-4">
  <h2>Critical Speed Calculator Overview</h2>
  <p>
    This calculator estimates the first critical (whirling) speed of a rotating shaft — 
    the speed at which the shaft begins to vibrate due to resonance.
     It helps engineers and designers ensure that operating speeds remain well below the natural frequency of the shaft to prevent 
     vibration and potential failure.
  </p>

  <h3>How It Works</h3>
  <p>
    The critical speed <strong>N<sub>c</sub></strong> is determined using the relationship between the shaft’s stiffness, 
    mass, and boundary conditions:
  </p>
<p class="text-center my-3">
    <img src="{{ asset('assets/img/formula.PNG') }}" 
         alt="Critical Speed Formula" 
         class="img-fluid" 
         style="max-width: 400px;">
</p>


  <p><strong>Where:</strong></p>
  <ul>
    <li><strong>d</strong> = Shaft root diameter (m)</li>
    <li><strong>L</strong> = Distance between bearings (m)</li>
    <li><strong>E</strong> = Modulus of elasticity (Pa)</li>
    <li><strong>ρ</strong> = Density of material (kg/m³)</li>
    <li><strong>β<sub>1</sub></strong> = End fixity constant, based on support type</li>
  </ul>

  <h3>End Fixity Options</h3>
  <p>
    The calculator adjusts the result using a fixity factor (F) to account for different bearing and support conditions:
  </p>
<div class="table-responsive">
  <table border="1" cellpadding="8" style="border-collapse: collapse;">
    <thead>
      <tr>
        <th>Option</th>
        <th>End Condition</th>
        <th>Factor (F)</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>A</td>
        <td>Fixed–Free (Cantilever)</td>
        <td>0.36</td>
        <td>Lowest stiffness; one end fixed, one free</td>
      </tr>
      <tr>
        <td>B</td>
        <td>Simply Supported</td>
        <td>1.00</td>
        <td>Both ends supported but free to rotate</td>
      </tr>
      <tr>
        <td>C</td>
        <td>Fixed–Pinned</td>
        <td>1.47</td>
        <td>One end fixed, one pinned</td>
      </tr>
      <tr>
        <td>D</td>
        <td>Fixed–Fixed</td>
        <td>2.23</td>
        <td>Both ends fixed; highest stiffness</td>
      </tr>
    </tbody>
  </table>
</div>
  <h3>Output</h3>
  <p>
    The calculator provides the critical speed in revolutions per minute (rpm).
    It assumes a uniform solid shaft, operating in its first bending mode, and is suitable for quick design checks or educational purposes.
  </p>
</section>

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
