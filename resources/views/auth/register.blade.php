{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
                        <h2 class="product-title">Register</h2>
                        <ol class="breadcrumb">
                            <li><a href="https://demo.graygrids.com/themes/jobboard/my-account.html#"><i class="ti-home"></i>
                                    Home</a></li>
                            <li class="current">Register</li>
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
                            <h2><a class="selected" href="{{ route('register') }}">Register</a></h2>
                        </ul>
                        <!-- Login -->
                        <div id="cd-login" class="is-selected">
                            <div class="page-login-form">
                                <form role="form" id="register_form" class="login-form" method="post"
                                    action="{{ route('register') }}">
                                    @csrf
                                    <input name="status" value="active" type="hidden">
                                    <div class="form-group is-empty">
                                        <div class="input-icon">
                                            <i class="ti-user"></i>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" autofocus placeholder="Enter your name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group is-empty">
                                        <div class="input-icon">
                                            <i class="ti-user"></i>
                                            <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Enter your email">
                                            <span id="helpEmail"></span>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group is-empty">
                                        <div class="input-icon">
                                            <select name="role" class="form-control">
                                                <option disabled selected>Select Role</option>
                                                <option name="role" value="hr">HR</option>
                                                <option name="role" value="user">Candidate</option>
                                            </select>
                                        </div>
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group is-empty">
                                        <div class="input-icon">
                                            <i class="ti-lock"></i>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group is-empty">
                                        <div class="input-icon">
                                            <i class="ti-lock"></i>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" autocomplete="new-password">
                                        </div>
                                        <span class="material-input"></span>
                                    </div>
                                    <button id="register_btn" class="btn btn-common log-btn">{{ __('Register') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


