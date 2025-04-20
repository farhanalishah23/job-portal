@extends('Website.layout.master')
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
          <form class="form-ad" action="{{route('job_applied')}}" method="post">
            @csrf
            <input name="id" value="{{ $viewAppliedJob->id}}" type="hidden">
            <div class="form-group is-empty">
              <label class="control-label">Job Title</label>
              <input type="text" value="{{ $viewAppliedJob->job->job_title ?? 'Job not found'}}" class="form-control" placeholder="mail@example.com" disabled readonly>
            <span class="material-input"></span></div>
            <div class="form-group is-empty">
              <label class="control-label">Candidate Name</label>
              <input type="text" name="candidate_name" value="{{ $viewAppliedJob->candidate_name }}" class="form-control" placeholder="Enter your name" required readonly>
            <span class="material-input"></span></div>
            <div class="form-group is-empty">
              <label class="control-label">Candidate Email</label>
              <input type="email" name="candidate_email" value="{{ $viewAppliedJob->candidate_email }}" class="form-control" placeholder="Enter your email" required readonly>
            <span class="material-input"></span></div>
            <div class="form-group is-empty">
              <label class="control-label">Education</label>
              <textarea type="text" name="education"  class="form-control" placeholder="Enter your education" required readonly>{{ $viewAppliedJob->education }}</textarea>
            <span class="material-input"></span></div>
            <div class="form-group is-empty">
              <label class="control-label">Job Qualification/Experience</label>
              <textarea type="text" name="qualification" class="form-control" placeholder="Enter your qualification" required readonly>{{ $viewAppliedJob->qualification }}</textarea>
            <span class="material-input"></span></div>
            <div class="form-group">
              <label class="control-label">Cover letter <span>(Optional)</span></label>
              <textarea type="text" name="cover_letter" class="form-control" placeholder="Enter cover letter" required readonly>{{ $viewAppliedJob->cover_letter }}</textarea>
            </div>
            <div class="form-group">
              <div class="button-group">
                <div class="action-buttons">
                  <div class="upload-button">
                    @if (!empty($viewAppliedJob->job_attachment))
                    <a href="{{ asset($viewAppliedJob->job_attachment) }}" class="btn btn-common btn-sm" download>
                        Download CV
                    </a>
                    @else
                    <p>No CV Uploaded</p>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <a href="{{ URL::previous() }}" class="btn btn-common">Back</a>
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

<!-- <script>
  $(document).ready(function() {
      $('#summernote').summernote({
        height: 250,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true                  // set focus to editable area after initializing summernote
      });
  });
</script> -->

@endpush
