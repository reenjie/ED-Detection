

<div class="row">
    @if(count($messages)>=1)                 
@foreach ($messages as $item)
    @if($item->Sender == Auth::user()->id)
      {{-- From me--}}
      <div class="col-md-6 mb-2"></div>
      <div class="col-md-6 mb-2">
          <div class="card bg-light mb-2 shadow">
              <div class="card-body">
                <button data-id="{{$item->id}}" class="text-secondary deletemessage" style="border:none;outline:none;float:right" style="float: right"><i class="fas fa-trash"></i></button>
                  <h6 style="font-size:14px">Me
                  <br>
                  <span style="font-size:11px;font-weight:normal">{{date('h:i a Fj,Y',strtotime($item->created_at))}}</span>
                  </h6>
                 
                  <hr>
                  <span style="font-size:13px">
                      {{$item->Message}}
                  </span>
  
                
              </div>
          </div>
      </div>
    @else 
          {{-- ChatMate --}}
    <div class="col-md-6 mb-2">
     
        <div class="card shadow">
            <div class="card-body mb-2">
                <h6 style="font-size:14px">From another User
                <br>
                <span style="font-size:11px;font-weight:normal">{{date('h:i a Fj,Y',strtotime($item->created_at))}}</span>
                </h6>
                <hr>
                <span style="font-size:13px">
                  {{$item->Message}}
                </span>

              
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-2"></div>
    @endif
@endforeach
@else 
<h6 style="text-align: center">
    <img src="{{asset('assets/Noconvo.svg')}}" style="width:400px" alt="">
    <br>
    No Conversation yet.. 
    <br>
    <span class="text-danger" style="font-size:12px">Type Below To Start a Conversation</span>
</h6>
@endif

  


  
  
 </div>

 <script>
    $('.deletemessage').click(function(){
        $(this).html('<div class="spinner-border text-primary spinner-border-sm" role="status"><span class="visually-hidden"></span></div>');
        var id = $(this).data('id');
        $.ajax({
            method: "GET",
            url: "{{route('deletemessage')}}",
            data: { id:id }
            })
            .done(function( msg ) {
              $(this).html('<i class="fas fa-trash"></i>');
            });
    })
 </script>