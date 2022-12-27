{{-- @extends('layouts.app') --}}
@extends('layouts.theme.auth')

@section('content')

<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
                    <div class="auth-logo">
                        <a href="index.html" class="logo logo-dark text-center">
                            <span class="logo-lg">
                                <img src="{{ asset('ubold/assets/images/logo-dark.png') }}" alt="" height="22">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light text-center">
                            <span class="logo-lg">
                                <img src="{{ asset('ubold/assets/images/logo-light.png')}}" alt="" height="22">
                            </span>
                        </a>
                    </div>
                </div>

                <!-- title-->
                <h4 class="mt-0">Sign In</h4>
                <p class="text-muted mb-4">Ingrese su usuario y password para acceder al sistema</p>

                <!-- form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror"
                                type="email"  name="email" required autocomplete="email" autofocus
                                placeholder="Enter your email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <a href="auth-recoverpw-2.html" class="text-muted float-end"><small>Forgot your password?</small></a>
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group input-group-merge">

                            <input type="password" id="password" name="password"
                                     class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter your password"
                                    required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>


                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkbox-signin">
                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                        </div>
                    </div>
                    <div class="text-center d-grid">
                        <button class="btn btn-primary" type="submit">Log In </button>
                    </div>
                    <!-- social-->
                    <div class="text-center mt-4">
                        <p class="text-muted font-16">Sign in with</p>
                        <ul class="social-list list-inline mt-3">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                            </li>
                        </ul>
                    </div>
                </form>
                <!-- end form-->

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Don't have an account? <a href="#" class="text-muted ms-1"><b>Sign Up</b></a></p>
                </footer>

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
            <h2 class="mb-3 text-white">BSolution - Sales</h2>
            <p class="lead"><i class="mdi mdi-format-quote-open">
                </i> I've been using your theme from the previous developer for our web app,
                once I knew new version is out, I immediately bought with no hesitation. Great themes,
                good documentation with lots of customization available and sample app that really fit our need.
                <i class="mdi mdi-format-quote-close"></i>
            </p>
            <h5 class="text-white">
                - Compromiso y servicio de primer nivel
            </h5>
        </div> <!-- end auth-user-testimonial-->
    </div>
    <!-- end Auth fluid right content -->
</div>

@endsection
