@extends('Website.layout.master')
@section('content')
   <!-- Find Job Section Start -->
    <section class="find-job section">
      <div class="container">
        <h2 class="section-title">Hot Jobs</h2>
        <div class="row">
          <div class="col-md-12">
            @foreach($jobs as $job)
            <div class="job-list">
              <div class="thumb">
                <a href="job-details.html"><img src="assets/img/jobs/img-1.jpg" alt=""></a>
              </div>
              <div class="job-list-content">
                <h4><a href="job-details.html">{{$job->job_title ?? 'no job title'}}</a><span class="full-time">{{$job->type ?? 'no job type'}}</span></h4>
                <p>{{$job->short_description ?? 'no job description'}}</p>
                <div class="job-tag">
                  <div class="pull-left">
                    <div class="meta-tag">
                      <span><a href="browse-categories.html"><i class="ti-brush"></i>Art/Design</a></span>
                      <span><i class="ti-location-pin"></i>{{$job->location->city ?? 'no job location'}}</span>
                      <span><i class="ti-time"></i>60/Hour</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <div class="icon">
                      <i class="ti-heart"></i>
                    </div>
                    <a href="{{route('job_detail',$job->id)}}" class="btn btn-common btn-rm">More Detail</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            {{-- <div class="job-list">
              <div class="thumb">
                <a href="job-details.html"><img src="assets/img/jobs/img-2.jpg" alt=""></a>
              </div>
              <div class="job-list-content">
                <h4><a href="job-details.html">Front-end developer needed</a><span class="full-time">Full-Time</span></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
                <div class="job-tag">
                  <div class="pull-left">
                    <div class="meta-tag">
                      <span><a href="browse-categories.html"><i class="ti-desktop"></i>Technologies</a></span>
                      <span><i class="ti-location-pin"></i>Cupertino, CA, USA</span>
                      <span><i class="ti-time"></i>60/Hour</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <div class="icon">
                      <i class="ti-heart"></i>
                    </div>
                    <a href="{{route('job_detail')}}" class="btn btn-common btn-rm">More Detail</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="job-list">
              <div class="thumb">
                <a href="job-details.html"><img src="assets/img/jobs/img-3.jpg" alt=""></a>
              </div>
              <div class="job-list-content">
                <h4><a href="job-details.html">Senior Accountant</a><span class="part-time">Part-Time</span></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
                <div class="job-tag">
                  <div class="pull-left">
                    <div class="meta-tag">
                      <span><a href="browse-categories.html"><i class="ti-home"></i>Finance</a></span>
                      <span><i class="ti-location-pin"></i>Delaware, USA</span>
                      <span><i class="ti-time"></i>60/Hour</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <div class="icon">
                      <i class="ti-heart"></i>
                    </div>
                    <a href="{{route('job_detail')}}" class="btn btn-common btn-rm">More Detail</a>
                  </div>
                </div>
              </div>
            </div> --}}
            {{-- <div class="job-list">
              <div class="thumb">
                <a href="job-details.html"><img src="assets/img/jobs/img-4.jpg" alt=""></a>
              </div>
              <div class="job-list-content">
                <h4><a href="job-details.html">Fullstack web developer needed</a><span class="full-time">Full-Time</span></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
                <div class="job-tag">
                  <div class="pull-left">
                    <div class="meta-tag">
                      <span><a href="browse-categories.html"><i class="ti-desktop"></i>Technologies</a></span>
                      <span><i class="ti-location-pin"></i>New York, USA</span>
                      <span><i class="ti-time"></i>60/Hour</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <div class="icon">
                      <i class="ti-heart"></i>
                    </div>
                    <a href="{{route('job_detail')}}" class="btn btn-common btn-rm">More Detail</a>
                  </div>
                </div>
              </div>
            </div>  --}}
          </div>
          <div class="col-md-12">
            <div class="showing pull-left">
              <a href="#">Showing <span>6-10</span> Of 24 Jobs</a>
            </div>                    
            <ul class="pagination pull-right">              
              <li class="active"><a href="#" class="btn btn-common" ><i class="ti-angle-left"></i> prev</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li class="active"><a href="#" class="btn btn-common">Next <i class="ti-angle-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- Find Job Section End -->


    <!-- Featured Jobs Section Start -->
    <section class="featured-jobs section">
      <div class="container">
        <h2 class="section-title">
          Featured Jobs
        </h2>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="featured-item">
              <div class="featured-wrap">
                <div class="featured-inner">
                  <figure class="item-thumb">
                    <a class="hover-effect" href="job-page.html">
                      <img src="assets/img/features/img-1.jpg" alt="">
                    </a>
                  </figure>
                  <div class="item-body">
                    <h3 class="job-title"><a href="job-page.html">Graphic Designer</a></h3>
                    <div class="adderess"><i class="ti-location-pin"></i> Dallas, United States</div>
                  </div>
                </div>
              </div>
              <div class="item-foot">
                <span><i class="ti-calendar"></i> 4 months ago</span>
                <span><i class="ti-time"></i> Full Time</span>
                <div class="view-iocn">
                  <a href="job-page.html"><i class="ti-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="featured-item">
              <div class="featured-wrap">
                <div class="featured-inner">
                  <figure class="item-thumb">
                    <a class="hover-effect" href="job-page.html">
                      <img src="assets/img/features/img-2.jpg" alt="">
                    </a>
                  </figure>
                  <div class="item-body">
                    <h3 class="job-title"><a href="job-page.html">Software Engineer</a></h3>
                    <div class="adderess"><i class="ti-location-pin"></i> Delaware, United States</div>
                  </div>
                </div>
              </div>
              <div class="item-foot">
                <span><i class="ti-calendar"></i> 5 months ago</span>
                <span><i class="ti-time"></i> Part Time</span>
                <div class="view-iocn">
                  <a href="job-page.html"><i class="ti-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="featured-item">
              <div class="featured-wrap">
                <div class="featured-inner">
                  <figure class="item-thumb">
                    <a class="hover-effect" href="job-page.html">
                      <img src="assets/img/features/img-3.jpg" alt="">
                    </a>
                  </figure>
                  <div class="item-body">
                    <h3 class="job-title"><a href="job-page.html">Managing Director</a></h3>
                    <div class="adderess"><i class="ti-location-pin"></i> NY, United States</div>
                  </div>
                </div>
              </div>
              <div class="item-foot">
                <span><i class="ti-calendar"></i> 3 months ago</span>
                <span><i class="ti-time"></i> Full Time</span>
                <div class="view-iocn">
                  <a href="job-page.html"><i class="ti-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="featured-item">
              <div class="featured-wrap">
                <div class="featured-inner">
                  <figure class="item-thumb">
                    <a class="hover-effect" href="job-page.html">
                      <img src="assets/img/features/img-3.jpg" alt="">
                    </a>
                  </figure>
                  <div class="item-body">
                    <h3 class="job-title"><a href="job-page.html">Graphic Designer</a></h3>
                    <div class="adderess"><i class="ti-location-pin"></i> Washington, United States</div>
                  </div>
                </div>
              </div>
              <div class="item-foot">
                <span><i class="ti-calendar"></i> 1 months ago</span>
                <span><i class="ti-time"></i> Part Time</span>
                <div class="view-iocn">
                  <a href="job-page.html"><i class="ti-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="featured-item">
              <div class="featured-wrap">
                <div class="featured-inner">
                  <figure class="item-thumb">
                    <a class="hover-effect" href="job-page.html">
                      <img src="assets/img/features/img-2.jpg" alt="">
                    </a>
                  </figure>
                  <div class="item-body">
                    <h3 class="job-title"><a href="job-page.html">Software Engineer</a></h3>
                    <div class="adderess"><i class="ti-location-pin"></i> Dallas, United States</div>
                  </div>
                </div>
              </div>
              <div class="item-foot">
                <span><i class="ti-calendar"></i> 6 months ago</span>
                <span><i class="ti-time"></i> Full Time</span>
                <div class="view-iocn">
                  <a href="job-page.html"><i class="ti-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="featured-item">
              <div class="featured-wrap">
                <div class="featured-inner">
                  <figure class="item-thumb">
                    <a class="hover-effect" href="job-page.html">
                      <img src="assets/img/features/img-1.jpg" alt="">
                    </a>
                  </figure>
                  <div class="item-body">
                    <h3 class="job-title"><a href="job-page.html">Managing Director</a></h3>
                    <div class="adderess"><i class="ti-location-pin"></i> NY, United States</div>
                  </div>
                </div>
              </div>
              <div class="item-foot">
                <span><i class="ti-calendar"></i> 7 months ago</span>
                <span><i class="ti-time"></i> Part Time</span>
                <div class="view-iocn">
                  <a href="job-page.html"><i class="ti-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Featured Jobs Section End -->


    <!-- Testimonial Section Start -->
    <section id="testimonial" class="section">
      <div class="container">
        <div class="row">
          <div class="touch-slider" class="owl-carousel owl-theme">
            <div class="item active text-center">  
              <img class="img-member" src="assets/img/testimonial/img1.jpg" alt=""> 
              <div class="client-info">
               <h2 class="client-name">Jessica <span>(Senior Accountant)</span></h2>
              </div>
              <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project... were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout the project and assured that the owner expectations were met and <br> often exceeded. </p>
            </div>
            <div class="item text-center">
              <img class="img-member" src="assets/img/testimonial/img2.jpg" alt=""> 
              <div class="client-info">
               <h2 class="client-name">John Doe <span>(Project Menager)</span></h2>
              </div>
              <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project... were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout the project and assured that the owner expectations were met and <br> often exceeded. </p>
            </div>
            <div class="item text-center">
              <img class="img-member" src="assets/img/testimonial/img3.jpg" alt=""> 
              <div class="client-info">
                <h2 class="client-name">Helen <span>(Engineer)</span></h2>
              </div>
              <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project... were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout the project and assured that the owner expectations were met and <br> often exceeded. </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Clients Section -->
    <section class="clients section">
      <div class="container">
        <h2 class="section-title">
          Clients & Partners
        </h2>
        <div class="row"> 
          <div id="clients-scroller">
            <div class="items">
              <img src="assets/img/clients/img1.png" alt="">
            </div>
            <div class="items">
              <img src="assets/img/clients/img2.png" alt="">
            </div>
            <div class="items">
              <img src="assets/img/clients/img3.png" alt="">
            </div>
            <div class="items">
              <img src="assets/img/clients/img4.png" alt="">
            </div>
            <div class="items">
              <img src="assets/img/clients/img5.png" alt="">
            </div>
            <div class="items">
              <img src="assets/img/clients/img6.png" alt="">
            </div>
            <div class="items">
              <img src="assets/img/clients/img6.png" alt="">
            </div>
            <div class="items">
              <img src="assets/img/clients/img6.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Client Section End -->

     <!-- Counter Section Start -->
    <section id="counter">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="counting">
              <div class="icon">
                <i class="ti-briefcase"></i>
              </div>
              <div class="desc">                
                <h2>Jobs</h2>
                <h1 class="counter">12050</h1>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="counting">
              <div class="icon">
                <i class="ti-user"></i>
              </div>
              <div class="desc">
                <h2>Members</h2>
                <h1 class="counter">10890</h1>                
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="counting">
              <div class="icon">
                <i class="ti-write"></i>
              </div>
              <div class="desc">
                <h2>Resume</h2>
                <h1 class="counter">700</h1>                
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="counting">
              <div class="icon">
                <i class="ti-heart"></i>
              </div>
              <div class="desc">
                <h2>Company</h2>
                <h1 class="counter">9050</h1>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Counter Section End -->

    <!-- Infobox Section Start -->
    <section class="infobox section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="info-text">
              <h2>Don't Want To Miss a Thing?</h2>
              <p>Just go to <a href="#">Google Play</a> to download JobBoard Mini</p>
            </div> 
            <a href="#" class="btn btn-border">Google Play</a>           
          </div>
        </div>
      </div>
    </section>
    <!-- Infobox Section End -->

@endsection