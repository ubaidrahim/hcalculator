@extends('layouts.layout')
@section('title','About Us')
@section('meta-description','')
@section('headsection')

@endsection
@section('content')
<div class="card card-body blur shadow-blur mx-3 mx-md-4 mb-4 mt-4">
    <!-- START Testimonials w/ user image & text & info -->
    <section class="py-sm-7 py-5 position-relative">
      <div class="container">
        <div class="row">
          <div class="col-12 mx-auto">
            {{-- <div class="mt-n8 mt-md-n9 text-center">
              <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="../assets/img/bruce-mars.jpg" alt="bruce" loading="lazy">
            </div> --}}
            <div class="row py-5">
              <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h1 class="mb-0">About H Calculators</h1>
                  {{-- <div class="d-block">
                    <button type="button" class="btn btn-sm btn-outline-info text-nowrap mb-0">Follow</button>
                  </div> --}}
                </div>
                {{-- <div class="row mb-4">
                  <div class="col-auto">
                    <span class="h6">323</span>
                    <span>Posts</span>
                  </div>
                  <div class="col-auto">
                    <span class="h6">3.5k</span>
                    <span>Followers</span>
                  </div>
                  <div class="col-auto">
                    <span class="h6">260</span>
                    <span>Following</span>
                  </div>
                </div> --}}
                <p class="text-lg">
                  HCalculator is your go-to source for accurate and easy-to-use online calculators. Our mission is to provide reliable, user-friendly tools that simplify complex calculations, making them accessible for everyone—from students and professionals to everyday users.
                  {{-- <br><a href="javascript:;" class="text-info icon-move-right">More about me --}}
                    {{-- <i class="fas fa-arrow-right text-sm ms-1"></i> --}}
                  </a>
                </p>
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h3 class="mb-0">Our Story</h3>
                  {{-- <div class="d-block">
                    <button type="button" class="btn btn-sm btn-outline-info text-nowrap mb-0">Follow</button>
                  </div> --}}
                </div>
                <p class="text-lg">HCalculator was founded with a simple goal: to make high-quality, versatile calculators available to everyone for free. We believe that no one should struggle with calculations, whether for personal projects, education, or professional use.</p>
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h3 class="mb-0">Our Commitment</h3>
                  {{-- <div class="d-block">
                    <button type="button" class="btn btn-sm btn-outline-info text-nowrap mb-0">Follow</button>
                  </div> --}}
                </div>
                <p class="text-lg">We are committed to continually improving our calculators and expanding our offerings. Your feedback is valuable to us, and we are always here to help with any questions or suggestions.</p>
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h3 class="mb-0">Explore our Tools</h3>
                  {{-- <div class="d-block">
                    <button type="button" class="btn btn-sm btn-outline-info text-nowrap mb-0">Follow</button>
                  </div> --}}
                </div>
                <p class="text-lg">From basic arithmetic to specialized scientific calculations, HCalculator offers a wide range of tools to meet your needs. Explore our calculators and find out how we can help you solve your math problems quickly and accurately.</p>
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h3 class="mb-0">Contact Us</h3>
                  {{-- <div class="d-block">
                    <button type="button" class="btn btn-sm btn-outline-info text-nowrap mb-0">Follow</button>
                  </div> --}}
                </div>
                <p class="text-lg">We value your input and are here to help. If you have any questions, feedback, or need support, please feel free to reach out to us.</p>
                <p class="text-lg">Thank you for choosing HCalculator. We are here to help you calculate with confidence!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection