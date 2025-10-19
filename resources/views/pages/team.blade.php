@extends('layouts.layout')
@section('title','Our Team')
@section('meta-description','')
@section('headsection')

@endsection
@section('content')
<section class="pb-5 position-relative bg-gradient-dark mx-n3">
      <div class="container">
        <div class="row">
          <div class="col-md-8 text-start mb-5 mt-5">
            <h3 class="text-white z-index-1 position-relative">The Executive Team</h3>
            <p class="text-white opacity-8 mb-0">
              We design and verify online calculators using documented formulas, worked examples, and routine accuracy checks.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-12">
            <div class="card card-profile mt-4 h-100">
              <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                  <a href="javascript:;">
                    <div class="p-3 pe-md-0">
                      <img class="w-100 border-radius-md shadow-lg" src="{{ asset('assets/img/team/hasnain.jpg') }}" alt="image">
                    </div>
                  </a>
                </div>
                <div class="col-lg-8 col-md-6 col-12 my-auto">
                  <div class="card-body ps-lg-0">
                    <h5 class="mb-0">Hasnain Shafique</h5>
                    <h6 class="text-info">Founder & Editorial Lead</h6>
                    <p class="mb-0">
                      Leads product direction and calculator accuracy. Builds and maintains the calculation engine and user experience, and sets our editorial standards for clarity and correctness.
                    </p>
                  </div>
                </div>
              </div>
              <div class="row ms-4 me-4">
                <div class="col-lg-12 col-md-12 col-12">
                  <h5>Editorial & Accuracy</h5>
                  <p class="mb-0">
                    Hasnain reviews new or updated formulas on a regular schedule
                  </p>
                  <p></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="card card-profile mt-4 h-100">
              <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                  <a href="javascript:;">
                    <div class="p-3 pe-md-0">
                      <img class="w-100 border-radius-md shadow-lg" src="{{ asset('assets/img/team/ubaid.jpg') }}" alt="image">
                    </div>
                  </a>
                </div>
                <div class="col-lg-8 col-md-6 col-12 my-auto">
                  <div class="card-body ps-lg-0">
                    <h5 class="mb-0">Ubaid Rahim</h5>
                    <h6 class="text-info">Lead Engineer, Calculator Platform</h6>
                    <p class="mb-0">
                      Implements interface and performance improvements. Validates formulas with sample cases and automated checks, and maintains front-end quality and accessibility.
                    </p>

                  </div>
                </div>
              </div>
              <div class="row ms-4 me-4">
                <div class="col-lg-12 col-md-12 col-12">
                  <h5>Editorial & Accuracy</h5>
                  <p class="mb-0">
                    Ubaid verifies outputs against test cases before publishing changes.
                  </p>
                  <p></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 text-start my-5">
            <p class="text-white opacity-8 mb-0">
              Based in Pakistan • Media & partnerships: <a href="mailto:contact@hcalculator.com" class="text-white">contact@hcalculator.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>
@endsection