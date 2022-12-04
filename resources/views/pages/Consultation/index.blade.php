@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Consultation'])
    <div class="container-fluid py-4">
       
    
        <div class="row mt-4">
        <div class="card">
            <div class="card-body">
           <div class="row">
            @if(Auth::user()->role== 0)
            @if(session()->has('userid'))

            @else 
            <div class="col-md-4">
                <input type="text " class="form-control" placeholder="type to Search..">
                <ul class="list-group list-group-flush">
                @foreach ($alluserwConsultation as $user)
                <li class="list-group-item">
                    <h6>{{$user->firstname.' '.$user->lastname}}

                        <br>
                        <span style="font-size:11px;font-weight:normal">New Message <span class="badge badge-success bg-success">1</span></span>
                    </h6>
                   
                    <button onclick="window.location.href='{{route('open').'?id='.$user->id}}'" style="float: right;" class="btn btn-link btn-sm">Open</button></li>

              
                @endforeach
                 
                  
                  </ul>
            </div>
            @endif
        
            @endif
            <div class="@if(Auth::user()->role==1 ) col-md-12 @elseif(session()->has('userid'))  col-md-12 @else col-md-8 @endif">

                @if(Auth::user()->role == 0)
                @include('pages.Consultation.admin')

                @else 

            @if(count($checkifexist)>=1)


            <div class="card mb-2 shadow">
                <div class="card-body">
                    @foreach ($checkifexist as $de)
                    <h6>Details:</h6>
                    <span>Issue:</span>
                    <span >
                  
                 

                  <textarea  data-id="{{$de->id}}" class="updateissue" name="" id=""  rows="3"  style="width: 100%;outline:none;border:none;bacgground-color:transparent;">{{$de->Content}}</textarea>
                  
                    </span>

                    <br><br>
                    @if($de->DiseaseID == 0)
                    <span class="text-danger text-sm">Symptoms </span>: <span class="badge badge-light bg-light text-dark">Unknown</span>

                    @php
                    $consultationID = $de->id;
                        @endphp
                    
                    <div style="float: right">
                        <span  class="text-danger text-sm">Disease </span>: <span class="badge badge-danger bg-danger text-light">Unknown</span>
                    </div>

                
                    @else
                    <span class="text-danger text-sm">Symptoms </span>: <span class="badge badge-light bg-light text-dark">Pag TATAE</span>

                    <div style="float: right">
                        <span  class="text-danger text-sm">Disease </span>: <span class="badge badge-danger bg-danger text-light">Hepathishiiiii</span>
                    </div>
                    @endif

                    @if($de->Status == 0)
                    <h6 class="text-danger mt-2">PENDING <i class="fas fa-sync"></i></h6>
                    @else



                    @endif
                    @endforeach
                

                        

                </div>
            </div>
            @if($checkifexist[0]->Status == 0)

            @else 
            @include('pages.Consultation.user')
            @endif
         
            @else 

            <h5>You have no Consultation yet..</h5>

            <hr>
            <form action="{{route('addconsultation')}}" method="post">
                @csrf
           
            <h5>Create Consultation <i class="fas fa-share"></i></h5>
            Issue : 
            <select required name="disease" class="form-select mb-2" id="">
                <option value="">Select Disease</option>
                <option value="Unknown">Unknown</option>
                @foreach ($disease as $item)
                  <option value="{{$item->id}}">{{$item->Name}}</option>  
                @endforeach
                
            </select>

            Details :
            <textarea required name="details" class="form-control mb-2" placeholder="Please indicate Detailed information about the issue or problem of your pets." id="" cols="30" rows="10"></textarea>

            <button type="submit" class="btn btn-success">Submit <i class="fas fa-paper-plane"></i></button>
        </form>
            @endif

                @endif
               

            </div>
           </div>
            </div>
        </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>

    <script>
        $('.updateissue').keyup(function(){
            var id = $(this).data('id');
            var val = $(this).val();


            $.ajax({
            method: "GET",
            url: "{{route('updateconsult')}}",
            data: { id:id,val:val }
            })
            .done(function( msg ) {
            
            });

        })
    </script>
@endsection
