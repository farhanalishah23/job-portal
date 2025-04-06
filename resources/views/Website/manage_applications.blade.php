@extends('Website.layout.master')
@section('content')
   <!-- Page Header Start -->
   <div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Manage Applications</h2>
            <ol class="breadcrumb">
              <li><a href="#"><i class="ti-home"></i> Home</a></li>
              <li class="current">Manage Applications</li>
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
            <h3 class="alerts-title">Manage applications</h3>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Candidate</th>
                    <th scope="col">Job Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($appliedJobs as $index=>$job)
                  <tr>
                    <th>{{++ $index}}</th>
                    <td>{{$job->job->job_title ?? 'No job found'}}</td>
                    <td>{{$job->candidate_name ?? 'no user found'}}</td>
                    <td>
                      <span class="@if($job->status == 'accepted') badge badge-success @elseif($job->status == 'rejected') badge badge-danger  { @elseif($job->status == 'applied') badge badge-info @endif">
                          {{ $job->status ?? 'no status found' }}
                      </span>
                     </td>
                    <td>
                      <a href="{{route('view_applied_job',[$job->id])}}" class="btn btn-warning">View</a>
                      @if( $job->status == 'applied')
                      <a href="{{route('update_applied_job_status' , [$job->id , 'accepted'])}}" class="btn btn-success">Accept</a>
                      <a href="{{route('update_applied_job_status' ,[$job->id , 'rejected'])}}"  class="btn btn-danger">Reject</a>
                      @endif
                    </td>
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
@push('js')
@if(session('message'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        Swal.fire({
            title: "{{ session('title') }}",
            text: "{{ session('message') }}",
            icon: "{{ session('icon') }}",
        });
    </script>
@endif
