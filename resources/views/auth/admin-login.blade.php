@extends('dashboard.layouts.app')
@section('title', 'about')
@section('content')

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            @if(\Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <div class="alert-body">
                                        {{ \Session::get('success') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            {{ \Session::forget('success') }}
                            @if(\Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <div class="alert-body">
                                        {{ \Session::get('error') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user"  action="{{route('admin.login.submit')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                   id="email" name="email" aria-describedby="emailHelp"
                                                   placeholder="Enter Email Address...">
                                            @if ($errors->has('email'))
                                                <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                   id="password" name="password" placeholder="Password">
                                            @if ($errors->has('password'))
                                                <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100" tabindex="4">Sign in</button>
                                        <hr>
{{--                                        <a href="index.html" class="btn btn-google btn-user btn-block">--}}
{{--                                            <i class="fab fa-google fa-fw"></i> Login with Google--}}
{{--                                        </a>--}}
{{--                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">--}}
{{--                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook--}}
{{--                                        </a>--}}
                                    </form>
{{--                                    <hr>--}}
{{--                                    <div class="text-center">--}}
{{--                                        <a class="small" href="forgot-password.html">Forgot Password?</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="text-center">--}}
{{--                                        <a class="small" href="register.html">Create an Account!</a>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


{{--    <div class="auth-wrapper auth-basic px-2">--}}
{{--        <div class="auth-inner my-2">--}}
{{--            <!-- Login basic -->--}}
{{--            @if(\Session::get('success'))--}}
{{--                <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--                    <div class="alert-body">--}}
{{--                        {{ \Session::get('success') }}--}}
{{--                    </div>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            {{ \Session::forget('success') }}--}}
{{--            @if(\Session::get('error'))--}}
{{--                <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--                    <div class="alert-body">--}}
{{--                        {{ \Session::get('error') }}--}}
{{--                    </div>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <div class="card mb-0">--}}
{{--                <div class="card-body">--}}
{{--                    <h2 class="brand-text text-primary ms-1">Admin Login</h2>--}}

{{--                    <form class="auth-login-form mt-2" action="{{route('admin.login.submit')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class="mb-1">--}}
{{--                            <label for="email" class="form-label">Email</label>--}}
{{--                            <input type="text" class="form-control" id="email" name="email" value="{{old('email') }}" autofocus />--}}
{{--                            @if ($errors->has('email'))--}}
{{--                                <span class="help-block font-red-mint">--}}
{{--                                <strong>{{ $errors->first('email') }}</strong>--}}
{{--                            </span>--}}
{{--                            @endif--}}
{{--                        </div>--}}

{{--                        <div class="mb-1">--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <label class="form-label" for="password">Password</label>--}}
{{--                                <a href="{{url('auth/forgot-password-basic')}}">--}}
{{--                                    <small>Forgot Password?</small>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="input-group input-group-merge form-password-toggle">--}}
{{--                                <input type="password" class="form-control form-control-merge" id="password" name="password" tabindex="2" />--}}
{{--                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>--}}
{{--                            </div>--}}
{{--                            @if ($errors->has('password'))--}}
{{--                                <span class="help-block font-red-mint">--}}
{{--                                <strong>{{ $errors->first('password') }}</strong>--}}
{{--                            </span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-primary w-100" tabindex="4">Sign in</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /Login basic -->--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
