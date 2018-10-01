@extends('layouts.app')

<style type="text/css">
	.login-form {
		width: 380px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 20px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>


@section('content')


<div class="text-center">
<img class="mb-4" src="/images/Logo1.png" alt="" width="180" height="180">
<div class="login-form">
    <h2 class="text-center"></h2>   
    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
    @csrf
        <div class="form-group">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email address"name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="password" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
             <button type="submit" class="btn btn-primary btn-lg">
                {{ __('Login') }}
            </button>
        </div>

        <div class="clearfix">
            <div class="form-check">
                <input class="form-check-input pull-left" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div> 


    </form>
    <a href="http://127.0.0.1:8000/register" class="pull-right">Create an Account</a>
    
    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
</div>
</div>
@endsection