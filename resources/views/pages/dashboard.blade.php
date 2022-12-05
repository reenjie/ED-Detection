@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        @php
        $species = DB::select('SELECT * FROM `species`');
        $user = DB::select('SELECT * FROM `users`');
        $consultation = DB::select('SELECT * FROM `consultations`');

    @endphp

    @if(Auth::user()->role==0)
    <div class="row">
        <div class="col-md-3 d-flex align-items-stretch">
            <div class="card shadow mb-2 " style="border-left:10px solid #146d73;width:100%">
                <div class="card-body ">
                <div style="float:right" >
                        <h6 style="font-size:40px"><i class="fas fa-users"></i></h6>

                    </div>
                    
                    <h5 class="mt-3" style="font-weight:bold">
                    <span class="badge bg-success">5</span>
                   
                    Visitors</h5>
                    
                  
                </div>
            </div>
        </div>

        <div class="col-md-3 d-flex align-items-stretch">
            <div class="card shadow mb-2 " style="border-left:10px solid #73141c;width:100%">
                <div class="card-body ">
                <div style="float:right" >
                        <h6 style="font-size:40px"><i class="fas fa-list"></i></h6>

                    </div>
                    
                    <h5 class="mt-3" style="font-weight:bold">
                    <span class="badge bg-success">{{count($species)}}</span>
                   
                    Species</h5>
                    
                  
                </div>
            </div>
        </div>


        <div class="col-md-3 d-flex align-items-stretch">
            <div class="card shadow mb-2 " style="border-left:10px solid #227314;width:100%">
                <div class="card-body ">
                <div style="float:right" >
                        <h6 style="font-size:40px"><i class="fas fa-user-circle"></i></h6>

                    </div>
                    
                    <h5 class="mt-3" style="font-weight:bold">
                    <span class="badge bg-success">{{count($user)}}</span>
                   
                    Users</h5>
                    
                  
                </div>
            </div>
        </div>


        <div class="col-md-3 d-flex align-items-stretch">
            <div class="card shadow mb-2 " style="border-left:10px solid #147355;width:100%">
                <div class="card-body ">
                <div style="float:right" >
                        <h6 style="font-size:40px"><i class="fas fa-comment"></i></h6>

                    </div>
                    
                    <h5 class="" style="font-weight:bold">
                    <span class="badge bg-success">{{count($consultation)}}</span>
                   
                    Consultations</h5>
                    
                  
                </div>
            </div>
        </div>


        
    </div>
    @endif
        <div class="row mt-4">
        <div class="card">
            <div class="card-body">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            </div>
        </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
   
    <script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Species and Its Diseases Data "
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}",
		dataPoints: [

            @foreach ($species as $item)
        
        @php
            $disease = DB::select('select * from diseases where SpeciesID ='.$item->id.' ');
        @endphp

        { y: {{count($disease)}}, label: "{{$item->Type}}" },
             @endforeach
		
			
		]
	}]
});
chart.render();

}
</script>
@endsection
