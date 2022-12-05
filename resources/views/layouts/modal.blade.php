<!-- Button trigger modal -->
<button type="button" class="btn @if($class=='add') btn-primary text-light @else btn-light} @endif  text-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$id}}">
   {!!$btn!!}
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog @if($type=='addDisease' || $type == 'viewSymptoms') modal-lg @endif">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$modalheader}}</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
        </div>
      
        
         @if($type == 'addSpecies')
         @include('pages.Species.addspecies')
         @elseif($type == 'editSpecies')
         @include('pages.Species.editspecies')
         @elseif($type =='addDisease')
         @include('pages.Disease.add')
         @elseif($type=='viewSymptoms')
         @include('pages.Disease.view')
         @endif 
  
      </div>
    </div>
  </div>