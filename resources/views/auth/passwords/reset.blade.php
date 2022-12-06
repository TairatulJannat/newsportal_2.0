{{-- @extends('layouts.app') --}}
@extends('backend.layouts.app')

@section('content')

    <style>
        .wrapper a.login-link{
            position: fixed;
            top: 0;
            right: 0;
            font-weight: bold;
            margin: 0.5rem 1rem;
            color: #c689ff;
            opacity: .5;
        }
        .wrapper a.login-link:hover{
            opacity: 1;
        }
    </style>
    
    <div class="wrapper wrapper-full-page">
        <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset("public/admin/assets/img/login.jpg") }}'); background-size: cover; background-position: top center;">
            
            <div class="container">
                <a class="login-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto text-center">
                        <form class="form" method="POST" action="{{ route('password.update') }}">
                        @csrf
                            <div class="card card-login card-hidden">
                                <div class="card-header card-header-primary text-center">
                                    <h4 class="card-title m-0">{{ __('Reset Password') }}</h4>
                                </div>
                                <div class="card-body ">
                                    
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <span class="md-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">email</i>
                                                </span>
                                            </div>
                                            
                                            <input id="email" type="email" class="mb-3 form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="E-mail" autofocus>
        
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </span>
                                    <span class="md-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">lock_outline</i> 
                                                </span>
                                            </div>
                                            
                                            <input id="password" type="password" class="mb-3 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </span>
                                    <span class="md-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                            </div>
                                            
                                            <input id="password-confirm" type="password" class="mb-3 form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm New Password">

                                        </div>
                                    </span>
                                </div>
                                <div class="card-footer justify-content-center">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- <div class="container">
        <div class="row justify-content-center acc-recovery mb-5">
            <div class="col-lg-5 col-md-8 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('Reset Password') }}</h1>
                        <p>Create a new strong password that you don't use for other websites.</p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row email-form">

                                <label for="email" class="col-form-label text-md-left email-label">{{ __('E-Mail Address') }}</label>
                                <br>
                                <input id="email" type="email" class="mb-3 form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="password" class="col-form-label text-md-left email-label">{{ __('Password') }}</label>
                                <br>

                                <input id="password" type="password" class="mb-3 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="password-confirm" class="col-form-label text-md-left email-label">{{ __('Confirm Password') }}</label>
                                <br>
                                <input id="password-confirm" type="password" class="mb-3 form-control" name="password_confirmation" required autocomplete="new-password">

                                <button type="submit" class="btn btn-info mt-3 reset">
                                    {{ __('Reset Password') }}
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection


