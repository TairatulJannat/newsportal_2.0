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
                        <form class="form" method="POST" action="{{ route('password.email') }}">
                        @csrf
                            <div class="card card-login card-hidden">
                                <div class="card-header card-header-primary text-center">
                                    <h4 class="card-title m-0">{{ __('Account Recovery') }}</h4>
                                </div>
                                <div class="card-body ">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <span class="md-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">email</i>
                                                </span>
                                            </div>
                                            
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </span>
                                </div>
                                <div class="card-footer justify-content-center">
                                    <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    
    {{-- <div class="container">
        <div class="row justify-content-center acc-recovery">
            <div class="col-lg-5 col-md-8 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('Account Recovery') }}</h1>
                        <p>Please enter your email address to request a password reset.</p>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row email-form">
                                <label for="email" class="col-form-label text-md-left email-label">{{ __('E-Mail Address') }}</label>
                                <br>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                <div class="w-100 p-0 mt-4">
                                    <button type="submit" class="btn btn-info w-100">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
