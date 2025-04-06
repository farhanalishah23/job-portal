{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('Website.layout.master')
@section('content')
  <!-- Page Header Start -->
  <div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">         
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Login</h2>
            <ol class="breadcrumb">
              <li><a href="https://demo.graygrids.com/themes/jobboard/my-account.html#"><i class="ti-home"></i> Home</a></li>
              <li class="current">Login</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Header End -->   

  <div id="content" class="my-account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">  
          <div class="my-account-form">
            <ul class="cd-switcher" style="text-align: center;" !important>
              <h2><a class="selected" href="{{route('login')}}">LOGIN</a></h2>
            </ul>
            <!-- Login -->
            <div id="cd-login" class="is-selected">
              <div class="page-login-form">
                <form role="form" class="login-form" method="post" action="{{route('login')}}">
                    @csrf
                  <div class="form-group is-empty">
                    <div class="input-icon">
                      <i class="ti-user"></i>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>
                  <span class="material-input"></span></div> 
                  <div class="form-group is-empty">
                    <div class="input-icon">
                      <i class="ti-lock"></i>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  <span class="material-input"></span></div> 
                  <button class="btn btn-common log-btn">{{ __('Login') }}</button>
                  <a href="{{ route('auth.google') }}" class="btn btn-danger">
                    <i class="fa fa-google"></i> Login with Google
                </a>
                  <div class="checkbox-item">
                    <div class="checkbox">
                      <label for="rememberme" class="rememberme">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>         
                    <ul>
                        <li><a href="{{route('register')}}">Register</a></li>
                    </ul>               
                  </div> 
                </form>
                @if(session('error'))
                 <div class="alert alert-danger">
                     {{ session('error') }}
                          </div>
                @endif
              </div>
            </div>

            <div class="page-login-form" id="cd-reset-password"> <!-- reset password form -->
              <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
              <form class="cd-form">
                <div class="form-group is-empty">
                  <div class="input-icon">
                    <i class="ti-email"></i>
                    <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">
                  </div>
                <span class="material-input"></span></div> 
                <p class="fieldset">
                  <button class="btn btn-common log-btn" type="submit">Reset password</button> 
                </p>
              </form>
              <p class="cd-form-bottom-message"><a href="https://demo.graygrids.com/themes/jobboard/my-account.html#0">Back to log-in</a></p>
            </div> <!-- cd-reset-password -->
          </div>
        </div>
      </div>
    </div>
  </div> 
@endsection