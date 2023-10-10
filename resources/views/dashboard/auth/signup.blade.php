@extends('dashboard.layouts.auth.auth-master')
@section('title','Register')
@section('css')

@endsection
@section('content') 
<section class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11" style="width:50%">
                <div class="card mb-0">
                    <div class="row g-0 align-items-center">
                     
                        <!--end col-->
                        <div class="col-xxl-6 mx-auto">
                            <div class="card mb-0 border-0 shadow-none mb-0">
                                <div class="card-body p-sm-5 m-lg-4">
                                    <div class="text-center mt-2">
                                        <h5 class="fs-3xl">Create your Admin account</h5>
                                        <p class="text-muted">Get your School Adminstration account now</p>
                                    </div>
                                    <div class="p-2 mt-5">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                    

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input class="form-control"  placeholder="Enter email address" id="email" type="email" name="email" :value="old('email')" required autocomplete="username" >
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                <div class="invalid-feedback">
                                                    Please enter email
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Username <span class="text-danger">*</span></label>
                                                <input  class="form-control"  placeholder="Enter username" id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                <div class="invalid-feedback">
                                                    Please enter username
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password" class="form-control password-input pe-5" onpaste="return false" placeholder="Enter password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required autocomplete="new-password">
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                    <div class="invalid-feedback">
                                                        Please enter password
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="mb-3">
                                                <label class="form-label" for="password_confirmation">Confirm Password" <span class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password" class="form-control password-input pe-5" onpaste="return false" placeholder="Enter password" id="password_confirmation"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password_confirmation" required autocomplete="new-password">
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                    <div class="invalid-feedback">
                                                        Please enter password
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="mb-4">
                                                <p class="mb-0 fs-xs text-muted fst-italic">By registering you agree to the School System <a href="pages-term-conditions.html" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
                                            </div>

                                            <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                <h5 class="fs-sm">Password must contain:</h5>
                                                <p id="pass-length" class="invalid fs-xs mb-2">Minimum <b>8 characters</b></p>
                                                <p id="pass-lower" class="invalid fs-xs mb-2">At <b>lowercase</b> letter (a-z)</p>
                                                <p id="pass-upper" class="invalid fs-xs mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                                <p id="pass-number" class="invalid fs-xs mb-0">A least <b>number</b> (0-9)</p>
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <div class="signin-other-title position-relative">
                                                    <h5 class="fs-sm mb-4 title text-muted">Create account with</h5>
                                                </div>

                                                <div>
                                                    <button type="button" class="btn btn-subtle-primary btn-icon "><i class="ri-facebook-fill fs-lg"></i></button>
                                                    <button type="button" class="btn btn-subtle-danger btn-icon "><i class="ri-google-fill fs-lg"></i></button>
                                                    <button type="button" class="btn btn-subtle-dark btn-icon "><i class="ri-github-fill fs-lg"></i></button>
                                                    <button type="button" class="btn btn-subtle-info btn-icon "><i class="ri-twitter-fill fs-lg"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Already have an account ? <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>

@endsection
@section('script')

<script src="{{asset('dashboard')}}/assets/js/pages/password-addon.init.js"></script>

<!--Swiper slider js-->
<script src="{{asset('dashboard')}}/assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- swiper.init js -->
<script src="{{asset('dashboard')}}/assets/js/pages/swiper.init.js"></script>
@endsection