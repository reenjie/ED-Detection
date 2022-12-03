@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Species'])
    <div class="container-fluid ">
        
   

      
    
        <div class="row mt-4">
        <div class="card">
            
            <div class="card-header">
               
             
                <h5 style="font-weight: bold">Class of Species
                    <br>
                <nav aria-label="breadcrumb" style="font-weight: normal;">
                    <ol class="breadcrumb" style="background-color:transparent">
                      <li class="breadcrumb-item" style="font-size:10px">Water</li>
                      <li class="breadcrumb-item" style="font-size:10px">Land</li>
                      <li class="breadcrumb-item" aria-current="page" style="font-size:10px">Air</li>
                    </ol>
                  </nav>
                </h5>

                @if(session()->has('alert'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="text-light" style=""><i class="fas fa-check-circle"></i> {{session()->get('alert')}}  </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-size: 17px;padding-top:15px"><i class="fas fa-times-circle"></i></button>
                   </div>
                @endif
                
           
           
            </div>
            <div class="card-body">
                @php
                    $btn = '<i class="fas fa-plus-circle"> Add</i>';
                @endphp
                @include('layouts.modal',[
                    'type'=>'addSpecies',
                    'class'=>'add',
                    'modalheader'=>'Add Species','id'=>'add',
                    'btn'=>$btn
                    ])

                
            <div class="row">
                @foreach ($data as $item)
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card mb-4 bg-light shadow-lg " style="width: 100%">
                        <div class="card-body">
                            <h5 class="text-dark" style="font-weight: bold">{{$item->Type}}</h5>
                            <h6 style="font-size:14px" class="text-dark">{{$item->Description}}</h6>

                        </div>
                        <div class="card-footer">
                           
                        @php
                            $editbtn = '<i class=" fas fa-edit"></i>';
                        @endphp
                        @include('layouts.modal',[
                            'type'=>'editSpecies','class'=>'edit','modalheader'=>'Edit Species','id'=>$item->id,
                            'btn'=> $editbtn])

                        
                            <button onclick="Delete({{$item->id}})" class="btn btn-light text-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
             

        
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
  text: "Once deleted, you will not be able to recover this! ",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="{{route('deletespecies')}}?id="+id;
  } 
});
        }
    </script>
@endsection
