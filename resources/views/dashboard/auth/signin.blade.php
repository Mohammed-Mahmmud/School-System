@extends('dashboard.layouts.auth.auth-master')
@section('title','Login')
@section('css')

@endsection
@section('content')
        <section class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11"  style="width:50%">
                        <div class="card mb-0" >
                            <div class="row g-0 align-items-center" >
                                
                                <!--end col-->
                                <div class="col-xxl-6 mx-auto" >
                                    <div class="card mb-0 border-0 shadow-none mb-0">
                                        <div class="card-body p-sm-5 m-lg-4">
                                            <div class="text-center mt-5">
                                                <h5 class="fs-3xl">{{ trans('Dashboard/login_trans.Welcome Back') }}</h5>
                                                <p class="text-muted">{{ trans('Dashboard/login_trans.lss') }}</p>
                                            </div>
                                            <div class="p-2 mt-5">
                                                
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
                                                    @if(App::getLocale()== "ar")
                                                    <div class="mb-3" dir="rtl">
                                                        @else
                                                    <div class="mb-3" >
                                                        @endif
                                                        <label for="email" class="form-label">{{ trans('Dashboard/login_trans.Email') }} <span class="text-danger">*</span></label>
                                                        <div class="position-relative ">
                                                            <input type="email" name="email" class="form-control  password-input" id="email" :value="old('email')" placeholder="Enter email" required autofocus autocomplete="email">
                                                           
                                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                        </div>
                                                    </div>
                            
                                                    @if(App::getLocale()== "ar")
                                                    <div class="mb-3" dir="rtl">
                                                        @else
                                                    <div class="mb-3" >
                                                        @endif
                                                        <div class="float-end">
                                                            <a href="{{ route('password.request') }}" class="text-muted">{{ trans('Dashboard/login_trans.Forgot password?') }}</a>
                                                        </div>
                                                        <label class="form-label" for="password-input">{{ trans('Dashboard/login_trans.Password') }} <span class="text-danger">*</span></label>
                                                        <div class="position-relative auth-pass-inputgroup mb-3 " >
                                                            <input type="password" name="password" class="form-control pe-5 password-input " placeholder="Enter password" id="password-input" required autocomplete="current-password">
                                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        </div>
                                                    </div>
                                    
                                                    
                                                    <div class="form-check" >
                                                        <input class="form-check-input" type="checkbox" value="" id="remember_me" name="remember">
                                                        <label class="form-check-label" for="auth-remember-check">{{ trans('Dashboard/login_trans.Remember me') }} </label>
                                                    </div>
                                                    <br>
                                                    {{-- @if(App::getLocale()== "ar")
                                                    <div class="mb-4" dir="ltr">
                                                        @else
                                                    <div class="mb-4" >
                                                        @endif
                                                        @if (Route::has('password.request'))
                                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                                            {{ __(trans('Dashboard/login_trans.Forgot your password?')) }}
                                                        </a>
                                                    @endif --}}
                                        
                                                 
                                                    
                                                        <button class="btn btn-primary w-100"  type="submit">{{ trans('Dashboard/login_trans.login') }}</button>
                                                    </div>
                            
                                                    <div class="mt-4 pt-2 text-center">
                                                        <div class="signin-other-title position-relative">
                                                            <h5 class="fs-sm mb-4 title">{{ trans('Dashboard/login_trans.Sign In with') }}</h5>
                                                        </div>
                                                        <div class="pt-2 hstack gap-2 justify-content-center">
                                                            <button type="button" class="btn btn-subtle-primary btn-icon"><i class="ri-facebook-fill fs-lg"></i></button>
                                                            <button type="button" class="btn btn-subtle-danger btn-icon"><i class="ri-google-fill fs-lg"></i></button>
                                                            <button type="button" class="btn btn-subtle-dark btn-icon"><i class="ri-github-fill fs-lg"></i></button>
                                                            <button type="button" class="btn btn-subtle-info btn-icon"><i class="ri-twitter-fill fs-lg"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                                @if(App::getLocale()== "ar")
                                                <div class="text-center mt-5" dir="rtl">
                                                    @else
                                                    <div class="text-center mt-5">
                                                    @endif 
                                                    <p class="mb-0">{{ trans("Dashboard/login_trans.Don't have an account ?") }} <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-underline">{{ trans("Dashboard/login_trans.SignUp") }} </a> </p>
                                                </div>
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