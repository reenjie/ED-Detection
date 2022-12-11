@extends('layouts.app')

@section('content')
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
                            
                                @if(session()->has('resetting'))
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Reset Code Send Successfully!</h4>
                                    <p class="mb-0">Enter your reset Code to change your password.</p>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('confirmresetcode')}}" method="post">
                                        @csrf
                                    <input type="number" name="resetcode" autofocus style="text-align: center" class="form-control p-4 mb-2" >

                                    <button class="form-control mt-3 btn btn-success">CONFIRM</button>
                                </form>
                                </div>
                                @else 
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Reset your password</h4>
                                    <p class="mb-0">Enter your email and please wait a few seconds</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('resetpassword') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="password" placeholder="New Password" class="form-control mb-2" name="newpassword">
                                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="{{ old('email') }}" aria-label="Email">
                                            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Send Reset Code</button>
                                        </div>
                                    </form>
                                </div>
                                @endif
                            
                                <div id="alert">
                                    @include('components.alert')
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
            </div>
        </section>
    </main>
@endsection
