<x-master>
    @section('customcss')
        <style>
            .login-page{
                height: 85vh;
            }
        </style>
    @endsection
    <x-slot name="bodyClass">hold-transition login-page</x-slot>
<div class="login-box">
    <div class="login-logo">
      Admin LTE
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="{{ route('login')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
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
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input 
                        id="password" 
                        type="password" 
                        required="" 
                        class="form-control form-control-prepended {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" 
                        placeholder="Password"
                        name="password"
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if ($errors->has('username') || $errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                        </span>
                    @else 
                        <span class="invalid-feedback">
                            <strong>{{  $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</x-master>