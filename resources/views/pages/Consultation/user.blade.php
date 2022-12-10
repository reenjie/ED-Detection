<div class="card shadow mb-2">
    <div class="card-body" style="height: 500px;overflow-y:scroll">
        
                <div id="message">

                </div>
        


    </div>
</div>
<div class="row">
    {{--  --}}
    <div class="col-md-10">
        <textarea data-consultid="{{$consultationID}}" id="mymessage" name="" class="form-control"  placeholder="Type message here" id=""  rows="3"></textarea>
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


<script>
    $('#send').click(function(){
        $(this).html('<div class="spinner-border text-primary spinner-border-sm" role="status"><span class="visually-hidden"></span></div>');
        var message = $('#mymessage').val();
        var consultID = $('#mymessage').data('consultid');

       
        if(message == ''){
            $('#mymessage').addClass('is-invalid');
            $('#send').html('<i class="fas fa-paper-plane"></i>');
        }else {
            
           
            $.ajax({
            method: "GET",
            url: "{{route('sendmessage')}}",
            data: { send:1,val:message,id:consultID }
            })
            .done(function( msg ) {
                $('#send').html('<i class="fas fa-paper-plane"></i>');
                // swal("Message Sent!", "Your Message Sent Successfully!", "success");
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