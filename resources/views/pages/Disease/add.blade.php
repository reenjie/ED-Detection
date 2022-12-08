
    
<div class="modal-body">
    <button class="btn btn-dark btn-sm d-none" id="resetagain">Back</button>
    <div class="card" id="cardoption">
        <div class="card-body" style="text-align: center">
            <button id="newdisease" class="btn btn-dark">New Disease <i style="margin-left:4px" class="fas fa-share"></i></button>
            <button id="newsymptom" class="btn btn-dark " style="margin-left: 10px"><i class="fas fa-plus-circle"></i> Add Symptoms</button>
        </div>
    </div>
   
    <div class="card d-none" id="newdis">
            <div class="card-body">
                <h6>Add Disease </h6>
                <form action="{{route('adddisease')}}" method="Post">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                <label for="">Name</label>
                <input name="Name" required type="text" class="form-control mb-2">
                <label for="">is it Treatable?</label>
                <select name="Treatable" class="form-select mb-2" id="treatable">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <textarea name="treatment" required id="treat" placeholder="Indicate Treatment here ..." class="form-control mb-2" id="" cols="30" rows="10"></textarea>

                <script>
                    $('#treatable').change(function(){
                        var val = $(this).val();
                        if(val == 1){
                            $('#treat').removeClass('d-none');   
                        }else {
                            $('#treat').addClass('d-none');   
                        }
                    })
                </script>
        
                <button  type="submit" class="btn btn-success "><i class="fas fa-check-circle"></i> Save Disease</button>
            </form>
            </div>
    </div>
    <div class="card d-none" id="addsymp">
        <div class="card-body">
            <h6>Add Symptoms</h6>
            <form action="{{route('addsymptom')}}" method="post" enctype="multipart/form-data" >
                @csrf
                
            <select required name="DiseaseID" id="" class="form-select mb-2">
                <option value="">Select Disease</option>
                @foreach (session()->get('disease') as $d)
                <option value="{{$d->id}}">{{$d->Name}}</option>
 
                @endforeach
            </select>
         
            <textarea name="Content" class="form-control mb-2" placeholder="Indicate Symptoms here..." id="" cols="30" rows="10" required></textarea>

            <input type="file" required class="form-control " name="img[]" accept="image/*" multiple>
           

            <span style="font-size:12px;" class="text-danger mb-2">
                Maximum Image file Upload : 3
            </span>
            <br>
     
            <button type="submit" class="btn btn-success mt-2 "><i class="fas fa-check-circle"></i> Save Symptoms</button>
        </form>
        </div>
    </div>
 
  <script>
    $('#newdisease').click(function(){
        $('#cardoption').addClass('d-none');
        $('#resetagain').removeClass('d-none');
        $('#newdis').removeClass('d-none');
    })

    $('#newsymptom').click(function(){
        $('#cardoption').addClass('d-none');
        $('#resetagain').removeClass('d-none');
        $('#addsymp').removeClass('d-none');


    })
    $('#resetagain').click(function(){
        $(this).addClass('d-none');
        $('#cardoption').removeClass('d-none');
        $('#newdis').addClass('d-none');
        $('#addsymp').addClass('d-none');
    })
  </script>
</div>


