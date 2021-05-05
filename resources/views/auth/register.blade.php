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
                            <p class="lead">Registeration</p>
                        </div>
                        <form class="form-auth-small" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="signin-email" class="control-label sr-only">Email</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

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
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">Password</label>
                                <input type="password" class="form-control"
                                    id="signin-password  @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">Confirm Password</label>
                                <input type="password" class="form-control"
                                    id="password" name="password_confirmation" required placeholder="Confirm Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block">Rrgister</button>
                            <div class="bottom">
                                <span class="helper-text">
                                    <i class="fa fa-lock"></i>
                                    <a href="{{ route('login') }}">Login</a></span>
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
    @endsection
