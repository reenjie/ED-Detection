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