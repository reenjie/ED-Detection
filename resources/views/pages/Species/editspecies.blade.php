<form action="{{route('editspecies')}}" method="post">
    @csrf
<div class="modal-body">
    <label for="">Name :</label>
    <input type="text" placeholder="Name of Species" class="form-control mb-2" value="{{$item->Type}}" required name="Type">

    <label for="">Description :</label>
    <textarea name="Description" class="form-control" id="" rows="5">{{$item->Description}}</textarea>
    
    <input type="hidden" name="id" value="{{$item->id}}">
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>

</form>