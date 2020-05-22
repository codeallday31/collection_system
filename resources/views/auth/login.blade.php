@extends('layouts.app')
@section('bodyClass') layout-login-centered-boxed @endsection

@section('customCss') 
<style>
[dir=ltr] .layout-login-centered-boxed {
    height: 85vh;
}
</style>
@endsection

@section('content')
<div class="layout-login-centered-boxed__form card justify-content-center">
    <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-3 navbar-light">
        <a href="index.html" class="navbar-brand flex-column mb-2 align-items-center mr-0" style="min-width: 0">
            <img src="{{ asset('img/cam.jpg') }}" alt="logo" width="90%" class="ml-4">
        </a>
    </div>
    <form action="{{ route('login')}}" method="POST">
        @csrf
        <div class="form-group">
            <label class="text-label  {{ $errors->has('username') || $errors->has('email') ? 'text-danger' : '' }}" for="useremail">Email Address:</label>
            <div class="input-group input-group-merge">
                <input 
                    id="useremail" 
                    type="text" 
                    required="" 
                    class="form-control form-control-prepended {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" 
                    placeholder="Email address/Username"
                    name="useremail"
                    autofocus
                    value="{{ old('username') ?: old('email') }}"
                >
                
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="far fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="invalid-feedback">Please provide a valid city.</div>
        </div>
        <div class="form-group">
            <label class="text-label {{ $errors->has('username') || $errors->has('email') ? 'text-danger' : '' }}" for="password">Password:</label>
            <div class="input-group input-group-merge">
                <input 
                    id="password" 
                    type="password" 
                    required="" 
                    class="form-control form-control-prepended {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" 
                    placeholder="Password"
                    name="password"
                >
                @if ($errors->has('username') || $errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                    </span>
                @endif
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fa fa-key"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Login</button>
        </div>
        {{-- <div class="form-group text-center">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked="" id="remember">
                <label class="custom-control-label" for="remember">Remember me for 30 days</label>
            </div>
        </div> --}}
        {{-- <div class="form-group text-center">
            <a href="">Forgot password?</a> <br>
            Don't have an account? <a class="text-body text-underline" href="signup-centered-boxed.html">Sign up!</a>
        </div> --}}
    </form>
</div>
@endsection