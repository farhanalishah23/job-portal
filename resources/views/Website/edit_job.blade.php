@extends('Website.layout.master')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs4.min.css"
        integrity="sha512-rDHV59PgRefDUbMm2lSjvf0ZhXZy3wgROFyao0JxZPGho3oOuWejq/ELx0FOZJpgaE5QovVtRN65Y3rrb7JhdQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
@endpush
@section('content')
    <!-- Page Header Start -->
    <div class="page-header" style="background: url(assets/img/banner1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Update Job</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('/') }}"><i class="ti-home"></i> Home</a></li>
                            <li class="current">Update Job</li>
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
                    {{-- <fieldset>
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
        </fieldset> --}}
                    <div class="page-ads box">
                        <form id="form-ad" action="{{ route('update_job') }}" method="post">
                            @csrf
                            <input name="hr_id" value="{{ Auth::id() }}" type="hidden">
                            <input name="id" value="{{ $job->id }}" type="hidden">
                            <div class="form-group is-empty">
                                <label class="control-label">Category</label>
                                <select name="category" class="dropdown-product selectpicker">
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach ($categories as $item)
                                        <option name="category" @if ($item->id === $job->category_id) selected @endif
                                            value="{{ $item->id }}">{{ $item->categoryname ?? '' }}</option>
                                    @endforeach
                                </select>
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group is-empty">
                                <label class="control-label">Location</label>
                                <select name="location" class="dropdown-product selectpicker">
                                    <option value="" disabled selected>Select Location</option>
                                    @foreach ($locations as $item)
                                        <option name="location" @if ($item->id === $job->location_id) selected @endif
                                            value="{{ $item->id }}">{{ $item->city }}</option>
                                    @endforeach
                                </select>
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group is-empty">
                                <label class="control-label">Job Title</label>
                                <input type="text" name="job_title" value="{{ $job->job_title ?? null }}"
                                    class="form-control">
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Job Description</label>
                                <textarea name="job_description" class="form-control">{{ $job->job_description ?? null }}</textarea>
                            </div>
                            <div class="form-group is-empty">
                                <label class="control-label">Job Qualifications</label>
                                <input type="text" name="qualification" value="{{ $job->qualification ?? null }}"
                                    class="form-control">
                            </div>
                            <div class="form-group is-empty">
                                <label class="control-label">Job Requirements</label>
                                <input type="text" name="requirement" value="{{ $job->requirement ?? null }}"
                                    class="form-control">
                            </div>
                            <div class="form-group is-empty">
                                <label class="control-label">Benefits</label>
                                <input type="text" name="benefits" value="{{ $job->benefits ?? null }}"
                                    class="form-control">
                            </div>
                            <div class="form-group is-empty">
                                <label class="control-label">Type</label>
                                <input type="text" name="type" value="{{ $job->type ?? null }}" class="form-control">
                            </div>
                            <div class="form-group is-empty">
                                <label class="control-label">Salary</label>
                                <input type="text" name="salary_offer" value="{{ $job->salary_offer ?? null }}"
                                    class="form-control">
                            </div>
                            <div class="form-group is-empty">
                                <label class="control-label">Company Name</label>
                                <input type="text" name="company_name" value="{{ $job->company_name ?? null }}"
                                    class="form-control">
                            </div>
                            <button type="submit" class="btn btn-common">Update job</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section End -->
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs4.min.js"
        integrity="sha512-/DlF8zrT3XyUWEK7bmU1v7Q0kMXctQfqNwyzCNBB/mdUFxz87bq3X4TqadyuQBJW39g29t1tLNbHYLpXLs1zVA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script>
  $(document).ready(function() {
      $('#summernote').summernote({
        height: 250,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true                  // set focus to editable area after initializing summernote
      });
  });
</script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#form-ad").validate({
                rules: {
                    category: {
                        required: true
                    },
                    location: {
                        required: true
                    },
                    job_title: {
                        required: true,
                        minlength: 5
                    },
                    job_description: {
                        required: true,
                        minlength: 100
                    },
                    qualification: {
                        required: true
                    },
                    requirement: {
                        required: true
                    },
                    benefits: {
                        required: true
                    },
                    type: {
                        required: true
                    },
                    salary_offer: {
                        required: true,
                        number: true,
                        min: 500,
                        max: 10000
                    },
                    company_name: {
                        required: true
                    }
                },
                messages: {
                    category: {
                        required: "Please select a category"
                    },
                    location: {
                        required: "Please select a location"
                    },
                    job_title: {
                        required: "Please enter a job title",
                        minlength: "Job title must be at least 5 characters long"
                    },
                    job_description: {
                        required: "Please enter a job description",
                        minlength: "Job description must be at least 100 characters long"
                    },
                    qualification: {
                        required: "Please enter qualifications"
                    },
                    requirement: {
                        required: "Please enter requirements"
                    },
                    benefits: {
                        required: "Please enter benefits"
                    },
                    type: {
                        required: "Please enter the job type"
                    },
                    salary_offer: {
                        required: "Please enter the salary offer",
                        number: "Please enter a valid salary number",
                        min: "Salary offer must be at least 500",
                        max: "Salary offer must not exceed 10,000"
                    },
                    company_name: {
                        required: "Please enter the company name"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
