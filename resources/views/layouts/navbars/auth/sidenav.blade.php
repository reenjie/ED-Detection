<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 fixed-start "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <!-- <img src="http://clipart-library.com/images/6ip5XkpXT.png" class="navbar-brand-img h-100" alt="main_logo"> -->
            <span class="ms-1 font-weight-bold">Early Disease Detection</span>
            <br>
            <span style="font-size:11px">CMS SYSTEM</span>
            <br>
            {{-- {{request()->url()}} --}}
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main" style="height:100vh">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-chart-line  text-sm opacity-10" style="color:#3FB06A"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                   
                </div>
                <h6 class="ms-2 text-uppercase  font-weight-bolder opacity-6 mb-0" style="font-size:10px">Manage</h6>
            </li>

            @if(Auth::user()->role==0)
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'Species') == true ? 'active' : '' }}" href="{{ route('species') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-layer-group text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Species </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'Diseases') == true ? 'active' : '' }}" href="{{ route('disease') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-virus text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Diseases</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'Consultation') == true ? 'active' : '' }}" href="{{ route('consultation') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-sms text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Consultation</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'user-management']) }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>

            @else 
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'Consultation') == true ? 'active' : '' }}" href="{{ route('consultation') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-sms text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">My Consultation</span>
                </a>
            </li>


            @endif
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>

           
            
       

          
          
            {{-- <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'tables') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'tables']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-xx text-sm opacity-10" style="color:#3FB06A"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
            </li> --}}

       
        </ul>
    </div>

</aside>
