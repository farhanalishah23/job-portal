@extends('Website.layout.master')
@section('content')
 <!-- Page Header Start -->
 <div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">         
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Jobs</h2>
            <ol class="breadcrumb">
              <li><a href="#"><i class="ti-home"></i> Home</a></li>
              <li class="current">Jobs</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Header End -->      

  <!-- Job Browse Section Start -->  
  <section class="job-browse section">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-sm-8">
          @foreach($jobs as $job)
          <div class="job-list">
            <div class="thumb">
              <a href="#"><img src="assets/img/jobs/img-1.jpg" alt=""></a>
            </div>
            <div class="job-list-content">
              <h4><a href="#">{{$job->job_title ?? 'no job title'}}</a><span class="full-time">{{$job->type ?? 'no job type'}}</span></h4>
              <p>{{$job->short_description ?? 'no job description'}}</p>
              <div class="job-tag">
                <div class="pull-left">
                  <div class="meta-tag">
                    <span><a href="#"><i class="ti-brush"></i>Art/Design</a></span>
                    <span><i class="ti-location-pin"></i>{{$job->location->city ?? 'no job location'}}</span>
                    <span><i class="ti-time"></i>60/Hour</span>
                  </div>
                </div>
                <div class="pull-right">
                  <div class="icon">
                    <i class="ti-heart"></i>
                  </div>
                  <div class="btn btn-common btn-rm"><a href="{{route('job_detail', $job->id)}}">Apply Job</a></div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

           <!-- <div class="job-list">
            <div class="thumb">
              <a href="#"><img src="assets/img/jobs/img-2.jpg" alt=""></a>
            </div>
            <div class="job-list-content">
              <h4><a href="#">Front-end developer needed</a><span class="full-time">Full-Time</span></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
              <div class="job-tag">
                <div class="pull-left">
                  <div class="meta-tag">
                    <span><a href="#"><i class="ti-desktop"></i>Technologies</a></span>
                    <span><i class="ti-location-pin"></i>Cupertino, CA, USA</span>
                    <span><i class="ti-time"></i>60/Hour</span>
                  </div>
                </div>
                <div class="pull-right">
                  <div class="icon">
                    <i class="ti-heart"></i>
                  </div>
                  <div class="btn btn-common btn-rm"><a href="{{route('job_detail')}}">Apply Job</a></div>
                </div>
              </div>
            </div>
          </div>

          <div class="job-list">
            <div class="thumb">
              <a href="#"><img src="assets/img/jobs/img-3.jpg" alt=""></a>
            </div>
            <div class="job-list-content">
              <h4><a href="#">Software Enginner</a><span class="part-time">Part-Time</span></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
              <div class="job-tag">
                <div class="pull-left">
                  <div class="meta-tag">
                    <span><a href="#"><i class="ti-desktop"></i>Technologies</a></span>
                    <span><i class="ti-location-pin"></i>Cupertino, CA, USA</span>
                    <span><i class="ti-time"></i>60/Hour</span>
                  </div>
                </div>
                <div class="pull-right">
                  <div class="icon">
                    <i class="ti-heart"></i>
                  </div>
                  <div class="btn btn-common btn-rm"><a href="{{route('job_detail')}}">Apply Job</a></div>
                </div>
              </div>
            </div>
          </div>

          <div class="job-list">
            <div class="thumb">
              <a href="#"><img src="assets/img/jobs/img-4.jpg" alt=""></a>
            </div>
            <div class="job-list-content">
              <h4><a href="#">Fullstack web developer needed</a><span class="full-time">Full-Time</span></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
              <div class="job-tag">
                <div class="pull-left">
                  <div class="meta-tag">
                    <span><a href="#"><i class="ti-desktop"></i>Technologies</a></span>
                    <span><i class="ti-location-pin"></i>Cupertino, CA, USA</span>
                    <span><i class="ti-time"></i>60/Hour</span>
                  </div>
                </div>
                <div class="pull-right">
                  <div class="icon">
                    <i class="ti-heart"></i>
                  </div>
                  <div class="btn btn-common btn-rm"><a href="{{route('job_detail')}}">Apply Job</a></div>
                </div>
              </div>
            </div>
          </div>  -->

          <!-- Start Pagination -->
          <ul class="pagination">              
            <li class="active"><a href="#" class="btn btn-common"><i class="ti-angle-left"></i> prev</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li class="active"><a href="#" class="btn btn-common">Next <i class="ti-angle-right"></i></a></li>
          </ul>
          <!-- End Pagination -->
        </div>
        <div class="col-md-3 col-sm-4">
          <aside>
            <div class="sidebar">
              <div class="inner-box">
                <h3>Categories</h3>
                <ul class="cat-list">
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Finance <span class="num-posts">4,287 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Techonologies <span class="num-posts">4,256 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Art/Design<span class="num-posts">3,245 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Science <span class="num-posts">4,256 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Education Training <span class="num-posts">4,560 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Logistics <span class="num-posts">3,256 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Food Services <span class="num-posts">1,256 Jobs</span></a>                   
                  </li>
                </ul>
              </div>
              <div class="inner-box">
                <h3>Job Status</h3>
                <ul class="cat-list">
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Full Time <span class="num-posts">12,256 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Part Time <span class="num-posts">6,510 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Freelancer <span class="num-posts">1,171 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Internship <span class="num-posts">876 Jobs</span></a>                    
                  </li>
                </ul>
              </div>
              <div class="inner-box">
                <h3>Locations</h3>
                <ul class="cat-list">
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">New York <span class="num-posts">4,197 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">San Francisco <span class="num-posts">2,256 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">San Diego <span class="num-posts">3,278 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Los Angeles <span class="num-posts">5,294 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Chicago <span class="num-posts">1,746 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">Houston <span class="num-posts">871 Jobs</span></a>                    
                  </li>
                  <li>
                    <a href="https://demo.graygrids.com/themes/jobboard/browse-jobs.html#">New Orleans <span class="num-posts">2,163 Jobs</span></a>                   
                  </li>
                </ul>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- Job Browse Section End --> 
@endsection