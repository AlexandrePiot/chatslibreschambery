@extends('layouts.app')

@section('content')
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->

<form method="POST" action="{{ route('login') }}">
	@csrf

	<section class="form-gradient">

	    <!--Form with header-->
	    <div class="card">

	        <!--Header-->
	        <div class="header pt-3 peach-gradient">

	            <div class="row d-flex justify-content-center">
	                <h3 class="white-text mb-3 pt-3 font-weight-bold">Se connecter</h3>
	            </div>

	        </div>
	        <!--Header-->

	        <div class="card-body mx-4 mt-4">

	            <!--Body-->
	            <div class="md-form">
	                <input type="text" id="Form-email3" class="form-control">
	                <label for="Form-email3">Adresse mail</label>
	            </div>

	            <div class="md-form pb-1 pb-md-3">
	                <input type="password" id="Form-pass3" class="form-control">
	                <label for="Form-pass3">Mot de passe</label>
	                <p class="font-small grey-text d-flex justify-content-end">Forgot <a href="#" class="dark-grey-text ml-1 font-weight-bold"> Password?</a></p>
	            </div>


	            <!--Grid row-->
	            <div class="row d-flex align-items-center mb-4">

	                <!--Grid column-->
	                <div class="col-md-1 col-md-5 d-flex align-items-start">
	                    <div class="text-center">
	                        <button type="button" class="btn btn-grey btn-rounded z-depth-1a">Log in</button>
	                    </div>
	                </div>
	                <!--Grid column-->

	                <!--Grid column-->
	                <div class="col-md-7">
	                    <p class="font-small grey-text d-flex justify-content-end mt-3">Don't have an account? <a href="#" class="dark-grey-text ml-1 font-weight-bold"> Sign up</a></p>
	                </div>
	                <!--Grid column-->

	            </div>
	            <!--Grid row-->
	        </div>

	    </div>
	    <!--/Form with header-->

	</section>
</form>
@endsection
