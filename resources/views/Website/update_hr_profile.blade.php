@extends('Website.layout.master')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs4.min.css" integrity="sha512-rDHV59PgRefDUbMm2lSjvf0ZhXZy3wgROFyao0JxZPGho3oOuWejq/ELx0FOZJpgaE5QovVtRN65Y3rrb7JhdQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
      <!-- Page Header Start -->
      <div class="page-header" style="background: url(assets/img/banner1.jpg);">
        <div class="container">
          <div class="row">         
            <div class="col-md-12">
              <div class="breadcrumb-wrapper">
                <h2 class="product-title">Update HR Profile</h2>
                <ol class="breadcrumb">
                  <li><a href="{{route('/')}}"><i class="ti-home"></i> Home</a></li>
                  <li class="current">Update HR profile</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Page Header End -->    

    <!-- Content section Start --> 
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-md-offset-2">
            <div class="page-ads box">
              <form class="form-ad" method="post" action="{{route('update_hr_profile')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{auth()->id()}}">
                <div class="divider"><h3>Update HR Profile</h3></div>
                <div class="form-group is-empty">
                  <label class="control-label" for="textarea">Profile Image</label>
                  <input type="file" name="profile_image" class="form-control">
                                 @php
    $userImage = Auth::user()->image;
    $imageExists = $userImage && Storage::disk('public')->exists($userImage);
@endphp

<img src="{{ 
    $imageExists
        ? asset('storage/' . $userImage)
        : 'https://img.freepik.com/premium-vector/silver-membership-icon-default-avatar-profile-icon-membership-icon-social-media-user-image-vector-illustration_561158-4195.jpg?semt=ais_hybrid&w=740' 
}}" alt="User Image" height="150">
                </div>
                <div class="form-group is-empty">
                  <label class="control-label" for="textarea">Name</label>
                  <input type="text" name="name" value="{{auth()->user()->name ?? null}}" class="form-control" placeholder="Enter your name">
                <span class="material-input"></span></div>
                <div class="form-group is-empty">
                  <label class="control-label" for="textarea"></label>
                  <label class="control-label" for="textarea">Email</label>
                  <input type="email" class="form-control" name="email" value="{{auth()->user()->email ?? null}}" placeholder="Enter your email" readonly>
                <span class="material-input"></span></div>
                <div class="form-group is-empty">
                  <label class="control-label" for="textarea">Address</label>
                  <input type="text" name="address" value="{{auth()->user()->address ?? null}}" class="form-control" placeholder="Enter your address">
                <span class="material-input"></span></div>
                <div class="form-group is-empty">
                  <label class="control-label" for="textarea">Phone No</label>
                  <input type="text" name="phone_no" value="{{auth()->user()->phone_no?? null}}" class="form-control" placeholder="Enter your phone number">
                <span class="material-input"></span></div>
                <div class="form-group is-empty">
                  <label class="control-label" for="textarea">About Me</label>
                  <input type="text" name="about_me" value="{{auth()->user()->about_me ?? null}}" class="form-control" placeholder="Describe yourself">
                <span class="material-input"></span></div>
                <div class="form-group is-empty">
                  <label class="control-label" for="textarea">Education</label>
                  <input type="text" class="form-control" name="education" value="{{auth()->user()->education ?? null}}" placeholder="Enter your education">
                <span class="material-input"></span></div> 
              <button class="btn btn-common">Update</button>                                 
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section End -->  
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs4.min.js" integrity="sha512-/DlF8zrT3XyUWEK7bmU1v7Q0kMXctQfqNwyzCNBB/mdUFxz87bq3X4TqadyuQBJW39g29t1tLNbHYLpXLs1zVA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $(document).ready(function() {
      $('#summernote').summernote({
        height: 250,                 
        minHeight: null,             
        maxHeight: null,             
        focus: true                  
      });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
        $.validator.addMethod(
            "imageExtension",
            function (value, element) {
                if (value === "") return true; 
                const validExtensions = ["jpg", "jpeg", "png", "gif"];
                const fileExtension = value.split(".").pop().toLowerCase();
                return validExtensions.includes(fileExtension);
            },
            "Please upload a valid image file (jpg, jpeg, png, gif)."
        );

        $(".form-ad").validate({
            rules: {
                profile_image: {
                    imageExtension: true,
                },
                name: {
                    required: true,
                    minlength: 3,
                },
                email: {
                    required: true,
                    email: true,
                },
                address: {
                    required: true,
                    minlength: 5,
                },
                phone_no: {
                    required: true,
                    minlength: 11,
                    digits: true,
                },
                about_me: {
                    required: true,
                    minlength: 10,
                },
                education: {
                    required: true,
                    minlength: 5,
                },
            },
            messages: {
                profile_image: {
                    imageExtension: "Only image files (jpg, jpeg, png, gif) are allowed.",
                },
                name: {
                    required: "Please enter your name.",
                    minlength: "Your name must be at least 3 characters long.",
                },
                email: {
                    required: "Please enter your email.",
                    email: "Please enter a valid email address.",
                },
                address: {
                    required: "Please enter your address.",
                    minlength: "Your address must be at least 5 characters long.",
                },
                phone_no: {
                    required: "Please enter your phone number.",
                    minlength: "Your phone number must be at least 11 digits long.",
                    digits: "Only numbers are allowed for phone numbers.",
                },
                about_me: {
                    required: "Please describe yourself.",
                    minlength: "Your description must be at least 10 characters long.",
                },
                education: {
                    required: "Please enter your education details.",
                    minlength: "Your education details must be at least 5 characters long.",
                },
            },
            errorClass: "text-danger",
            errorElement: "span",
            submitHandler: function (form) {
                form.submit(); 
            },
        });
    });
</script>


@endpush
