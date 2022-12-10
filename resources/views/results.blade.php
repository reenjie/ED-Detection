
@if(count($data)>=1 )
<div class="mt-2" id="customsc" style="height:300px;overflow-y:scroll">
  
<!--diseaseID | diseaseName | diseaseTreatable | symptomsID | symptomsContent | speciesID | speciesType  -->
      @foreach($data as $key => $row)
   
      <div style="text-align:left" class="mb-2">
    <a href="{{route('view',['id'=>$row->diseaseID])}}" ><h6 class="text-info "  style="font-weight:bold;text-decoration:underline;font-size:14px">{{$row->diseaseName}}</h6></a>
    <p style="font-size:13px">{{$row->symptomsContent}}</p>
    </div> 


      @endforeach









</div>  
@else 
<div mt-5>
    <img src="{{asset('assets').'/'.'notfound.svg'}}" width="300px" alt="">
    <br>
<h6 class="mt-2"> No Results Found . <span class="text-danger">


</span></h6>
   
  <!--  <h6 style="font-size:15px;cursor:pointer;text-decoration:underline" onClick="window.location.href='{{route('googlesearch')}}'" class="text-primary">Try in Google Search</h6> -->
</div>
@endif
