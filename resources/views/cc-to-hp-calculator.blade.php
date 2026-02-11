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
                        <select id="unitSource" class="form-select p-2 rounded-0" required>
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
<section class="container mt-md-5 mt-3">
    <h2 class="fw-bold mb-3">Ultimate CC to HP Calculator: Engine Displacement Explained</h2>
    <p>
        Whether you are looking at a lawnmower, a motorcycle, or a car, understanding how engine size (CC) relates to power output (HP) is crucial. While there is no perfect "one-size-fits-all" conversion, our guide provides the most accurate estimation models used by automotive experts.
    </p>

    <div class="row mt-4">
        <div class="col-md-12">
            <h3>The Reality of CC vs. Horsepower</h3>
            <p><strong>Cubic Centimeters (CC)</strong> measure the volume or size of the engine (displacement). <strong>Horsepower (HP)</strong> measures the work or power the engine produces.</p>
            <p>The reason a 1000cc motorcycle can have 200 HP while a 1000cc economy car might only have 70 HP is due to efficiency, RPM, and tuning.</p>
            
        </div>
    </div>

    <div class="mt-4">
        <h3>1. The Estimation Formulas</h3>
        <p>Most basic calculators use a "rule of thumb" (CC/15). For better accuracy, use the formula that matches your engine type:</p>
        
        <div class="row g-3">
            <div class="col-md-4">
                <div class="p-3 border rounded" style="background:#eefbf3;";>
                    <h5 class="fw-bold">Small Utility Engines</h5>
                    <p class="small text-muted">Lawnmowers, Snowblowers</p>
                    <p class="mb-0"><strong>Formula:</strong> HP = CC / 30 to 32</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 border rounded" style="background:#eefbf3;";>
                    <h5 class="fw-bold">Standard Vehicles</h5>
                    <p class="small text-muted">Passenger Cars & Commuter Bikes</p>
                    <p class="mb-0"><strong>Formula:</strong> HP = CC / 15 to 17</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 border rounded" style="background:#eefbf3;";>
                    <h5 class="fw-bold">High-Performance</h5>
                    <p class="small text-muted">Sportbikes & Racing Engines</p>
                    <p class="mb-0"><strong>Formula:</strong> HP = CC / 5 to 7</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h3>2. Advanced Comparison Table</h3>
        <div class="table-responsive">
            <table class="table mt-2 px-0" style="background:#eefbf3";>
                <thead class="table-success px-0">
                    <tr>
                        <th class="px-2">Engine Type</th>
                        <th class="px-2">Displacement (CC)</th>
                        <th class="px-2">Estimated HP Range</th>
                        <th class="px-2">Common Examples</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Small Utility</td>
                        <td>50cc - 200cc</td>
                        <td>2 - 6 HP</td>
                        <td>Lawnmowers, Weed Whackers</td>
                    </tr>
                    <tr>
                        <td>Scooters/Small Bikes</td>
                        <td>125cc - 250cc</td>
                        <td>8 - 25 HP</td>
                        <td>Honda Grom, Yamaha Zuma</td>
                    </tr>
                    <tr>
                        <td>Compact Cars</td>
                        <td>1000cc - 1600cc</td>
                        <td>70 - 130 HP</td>
                        <td>Ford Fiesta, Honda Fit</td>
                    </tr>
                    <tr>
                        <td>Sport Motorcycles</td>
                        <td>600cc - 1000cc</td>
                        <td>100 - 200 HP</td>
                        <td>Kawasaki Ninja, Yamaha R1</td>
                    </tr>
                    <tr>
                        <td>Performance Cars</td>
                        <td>2000cc (Turbo)</td>
                        <td>250 - 350 HP</td>
                        <td>VW Golf R, Subaru STI</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-md-5 mt-3">
        <h3>3. Factors That "Break" the Formula</h3>
        <p>If your vehicle doesn't fit these numbers, it’s likely due to one of these factors:</p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Forced Induction (Turbo/Superchargers):</strong> A turbocharger forces more air into the cylinders, allowing a small engine to produce massive power.</li>
            <li class="list-group-item"><strong>RPM (Revolutions Per Minute):</strong> Engines that spin faster (like F1 or Sportbikes) produce more HP despite low CC.</li>
            <li class="list-group-item"><strong>2-Stroke vs. 4-Stroke:</strong> 2-stroke engines fire twice as often, usually offering more power per CC.</li>
        </ul>
    </div>

    <div class="my-md-5 my-3 p-4 border rounded bg-white shadow-sm">
        <h3 class="mb-3">Frequently Asked Questions (FAQ)</h3>
        <div class="mb-3">
            <p class="fw-bold mb-1">Can I increase my HP without increasing my CC?</p>
            <p class="text-muted">Yes. Through "tuning," you can improve air intake, upgrade exhaust systems, or remap the engine's ECU.</p>
        </div>
        <div class="mb-3">
            <p class="fw-bold mb-1">Why does my 2000cc Diesel have less HP than a 2000cc Gasoline engine?</p>
            <p class="text-muted">Diesels are designed for Torque (pulling power) and lower RPMs, resulting in lower HP but higher towing capacity.</p>
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