@extends('website.layout.master')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs4.min.css" integrity="sha512-rDHV59PgRefDUbMm2lSjvf0ZhXZy3wgROFyao0JxZPGho3oOuWejq/ELx0FOZJpgaE5QovVtRN65Y3rrb7JhdQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
 <!-- Page Header Start -->
 <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Apply For A Job</h2>
            <ol class="breadcrumb">
              <li><a href="https://demo.graygrids.com/themes/jobboard/post-job.html#"><i class="ti-home"></i> Home</a></li>
              <li class="current">Apply For A Job</li>
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
      <div class="col-sm-12 col-md-9 col-md-offset-2">
        <!-- <fieldset>
          <label>Have an account?</label>
          <div class="field account-sign-in">
            <p>
              <a class="btn btn-common btn-sm" href="https://demo.graygrids.com/themes/jobboard/my-account.html"><i class="ti-key"></i> Sign in</a>
            </p>
              <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                If you don’t have an account you can create one below by entering your email address. A password will be automatically emailed to you.
              </div>
            </div>
        </fieldset> -->
        <div class="page-ads box">
          <form id="form" action="{{ route('job_applied') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input name="id" value="{{ $job->id }}" type="hidden">
            <input name="hr_id" value="{{ $job->hr_id }}" type="hidden">
            
            <!-- Job Title (Disabled Field) -->
            <div class="form-group is-empty">
                <label class="control-label">Job Title</label>
                <input type="text" value="{{ $job->job_title }}" class="form-control" placeholder="mail@example.com" disabled>
                <span class="material-input"></span>
            </div>
        
            <!-- Candidate Name -->
            <div class="form-group is-empty">
                <label class="control-label">Candidate Name</label>
                <input type="text" name="candidate_name" value="{{ auth()->user()->name ?? 'no name' }}" class="form-control" placeholder="Enter your name">
                <span class="material-input"></span>
            </div>
        
            <!-- Candidate Email -->
            <div class="form-group is-empty">
                <label class="control-label">Candidate Email</label>
                <input type="email" name="candidate_email" value="{{ auth()->user()->email ?? 'no email' }}" class="form-control" placeholder="Enter your email">
                <span class="material-input"></span>
            </div>
        
            <!-- Education -->
            <div class="form-group is-empty">
                <label class="control-label">Education</label>
                <textarea type="text" name="education" class="form-control" placeholder="Enter your education">{{ auth()->user()->education ?? 'no education' }}</textarea>
                <span class="material-input"></span>
            </div>
        
            <!-- Job Qualification/Experience -->
            <div class="form-group is-empty">
                <label class="control-label">Job Qualification/Experience</label>
                <textarea type="text" name="qualification" class="form-control" placeholder="Enter your qualification">{{ auth()->user()->past_experience ?? 'no past experience' }}</textarea>
                <span class="material-input"></span>
            </div>
        
            <!-- Cover Letter -->
            <div class="form-group">
                <label class="control-label">Cover letter <span>(Optional)</span></label>
                <textarea type="text" name="cover_letter" class="form-control" placeholder="Enter cover letter">{{ auth()->user()->cover_letter ?? 'no cover letter' }}</textarea>
            </div>
        
            <!-- Job Attachment -->
            <div class="form-group">
                <label class="control-label">Job Attachment</label>
                <input id="cv" name="job_attachment" type="file">
            </div>
        
            <!-- Submit Button -->
            <button id="submitButton" class="btn btn-common" type="submit">Submit your job</button>
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
@if (session('message'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        Swal.fire({
            title: 'error',
            text: "{{ session('message') }}",
            icon: 'error',
            confirmButtonText: 'Okay'
        });
    </script>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
        $.validator.addMethod(
            "fileExtension",
            function (value, element, param) {
                var extension = value.split(".").pop().toLowerCase();
                return this.optional(element) || param.includes(extension);
            },
            "Invalid file format. Only .pdf and .docx files are allowed."
        );

        $("#form").validate({
            rules: {
                candidate_name: {
                    required: true,
                    minlength: 2,
                },
                candidate_email: {
                    required: true,
                    email: true,
                },
                education: {
                    required: true,
                    minlength: 5,
                },
                qualification: {
                    required: true,
                    minlength: 5,
                },
                cover_letter: {
                    required: true,
                    minlength: 100,
                },
                job_attachment: {
                    required: true,
                    fileExtension: ["pdf", "docx"],
                },
            },
            messages: {
                candidate_name: {
                    required: "Candidate name is required.",
                    minlength: "Candidate name must be at least 2 characters.",
                },
                candidate_email: {
                    required: "Candidate email is required.",
                    email: "Please enter a valid email address.",
                },
                education: {
                    required: "Education details are required.",
                    minlength: "Education details must be at least 5 characters.",
                },
                qualification: {
                    required: "Qualification is required.",
                    minlength: "Qualification must be at least 5 characters.",
                },
                cover_letter: {
                    required: "Cover letter is required.",
                    minlength: "Cover letter must be at least 100 characters.",
                },
                job_attachment: {
                    required: "Please upload your CV.",
                    fileExtension: "Only .pdf and .docx formats are allowed.",
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
