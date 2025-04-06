@extends('Website.layout.master')
@section('content')
 <!-- Page Header Start -->
 <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Job Details</h2>
            <ol class="breadcrumb">
              <li><a href="{{route('/')}}"><i class="ti-home"></i> Home</a></li>
              <li class="current">Job Details</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Header End -->

  <!-- Job Detail Section Start -->
  <section class="job-detail section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="header-detail">
              <div class="header-content pull-left">
                <h3><a href="#">{{$job->job_title ?? 'no job title'}}</a></h3>
                <p><span>Date Posted: {{ $job->created_at ? $job->created_at->format(env('DATE_FORMAT', 'd-m-Y')) : 'N/A' }}</span></p>

                <p>Monthly Salary: <strong class="price">${{$job->salary_offer ?? 'no salary'}}</strong></p>
              </div>
              <div class="detail-company pull-right text-right">
                <div class="img-thum">
                  <img class="img-responsive" src="" alt="">
                </div>
                <div class="name">
                  <h4>{{$job->location->city ?? 'no job location'}}</h4>
                 
                </div>
              </div>
              <div class="clearfix">
              <div class="meta">
                <span><a class="btn btn-border btn-sm" href="#"><i class="ti-email"></i> Email</a></span>
                <span><a class="btn btn-border btn-sm" href="#"><i class="ti-info-alt"></i> Job Aleart</a></span>
                <span><a class="btn btn-border btn-sm" href="#"><i class="ti-save"></i> Save This job</a></span>
                <span><a class="btn btn-border btn-sm" href="#"><i class="ti-alert"></i> Report Abuse</a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
          <div class="content-area">
            <div class="clearfix">
            <div class="box">
                <h4>Job Description</h4>
                <p>{{$job->job_description ?? 'no description'}}</p>

                <h4>Qualification</h4>
                <p>{{$job->qualification ?? 'no qualification'}}</p>
                <!-- <ul>
                <li><i class="ti-check-box"></i>Demonstrated strong and effective verbal, written, and interpersonal communication skills</li>
                <li><i class="ti-check-box"></i>Must be team-oriented, possess a positive attitude and work well with others</li>
                <li><i class="ti-check-box"></i>Ability to prioritize and multi-task in a flexible, fast paced and challenging environment</li>
                </ul> -->
                {{-- <h4>Key responsibilities also include</h4>
                <ul>
                <li><i class="ti-check-box"></i>Provide technical health advice to Head of Country Programmes and field advisors at all key stages of the project management cycle including needs assessment.</li>
                <li><i class="ti-check-box"></i>Technical strategy and design, implementation as well as sector specific monitoring and evaluation.</li>
                <li><i class="ti-check-box"></i>This includes travel to field programmes as well as review of proposals, key reports and surveys prior to external submission.</li>
                </ul> --}}
                <h4>Requirements</h4>
                <p>{{$job->requirement ?? 'no requirement'}}</p>
                <!-- <ul>
                <li><i class="ti-check-box"></i>Must have minimum of 3 years experience running, maneuvering, driving, and navigating equipment such as bulldozer, excavators, rollers, and front-end loaders.</li>
                <li><i class="ti-check-box"></i>Must have minimum of 3 years experience running, maneuvering, driving, and navigating equipment such as bulldozer, excavators, rollers, and front-end loaders.
                Strongly prefer candidates with High School Diploma</li>
                </ul> -->
                <h4>Benefits</h4>
                <p>{{$job->benefits ?? 'no benefits'}}</p>
                <!-- <ul>
                <li><i class="ti-check-box"></i>Must have minimum of 3 years experience running, maneuvering, driving, and navigating equipment such as bulldozer, excavators, rollers, and front-end loaders.</li>
                <li><i class="ti-check-box"></i>Strongly prefer candidates with High School Diploma</li>
                </ul> -->
                <a href="{{route('apply_job', [$job->id])}}" class="btn btn-common">Apply for this Job Now</a>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
        <aside>
          <div class="sidebar">
              <div class="box">
                <h2 class="small-title">Job Details</h2>
                <ul class="detail-list">
                  <li>
                    <a href="#">Job Id</a>
                    <span class="type-posts">Jb1246789</span>
                  </li>
                  <li>
                    <a href="#">Location</a>
                    <span class="type-posts">New York, NY</span>
                  </li>
                  <li>
                    <a href="#">Company</a>
                    <span class="type-posts">LemonKids LLC</span>
                  </li>
                  <li>
                    <a href="#">Type</a>
                    <span class="type-posts">Private</span>
                  </li>
                  <li>
                    <a href="#">Employment Status</a>
                    <span class="type-posts">Permanent</span>
                  </li>
                  <li>
                    <a href="#">Employment Type</a>
                    <span class="type-posts">Manager</span>
                  </li>
                  <li>
                    <a href="#">Positions</a>
                    <span class="type-posts">5</span>
                  </li>
                  <li>
                    <a href="#">Career Level</a>
                    <span class="type-posts">Experience</span>
                  </li>
                  <li>
                    <a href="#">Experience</a>
                    <span class="type-posts">3 Years</span>
                  </li>
                  <li>
                    <a href="#">Gender</a>
                    <span class="type-posts">Male</span>
                  </li>
                  <li>
                    <a href="#">Nationality</a>
                    <span class="type-posts">United States</span>
                  </li>
                  <li>
                    <a href="#">Degree</a>
                    <span class="type-posts">Masters</span>
                  </li>
                </ul>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- Job Detail Section End -->
@endsection
@push('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('icon') && session('message') && session('title'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        Swal.fire({
            title: "{{ session('title') }}",
            text: "{{ session('message') }}",
            icon: "{{ session('icon') }}",
            confirmButtonText: 'Okay'
        });
    </script>
@endif

@endpush
