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
                        <div class="card z-index-0 shadow-none">
                        <div class="card-header ">
                        <h4 class="font-weight-bolder">Register</h4>
                         
                        </div>
                      
                        <div class="card-body">
                            <form method="POST" action="{{ route('register.perform') }}">
                                @csrf
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="username" autofocus class="form-control" placeholder="Username" aria-label="Name" value="{{ old('username') }}" >
                                    @error('username') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="firstname" class="form-control" placeholder="First Name" aria-label="" value="{{ old('firstname') }}" >
                                    @error('firstname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>

                                <div class="flex flex-col mb-3">
                                    <input type="text" name="lastname" class="form-control" placeholder="Last Name" aria-label="" value="{{ old('lastname') }}" >
                                    @error('lastname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ old('email') }}" >
                                    @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <input type="hidden" name="role" value="1">
                                <input type="hidden" name="vrfy" value="0">
                                
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                                    @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="form-check form-check-info text-start">
                                    <input class="form-check-input" type="checkbox" name="terms" id="flexCheckDefault" >
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and
                                            Conditions</a>
                                    </label>
                                    @error('terms') <p class='text-danger text-xs'> {{ $message }} </p> @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 my-4 mb-2">Sign up</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}"
                                        class="text-info font-weight-bolder">Sign in</a></p>
                            </form>
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
    @include('layouts.footers.guest.footer')
@endsection
