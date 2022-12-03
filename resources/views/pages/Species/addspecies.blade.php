<form action="{{route('addspecies')}}" method="post">
    @csrf
<div class="modal-body">
    <label for="">Name :</label>
    <input type="text" placeholder="Name of Species" class="form-control mb-2" required name="Type">

    <label for="">Description :</label>
    <textarea name="Description" class="form-control" id="" rows="5"></textarea>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>

</form>