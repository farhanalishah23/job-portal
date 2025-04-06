@extends('Website.layout.master')
@section('content')
   <!-- Page Header Start -->
   <div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">         
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">My Applied Jobs</h2>
            <ol class="breadcrumb">
              <li><a href="https://demo.graygrids.com/themes/jobboard/job-alerts.html#"><i class="ti-home"></i> Home</a></li>
              <li class="current">My Applied Jobs</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Header End --> 

  <!-- Start Content -->
  <div id="content">
    <div class="container">        
      <div class="row">
        @include('Website.layout.sidebar')
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="job-alerts-item">
            <h3 class="alerts-title">My Applied Jobs</h3>
            <table class="table" id="jobs-table">
              <thead>
                <tr>
                  <th scope="col">S.No</th>
                  <th scope="col">Job Title</th>
                  <th scope="col">Status</th>
                  <th scope="col">Company</th>
                </tr>
              </thead>
              <tbody>
                @foreach( $myAppliedJob as $index => $item)
                <tr>
                   <td>{{++$index}}</td>
                   <td>{{$item->job->job_title ?? null}}</td>
                   <td>
                    <span class="@if($item->status == 'accepted') badge badge-success @elseif($item->status == 'rejected') badge badge-danger  { @elseif($item->status == 'applied') badge badge-info @endif">
                      {{$item->status ?? null}}
                  </span>
                   </td>
                   <td>{{$item->job->company_name ?? null}}</td>
                </tr>
            @endforeach
              </tbody>
            </table>
            <!-- Start Pagination -->
            <br>
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
        </div>
      </div>
    </div>      
  </div>
  <!-- End Content -->
@endsection