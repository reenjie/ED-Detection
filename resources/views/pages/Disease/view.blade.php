<div class="modal-body text-dark">
 
   @php
       $images = DB::select('select * from images where SymptomsID= '.$id.' ')
   @endphp
   <div class="row">
    @foreach ($images as $img)
   
    <div class="col-md-12 mb-2">
        <img src="{{asset('attachments').'/'.$img->Photo}}" style="width:100%" alt="">
    </div>
   
@endforeach
   </div>

</div>