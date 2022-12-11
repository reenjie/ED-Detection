@extends('layouts.app')

@section('content')
 <style>
    body {
        overflow-y:hidden
    }
    </style>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.guest.navbar')
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0"></p>
                                </div>

                                <div class="card-body">
                                  
                                    @if(session()->has('Success'))
                                    <div class="alert alert-success text-light">
                                        {{session()->get('Success')}}
                                    </div>
                                    @endif
                                    <form role="form" method="POST" action="{{ route('login.perform') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="email" autofocus placeholder="Email" name="email" class="form-control form-control-lg" value="{{ old('email')}}" aria-label="Email">
                                            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="password" placeholder="Password" class="form-control form-control-lg" aria-label="Password" >
                                            @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-1 text-sm mx-auto">
                                        Forgot you password? Reset your password
                                        <a href="{{ route('reset-password') }}" class="text-info text-gradient font-weight-bold">here</a>
                                    </p>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="{{ route('register') }}" class="text-info text-gradient font-weight-bold">Sign up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100  pe-0 position-absolute top-1 end-3 text-center justify-content-center flex-column">
                            <div class="position-relative  h-100   d-flex flex-column justify-content-center overflow-hidden px-5"
                                >
                                <img src="{{asset('img/sidebg.svg')}}" width="80%"/>
                                <h4 class="text-primary mt-5  font-weight-bolder position-relative">"Early Desease Detection"</h4>
                                <p class="text-info text-gradient position-relative">Prevention is Better then Cure.</p>
                               
                              
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
