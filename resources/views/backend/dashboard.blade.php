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
                <a class="navbar-brand" href="#">Dashboard</a>
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
                    <li>
                        <a href="{{route('logout')}}">
                            Log out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Job Statistics</h4>
                            <p class="category">Overview of Available Jobs</p>
                        </div>
                        <div class="content">
                            <div class="job-count">
                                <h2 class="text-center">{{count($jobs)}}</h2> 
                                <p class="text-center">Total Jobs Available</p>
                            </div>
                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-briefcase text-info"></i> Full-time
                                    <i class="fa fa-clock-o text-warning"></i> Part-time
                                    <i class="fa fa-user text-danger"></i> Freelance
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Candidates Statistics</h4>
                            <p class="category">Platform Candidates</p>
                        </div>
                        <div class="content">
                            <div class="job-count">
                                <h2 class="text-center">{{ auth()->user()->where('role', 'user')->count()  ?? '0'}} </h2> 
                                <p class="text-center">Total Candidates Available</p>
                            </div>
                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-briefcase text-info"></i> Full-time
                                    <i class="fa fa-clock-o text-warning"></i> Part-time
                                    <i class="fa fa-user text-danger"></i> Freelance
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">HR Statistics</h4>
                            <p class="category">Overall Platform HR's</p>
                        </div>
                        <div class="content">
                            <div class="job-count">
                                <h2 class="text-center">{{ auth()->user()->where('role', 'hr')->count()  ?? '0'}}</h2> <!-- Replace 150 with the actual count dynamically -->
                                <p class="text-center">Total HRs Available</p>
                            </div>
                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-briefcase text-info"></i> Full-time
                                    <i class="fa fa-clock-o text-warning"></i> Part-time
                                    <i class="fa fa-user text-danger"></i> Freelance
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
