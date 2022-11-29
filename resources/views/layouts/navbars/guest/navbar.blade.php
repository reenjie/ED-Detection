<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav
                class="navbar navbar-expand-lg  shadow-none  top-0 z-index-5 @if(Route::current()->getName() == 'register' ||  Route::current()->getName() == 'login') @else bg-light @endif" aria-current="page"
                                    href="{{ route('home') }}   ">
                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('home') }}">
                       E-Disease Detection
                    </a>
                    
                    <button class="navbar-toggler @if(Route::current()->getName() == 'home') d-none  @endif shadow-none ms-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="@if(Route::current()->getName() == 'home')  @else collapse  @endif  navbar-collapse" id="navigation">
                        <ul class="navbar-nav">
                           
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center me-2 @if(Route::current()->getName() == 'register' ||  Route::current()->getName() == 'login') @else active @endif" aria-current="page"
                                    href="{{ route('home') }}">
                                    <i class="fa fa-home opacity-6 text-dark me-1"></i>
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2 @if(Route::current()->getName() == 'register') active  @endif" href="{{ route('register') }}">
                                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                    Sign Up
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2 @if(Route::current()->getName() == 'login') active  @endif" href="{{ route('login') }}">
                                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                    Sign In
                                </a>
                            </li>

                          
                        </ul>
                      
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>

<style>
    #btn{
        position:fixed;
        bottom :10px;
        right:30px;
    }

</style>
<div >
    <button id="btn" class="btn btn-danger btn-rounded" ><i style="font-size:22px" class="fas fa-envelope"></i></button>
</div>