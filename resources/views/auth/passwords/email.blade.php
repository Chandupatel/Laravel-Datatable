@extends('layouts.app')

@section('content')
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center">

                            </div>
                            <p class="lead">Reset Password</p>
                        </div>
                        <form class="form-auth-small" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="signin-email" class="control-label sr-only">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus id="signin-email"
                                    placeholder="Email">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block">Send Password Reset Link</button>
                            <div class="bottom">
                                <span class="helper-text">
                                    <i class="fa fa-lock"></i>
                                    <a href="{{ route('password.request') }}">Forgot password?</a>
                                </span>
                                <br><br>
                                <span class="helper-text">
                                    <i class="fa fa-lock"></i>
                                    <a href="{{ route('register') }}">Register</a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="right">
                    <div class="overlay"></div>
                    <div class="content text">

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @endsection
