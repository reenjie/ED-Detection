@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Diseases'])
    <div class="container-fluid py-4">
       
    
        <div class="row mt-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                          
                          
                            @if(session()->has('species'))
                            <h5>Managing {{session()->get('species')[0]['Type']}} <i class="fas fa-cogs"></i></h5>
                            <br>
                            <button onclick="reset()" class="btn btn-dark btn-sm">Back</button>
                            @else
                            <h5>Select Species to Manage <i class="fas fa-cogs"></i></h5>
                            <br>
                            <select name="" class="form-select" id="typeofspecies">
                                <option value="">Type of Species</option>
                                @foreach ($data as $item)
                                    <option value="{{$item->id}}">{{$item->Type}}</option>
                                @endforeach
                            </select>
                            @endif

                            <div class="row">
                                @if(session()->has('species'))
                @foreach (session()->get('species') as $row)
                <div class="col-md-12 mb-5">
                   
                        <div class="card border  shadow-md bg-light">

                            <div class="card-header">
                                <h5 style="font-weight:bold">{{$row->Type}}</h5>
                            </div>
                          
                            <div class="card-body">
                               
                @if(session()->has('alert'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="text-light" style=""><i class="fas fa-check-circle"></i> {{session()->get('alert')}}  </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-size: 17px;padding-top:15px"><i class="fas fa-times-circle"></i></button>
                   </div>
                @endif

                @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong class="text-light" style=""><i class="fas fa-exclamation-triangle"></i> {{session()->get('error')}}  </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-size: 17px;padding-top:15px"><i class="fas fa-times"></i></button>
                   </div>
                @endif
             
                                @php
                                $btn = '<i class="fas fa-cog"> Manage</i>';
                            @endphp
                            @include('layouts.modal',[
                                'type'=>'addDisease',
                                'class'=>'add',
                                'modalheader'=>'Adding Options','id'=>$row->id,
                                'btn'=>$btn
                                ])
                                <span class="  text-dark bg-light p-1" style="font-size:12px;border-radius:10px;float:right">
                                <i class="fas fa-info-circle"></i>    To update contents. Tap and type.
                                    <br>
                                    Changes will be saved accordingly.
                                   </span> 
                                <div class="table-responsive">

                              
                              
                                <table class="table border-dark  table-bordered table-striped  table-sm" style="border-radius: 10px">
                                    <thead>
                                      <tr class="table-dark">
                                       
                                        <th scope="col">Disease</th>
                                        <th scope="col">Symptoms</th>
                                        <th scope="col">Treatment</th>
                                       <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @foreach (session()->get('disease') as $disease)
                                        <tr>
                                            <td scope="row" style="font-weight:bold;text-align:center;">
                                                <br>
                                                
                                            <input type="text" value="{{$disease->Name}}" style="width: 100%;outline:none;border:none;background-color:transparent;text-align:center;font-weight:bold;color:rgb(110, 45, 45)" class="update" data-table="disease" data-id="{{$disease->id}}" name="" id="">
                                         
                                            </td>
                                            <td>
                                              
                                                 
                                                        @foreach ($symptoms as $s)
                                                        @if($s->DiseaseID == $disease->id)
                                                      

                                                  
                                                       <textarea class="form-control mb-2  update" name="" style="background-color: transparent;width:100%;"  id=""  rows="3"
                                                    data-table="symptom" data-id="{{$s->id}}"
                                                       >{{$s->Content}}</textarea>
                                                      
                                                     
                                                    @php
                                            $id = $s->id;
                                                    @endphp
                                                    
                        <button type="button" class="btn btn-light text-success btn-sm" data-bs-toggle="modal" data-bs-target="#dd{{$s->id}}">
                        View  <i class="fas fa-image"></i>
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="dd{{$s->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                </div>
                            
                            
                                @include('pages.Disease.view')
                            
                        
                            </div>
                            </div>
                        </div>
                                                  
                                                        @endif
                                                        
                                                        @endforeach    
                                                     
                                               

                                            </td>
                                            <td>
                                                @foreach ($treatment as $t)
                                                @if($t->DiseaseID == $disease->id )
                                                   {{$t->Content}}  
                                                   @endif
                                                @endforeach
                                            </td>
                                            <td >
                                                <button 
                                                onClick="Delete({{$disease->id}})"
                                                class="btn btn-light btn-sm text-danger" style="float: right"><i class="fas fa-trash"></i></button>
                                            </td>
                                            
                                          </tr>   
                                        @endforeach
                                     
                                      
                                    </tbody>
                                  </table>

                                </div>
                                </div>
                        </div>
                   
                </div>
                @endforeach
                              @endif
                          
                            </div>
                       
                        </div>
                    </div>

                  
                    {{-- @foreach ($data as $item)
                 

                    
                    @endforeach --}}
                    
                </div>
               
               

            </div>
        </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
    <script>
            function Delete(id){

swal({
title: "Are you sure?",
text: "All Symptoms created will be Deleted as well. Proceed? ",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
window.location.href="{{route('deletedisease')}}?id="+id;
} 
});
}

$('.update').keyup(function(){
    var value = $(this).val();
    var id =$(this).data('id');
    var table = $(this).data('table');

            $.ajax({
            method: "GET",
            url: "{{route('updatetext')}}",
            data: { id: id, table: table,value:value }
            })
            .done(function( msg ) {
               
            });
            })

        function reset(){
            window.location.href="{{route('resetSelection')}}";
        }
        $('#typeofspecies').change(function(){
           window.location.href="{{route('sortdisease')}}?id="+$(this).val();
        })
    </script>
@endsection
