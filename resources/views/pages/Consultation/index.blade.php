@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Consultation'])
    <div class="container-fluid py-4">
       
    
        <div class="row mt-4">
        <div class="card">
            <div class="card-body">
               Consultation
            </div>
        </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
