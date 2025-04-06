@extends('Website.layout.master')
@section('content')
  <!-- Page Header Start -->
  <div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Manage Jobs</h2>
            <ol class="breadcrumb">
              <li><a href="https://demo.graygrids.com/themes/jobboard/manage-jobs.html#"><i class="ti-home"></i> Home</a></li>
              <li class="current">Manage Jobs</li>
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
          <div class="job-alerts-item candidates">
            <h3 class="alerts-title">Manage Jobs</h3>
            <table class="table" id="jobs-table">
              <thead>
                <tr>
                  <th scope="col">S.No</th>
                  <th scope="col">Job Title</th>
                  <th scope="col">Company Name</th>
                  <th scope="col">Job Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Job rows will be inserted dynamically here by AJAX -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    fetchJobs();

    function fetchJobs() {
        $.ajax({
            url: '{{ route("fetch_jobs") }}', 
            method: 'GET',
            success: function(response) {
                $('#jobs-table tbody').empty();
                if (response.length === 0) {
                    var noJobMessage = '<tr><td colspan="5" class="text-center">No job created by you</td></tr>';
                    $('#jobs-table tbody').append(noJobMessage);
                } else {
                    $.each(response, function(index, job) {
                        var row = '<tr>';
                        row += '<td>' + (index + 1) + '</td>';
                        row += '<td>' + job.job_title + '</td>';
                        row += '<td>' + (job.company_name || 'No Company') + '</td>';
                        row += '<td>' + job.status + '</td>';
                        row += '<td>';
                        row += '<a href="{{ route('edit_job', '') }}/' + job.id + '" class="btn btn-info">Edit</a> ';
                        row += '<a href="#" class="btn btn-danger delete_job" data-id="' + job.id + '">Delete</a>';
                        row += '</td>';
                        row += '</tr>';
                        $('#jobs-table tbody').append(row);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log("Error fetching jobs:", error);
            }
        });
    }

    $(document).on('click', '.delete_job', function(e) {
        e.preventDefault();
        var jobId = $(this).data('id');  
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route('destroy_job', ['id' => '__id__']) }}'.replace('__id__', jobId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', 
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'The job has been deleted.',
                            icon: 'success',
                        }).then(() => {
                            fetchJobs();
                        });
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'There was an error deleting the job.',
                            icon: 'error',
                        });
                    }
                });
            }
        });
    });
});
</script>