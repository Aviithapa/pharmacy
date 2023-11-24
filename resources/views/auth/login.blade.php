@extends('auth.app')

@section('content')
       <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-10">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-none d-lg-block p-2">
                                <img src="assets/images/auth-img.jpg" alt="" class="img-fluid rounded h-100">
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand p-4">
                                        <a href="{{ url('/') }}" class="logo-dark">
                                           <h4 class="fs-20"> Pharmacy Management System </h4>
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <h4 class="fs-20">Sign In</h4>
                                        <p class="text-muted mb-3">Enter your email address and password to access
                                            account.
                                        </p>

                                        <!-- form -->
                                        <form action="{{ url('/login') }}" method="POST">
                                             @csrf
                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Email address</label>
                                                <input class="form-control" type="email" id="emailaddress" required=""
                                                    placeholder="Enter your email" value="{{ old('email') }}" name="email">
                                            </div>
                                            <div class="mb-3">
                                                <a href="{{ url('/resetPassword') }}" class="text-muted float-end"><small>Forgot
                                                        your
                                                        password?</small></a>
                                                <label for="password" class="form-label">Password</label>
                                                <input class="form-control" type="password" required="" id="password"
                                                    placeholder="Enter your password" name="password" value="{{ old('password') }}">
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="checkbox-signin" name="remember" value="{{ old('remember') }}">
                                                    <label class="form-check-label" for="checkbox-signin">Remember
                                                        me</label>
                                                
                                                </div>
                                            </div>

                                            @if($errors->first('email'))
                                             <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                   {{ $errors->first('email') }}
                                             </div>
                                             @endif
                                              @if($errors->first('active'))
                                             <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                               {!! $errors->first('active') !!}
                                             </div>
                                             @endif
                                            <div class="mb-0 text-start">
                                                <button class="btn btn-soft-primary w-100" type="submit"> <span class="fw-bold">Log
                                                        In</span> </button>
                                            </div>


                                        </form>
                                        <!-- end form-->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    {{-- <p class="text-dark-emphasis">Don't have an account? <a href="auth-register.html"
                            class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Sign up</b></a> --}}
                    {{-- </p> --}}
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
        
@endsection