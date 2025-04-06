<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="right-sideabr">
      <div class="inner-box">
        <h4>Manage Account</h4>
        <ul class="lest item">
          @if(Auth::check() && Auth::user()->role === 'user')
          <li><a class="{{request()->is('my_resume')=='true'?'active':''}}" href="{{route('my_resume')}}">My Resume</a></li>
          <li><a class="{{request()->is('update_profile')=='true'?'active':''}}" href="{{route('update_profile')}}">Update Profile</a></li>
          <li><a class="{{request()->is('job_alerts')=='true'?'active':''}}" href="{{route('my_applied_jobs')}}">My Applied Jobs <span class="notinumber">2</span></a></li>
          @elseif(Auth::check() && Auth::user()->role === 'hr')
          <li><a class="{{request()->is('post_job')=='true'?'active':''}}" href="{{route('post_job')}}">Add Job</a></li>
          <li><a class="{{request()->is('manage_jobs')=='true'?'active':''}}" href="{{route('manage_jobs')}}">Manage Jobs</a></li>
          <li><a class="{{request()->is('manage_applications')=='true'?'active':''}}" href="{{route('manage_applications')}}">Manage Applications</a></li>
          <li><a class="{{request()->is('update_hr_profile_settings')=='true'?'active':''}}" href="{{route('update_hr_profile_settings')}}">Update Profile</a></li>
          @endif
        </ul>
        <ul class="lest">
          <li><a href="{{route('logout')}}">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>