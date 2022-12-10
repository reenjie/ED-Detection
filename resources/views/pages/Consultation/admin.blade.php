            @if(session()->has('userid'))
                <button onclick="window.location.href='{{route('reselSelections')}}'" class="btn btn-dark btn-sm">Close <i class="fas fa-times"></i></button>

            <div class="card mb-2 shadow">
                <div class="card-body">
                    @foreach (session()->get('userid')['data'] as $ud)
                        <span style="font-size:11px">REQUESTOR</span>
                        <h5>{{$ud->firstname.' '.$ud->lastname}}
                        <br>
                        <span style="font-size:13px;font-weight:normal">
                            {{$ud->email}}
                        </span>
                        </h5>
                    @endforeach

                    <h6>Details:</h6>
                    @foreach (session()->get('userid')['consultation'] as $cons)
                    <span>Issue:</span>
                    <span >
                {{$cons->Content}}
                    </span>
                    @php
                        $consultationID = $cons->id;
                    @endphp

                    <br><br>
                    @if($cons->DiseaseID == 0)
                    <span class="text-danger text-sm">Symptoms </span>: <span class="badge badge-light bg-light text-dark">Unknown</span>

                    <div style="float: right">
                        <span  class="text-danger text-sm">Disease </span>: <span class="badge badge-danger bg-danger text-light">Unknown</span>
                    </div>
                    @else 
                    <span class="text-danger text-sm">Symptoms </span>: <span class="badge badge-light bg-light text-dark">Pag TATAE</span>

                    <div style="float: right">
                        <span  class="text-danger text-sm">Disease </span>: <span class="badge badge-danger bg-danger text-light">Hepathishiiiii</span>
                    </div>
                    @endif
                    
                    
                    @endforeach
               
                    <br>
                    @php
                            $images = DB::select('select * from images where ConsultationID ='.$consultationID.' ');
                    @endphp
                    @if(count($images)>=1)
                    <h6 style="font-size:14px">File Attachments</h6>
                   <div class="row">
                        @foreach ($images as $img)
                        <div class="col-md-2" style="cursor: pointer">
                           <a href="{{asset('attachments').'/'.$img->Photo}}" target="_blank"> <img src="{{asset('attachments').'/'.$img->Photo}}" width="100%" height="100px" alt="">
                           </a>
                        </div> 

              
                        @endforeach
                 
                   </div>

                   @endif
                 

                </div>
            </div>
            <div class="card shadow mb-2">
                <div class="card-body" style="height: 500px;overflow-y:scroll">
                    <div id="message">

                    </div>
                </div>
            </div>
        <div class="row">
          
            <div class="col-md-10">
                <textarea id="mymessage" name="" class="form-control" data-consultid="{{$consultationID}}" placeholder="Type message here" id=""  rows="3"></textarea>
            </div>
         
            <div class="col-md-2">
                <button id="send" style="float: left;margin-left: -20px;" class="btn btn-light text-success"><i class="fas fa-paper-plane"></i></button>
               
                <button id="fileattach" data-bs-toggle="modal" data-bs-target="#fileupload" style="" class="btn btn-light text-secondary"><i class="fas fa-paperclip"></i></button>
  
 
  <div class="modal fade" id="fileupload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Attach Image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('uploadimg')}}" method="POST" enctype="multipart/form-data" >
            @csrf
        <div class="modal-body">
            <input type="file" name="messagefile[]" accept="image/*" multiple>
            <input type="hidden" name="id" value="{{$consultationID}}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="Submit" class="btn btn-primary">Upload</button>
        </div>
    </form>
      </div>
    </div>
  </div>
            </div>
      
        </div>


        @else
        
        <div class="container">
        <h6 style="text-align: center">
            <img src="{{asset('assets/noselected.svg')}}" style="width:100%" alt="">
            <br>
            NO SELECTED.
            <br>
            <span style="font-size:13px">Please Select User to Start Conversation</span>
        </h6>
        </div>
      
            @endif

            <script>
              
                $('#send').click(function(){
                    $(this).html('<div class="spinner-border text-primary spinner-border-sm" role="status"><span class="visually-hidden"></span></div>');
                    var message = $('#mymessage').val();
                    var consultID = $('#mymessage').data('consultid');

                   
                    if(message == ''){
                        $('#send').html('<i class="fas fa-paper-plane"></i>');
                        $('#mymessage').addClass('is-invalid');
                    }else {
                      
                       
                        $.ajax({
                        method: "GET",
                        url: "{{route('sendmessage')}}",
                        data: { send:1,val:message,id:consultID }
                        })
                        .done(function( msg ) {
                            // swal("Message Sent!", "Your Message Sent Successfully!", "success");
                            $('#send').html('<i class="fas fa-paper-plane"></i>');
                            fetchmessage();
                            $('#mymessage').val('');
                        });
                    }
                })
                $('#mymessage').keyup(function(){
                    $(this).removeClass('is-invalid');
                })
                fetchmessage();
                setInterval(() => {
                    fetchmessage();
                }, 5000);
         function fetchmessage(){
           $.ajax({
            method: "GET",
            url: "{{route('fetchmessage')}}",
            data: { fetch:1 }
            })
            .done(function( msg ) {
               $('#message').html(msg);
            });
                }
            </script>
            