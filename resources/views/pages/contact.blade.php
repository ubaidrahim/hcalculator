@extends('layouts.layout')
@section('title','Contact Us')
@section('meta-description','')
@section('headsection')

@endsection
@section('content')
<section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
            <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" >
                <img src="{{ asset('assets/img/contact-us.png') }}" class="img-fluid">
            </div>
          </div>
          <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card d-flex blur justify-content-center shadow-lg mt-3 mb-3">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg p-3">
                  <h3 class="text-white text-primary mb-0">Contact us</h3>
                </div>
              </div>
              <div class="card-body">
                <p class="pb-3">
                  Thank you for visiting HCalculator! We are here to assist you with any questions, feedback, or support needs you may have. Please feel free to reach out to us using the contact information below
                </p>
                <form id="contact-form" action="{{route('contactHandler')}}" method="post" autocomplete="off">
                  @csrf
                  <div class="card-body p-0 my-3">
                    
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <div id="response"></div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          <label>Full Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                        </div>
                      </div>
                      <div class="col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="your@email.com" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group mb-0 mt-md-0 mt-4">
                      <div class="input-group input-group-static mb-4">
                        <label>How can we help you?</label>
                        <textarea name="message" class="form-control" id="message" rows="6" placeholder="Describe your problem in at most 250 characters" required></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn bg-gradient-primary mt-3 mb-0">Send Message</button>
                      </div>
                    </div>
                  </div>
                </form>
                <h3 class="lead">General Inquiries</h3>
                <p class="pb-3">For general questions about our website, feedback, or technical support, please email us at: 
                    <a href="mailto:contact@hcalculator.com">contact@hcalculator.com</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    $('#contact-form').on('submit',function(e){
      e.preventDefault();
      let form = $(this)[0];
      var form_data = new FormData(this);
      let url = $(this).attr('action');
      let method = $(this).attr('method');
      if(!form.checkValidity()){
        form.reportValidity();
        return false;
      }
      $.ajax({
        data: form_data, // get the form data

        type: method, // GET or POST

        url: url, // the file to call

        contentType: false,

        processData: false,

        cache: false,

        success : function(response){
          if(response.status == 1){
            var html = '<div class="alert alert-success text-white font-weight-bold" >'+response.msg+'</div>';
            $('#response').html(html);
            form.reset();
          }else{
            var html = '<div class="alert alert-danger text-white font-weight-bold" >'+response.msg+'</div>';
            $('#response').html(html);
          }
        },
        error: function (xhr){
          if( xhr.status === 422 ) {
            let html = '';
            $.each(xhr.responseJSON.errors, function (key, val) {
              
            html = '<div class="alert alert-danger text-white font-weight-bold" >'+val[0]+'</div>';
            $('#response').append(html);
            });
          }else{
            console.log(xhr);
          }
        }
      }).done(function(data){
        setTimeout(() => {
          $('#response').html('');
        }, 3000);
      });
    });
  </script>
  @endsection