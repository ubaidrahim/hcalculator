@extends('layouts.layout')

@section('title','CC to HP Calculator')
@section('headsection')
<link rel="canonical" href="https://hcalculator.com/cc-to-hp-calculator" />
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        {{-- Breadcrumb --}}
        <div class="mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">CC to HP Calculator</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow-lg p-4">
            <h1 class="text-center mb-4">Engine Displacement & Power Converter</h1>
            <form id="hpCcForm">
                @csrf
                <div class="row">
                    {{-- Input Value --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Value:</label>
                        <input type="number" step="any" id="inputValue" class="form-control rounded-0 border-bottom" placeholder="e.g. 22" required>
                    </div>
                    {{-- Unit Selection --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Convert From:</label>
                        <select id="unitSource" class="form-select p-2" required>
                            <option value="hp_to_cc">Horsepower (HP) to CC</option>
                            <option value="cc_to_hp">Cubic Centimeters (CC) to HP</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex w-100 mt-3">
                    <button type="submit" class="btn btn-primary flex-fill me-1">Calculate Estimates</button>
                    <button type="button" id="resetBtn" class="btn btn-secondary flex-fill ms-1">Reset</button>
                </div>
            </form>
            {{-- Result Box --}}
            <div id="resultArea" class="mt-4 d-none">
                <h4 class="mb-3 text-center fw-bold">Estimated Results:</h4>
                <div class="table-responsive">
                    <table class="table border p-4 rounded" style="background:#eefbf3; border-color:#21c285";>
                        <thead class="table-success">
                            <tr>
                                <th>Engine Type</th>
                                <th>Result</th>
                                <th>Range</th>
                                <th>Factor Used</th>
                            </tr>
                        </thead>
                        <tbody id="resultTableBody">
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="container mt-5">
    <h2>Understanding HP to CC Conversion</h2>
    <p>Engine displacement (cc) aur horsepower (HP) ka koi fix formula nahi hota kyunke ye engine ki design, RPM, aur fuel type par depend karta hai. Neeche diye gaye factors aam taur par industry mein estimation ke liye use hotay hain:</p>
    <div class="row">
        <div class="col-md-6">
            <h3>Common Conversion Factors</h3>
            <ul>
                <li><strong>Performance Engines:</strong> 15–17 cc per HP</li>
                <li><strong>Standard 4-Stroke:</strong> 22–25 cc per HP</li>
                <li><strong>Utility Engines:</strong> 32–35 cc per HP</li>
            </ul>
        </div>
    </div>
</section>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('hpCcForm');
    const resultArea = document.getElementById('resultArea');
    const tableBody = document.getElementById('resultTableBody');
    const resetBtn = document.getElementById('resetBtn');

    const engines = [
        { name: "Higher-performance gasoline", factor: 16, range: [15, 17], desc: "Kart / race builds" },
        { name: "Small 4-stroke (Tuned)", factor: 23.5, range: [22, 25], desc: "Modern EFI engines" },
        { name: "Small 4-stroke (Utility)", factor: 33.5, range: [32, 35], desc: "Lawn mowers / Generators" },
        { name: "2-stroke (Rule-of-thumb)", factor: 12.5, range: [10, 15], desc: "Broad estimate" },
        { name: "Sport/High-rev Engine", factor: 5.5, range: [4.5, 7], desc: "Motorcycles" }
    ];
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const val = parseFloat(document.getElementById('inputValue').value);
        const mode = document.getElementById('unitSource').value;
        
        tableBody.innerHTML = ""; 
        engines.forEach(eng => {
            let res, rMin, rMax, unitLabel;
            if (mode === 'hp_to_cc') {
                res = (val * eng.factor).toFixed(0);
                rMin = (val * eng.range[0]).toFixed(0);
                rMax = (val * eng.range[1]).toFixed(0);
                unitLabel = "cc";
            } else {
                res = (val / eng.factor).toFixed(2);
                rMin = (val / eng.range[1]).toFixed(2);
                rMax = (val / eng.range[0]).toFixed(2);
                unitLabel = "HP";
            }
            const row = `<tr>
                <td><strong>${eng.name}</strong><br><small class="text-muted">${eng.desc}</small></td>
                <td><span class="badge bg-primary fs-6">${res} ${unitLabel}</span></td>
                <td>${rMin} - ${rMax} ${unitLabel}</td>
                <td>${eng.factor} cc/HP</td>
            </tr>`;
            tableBody.innerHTML += row;
        });
        resultArea.classList.remove('d-none');
    });
    resetBtn.addEventListener('click', () => {
        form.reset();
        resultArea.classList.add('d-none');
    });
});
</script>
@endsection