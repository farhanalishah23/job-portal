@extends('backend.layout.master')
@section('content')
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Job</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-dashboard"></i>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                     <!-- Notifications Dropdown -->
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Notifications <i class="fa fa-bell"></i>
                            <span class="badge">{{ count($notifications) }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($notifications as $notification)
                                <li>
                                    <a href="{{route('job_detail' , [$notification->job_id])}}">
                                        {{ $notification->admin_message ?? 'No message available' }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                </ul>
            </div>
        </div>
    </nav>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Job Status</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>S.No</th>
                                    <th>Hr Name</th>
                                    <th>Job title</th>
                                    <th>Job status</th>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $index => $job)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $job->hr->name ?? '' }}</td>
                                            <td>{{ $job->job_title ?? '' }}</td>
                                            <td>
                                                <a href="{{ route('update_job_status', ['id' => $job->id, 'status' => $job->status === 'active' ? 'inactive' : 'active']) }}"
                                                    class="badge {{ $job->status === 'active' ? 'badge-success' : 'badge-danger' }}">
                                                    {{ ucfirst($job->status) }}
                                                </a>
                                            </td>
                                        <tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    @if (session('message'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            Swal.fire({
                title: "{{ session('title') }}",
                text: "{{ session('message') }}",
                icon: "{{ session('icon') }}",
            });
        </script>
    @endif
