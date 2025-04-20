@extends('Website.layout.master')
@section('content')
      <!-- Page Header Start -->
      <div class="page-header" style="background: url(assets/img/banner1.jpg);">
        <div class="container">
          <div class="row">         
            <div class="col-md-12">
              <div class="breadcrumb-wrapper">
                <h2 class="product-title">Resume</h2>
                <ol class="breadcrumb">
                  <li><a href="{{route('/')}}"><i class="ti-home"></i> Home</a></li>
                  <li class="current">Resume</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Page Header End --> 
      <div id="content">
        <div class="container">        
          <div class="row">
            @include('Website.layout.sidebar')
            <div class="col-md-8 col-sm-8 col-xs-12">
              <div class="inner-box my-resume">
                <div class="author-resume">
                  <div class="thumb">
                    <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile Image" height="100px">
                  </div>
                  <div class="author-info">
                    <h3>{{auth()->user()->name ?? null}}</h3>
                    <p class="sub-title">{{auth()->user()->title ?? null}}</p>
                    <p><span class="address"><i class="ti-location-pin"></i>{{auth()->user()->address ?? null}}</span> <span><i class="ti-phone"></i>{{auth()->user()->phone_no ?? null}}</span></p>
                    {{-- <div class="social-link">  
                      <a class="twitter" target="_blank" data-original-title="twitter" href="https://demo.graygrids.com/themes/jobboard/resume.html#" data-toggle="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a>
                      <a class="facebook" target="_blank" data-original-title="facebook" href="https://demo.graygrids.com/themes/jobboard/resume.html#" data-toggle="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a>
                      <a class="google" target="_blank" data-original-title="google-plus" href="https://demo.graygrids.com/themes/jobboard/resume.html#" data-toggle="tooltip" data-placement="top"><i class="fa fa-google"></i></a>
                      <a class="linkedin" target="_blank" data-original-title="linkedin" href="https://demo.graygrids.com/themes/jobboard/resume.html#" data-toggle="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a>
                    </div> --}}
                  </div>                  
                </div>
                <div class="about-me item">
                  <h3>About Me <i class="ti-pencil"></i></h3>
                  <p>{{auth()->user()->about_me ?? null}}</p>
                </div>
                <div class="work-experence item">
                  <h3>Work Experience <i class="ti-pencil"></i></h3>
                  <div>{{auth()->user()->past_experience ?? null}} </div>
                </div>
                  {{-- <h4>UI/UX Designer</h4>
                  <h5>Bannana INC.</h5>
                  <span class="date">Fab 2017-Present(5year)</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero vero, dolores, officia quibusdam architecto sapiente eos voluptas odit ab veniam porro quae possimus itaque, quas! Tempora sequi nobis, atque incidunt!</p>
                  <p><a href="https://demo.graygrids.com/themes/jobboard/resume.html#">4 Projects</a></p> --}}
                  <br>
                  {{-- <h4>UI Designer</h4>
                  <h5>Whale Creative</h5>
                  <span class="date">Fab 2017-Present(2year)</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero vero, dolores, officia quibusdam architecto sapiente eos voluptas odit ab veniam porro quae possimus itaque, quas! Tempora sequi nobis, atque incidunt!</p>
                  <p><a href="https://demo.graygrids.com/themes/jobboard/resume.html#">4 Projects</a></p>
                </div> --}}
                <div class="education item">
                  <h3>Education <i class="ti-pencil"></i></h3>
                  <div>{{auth()->user()->education ?? null}} </div>
                  {{-- <h4>Massachusetts Institute Of Technology</h4>
                  <p>Bachelor of Computer Science</p>
                  <span class="date">2010-2014</span>
                  <br>
                  <h4>Massachusetts Institute Of Technology</h4>
                  <p>Bachelor of Computer Science</p>
                  <span class="date">2010-2014</span> --}}
                </div>
              </div>
            </div>
          </div>
        </div>      
      </div>
@endsection
