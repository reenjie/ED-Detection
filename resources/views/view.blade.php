<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-Disease Detection</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/argon-dashboard.css')}}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

        <style>
            body {
                font-family: 'Nunito', sans-serif;
               
            }
        </style>
    </head>
    <body class="antialiased">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.guest.navbar')
            </div>
              
        </div>
    </div>
            <br>
            
            <div class="container " >
           
         
            
            <div class="row" id="body">
                <div class="col-md-1"></div>
                <div class="col-md-10 mt-1">
                <div style="float:right">
                <button class="btn btn-light btn-sm  " onClick="window.location.href='{{route('login')}}' " >Request a Consultation <i class="fas fa-sms"></i></button>
                <button onClick="window.location.href='{{route('Back')}}'"  class="btn btn-light btn-sm ">Back</button>
                </div>
                    @foreach($disease as $d)
                        
                    <h3 style="font-weight:Bold">{{$d->Name}}</h3>
                    @endforeach
                    @foreach($species as $sp)
                    <span style="font-size:15px;text-transform:uppercase">{{$sp->Type}}</span>
                    @endforeach 
                   

                     <h6 style="font-size:14px">Symptoms</h6>
                       
                        <span>
                            @foreach($symptoms as $s)
                               
                                @php
                        $imgs = DB::select('select * from images where SymptomsID= '.$s->id.' ');
                        @endphp
                        <br>
                        {{$s->Content}}
                        <div class="row mt-2">
                    @foreach($imgs as $src)
                  
                        <div class="col-md-6 mb-2 mt-2">
                        <img style="width:100%" src="{{asset('attachments').'/'.$src->Photo}}" alt="">
                        </div>
                
                  
                    @endforeach
                    </div>
                      
                            
                            @endforeach
                    </span>

                    <h6 style="font-size:14px" class="mt-3">Treatment</h6>
                    @foreach ($treatment as $tr)
                        {{$tr->Content}}
                    @endforeach
                      
                     
                    <br><br>
                 
                    <br><br>
                </div>
                <div class="col-md-1"></div>
            </div>
            </div>
         

            <style>
                /* width */
                
                #customsc::-webkit-scrollbar {
  width: 10px;
}

/* Track */
#customsc::-webkit-scrollbar-track {
  background: transparent;
}

/* Handle */
#customsc::-webkit-scrollbar-thumb {
  background: #b2edd9;
}

/* Handle on hover */
#customsc::-webkit-scrollbar-thumb:hover {
  background: #71b09a;
}
                #body {
                    z-index: 2;
                    position: relative;
                }

@keyframes move_wave {
    0% {
        transform: translateX(0) translateZ(0) scaleY(1)
    }
    50% {
        transform: translateX(-25%) translateZ(0) scaleY(0.55)
    }
    100% {
        transform: translateX(-50%) translateZ(0) scaleY(1)
    }
}
.waveWrapper {
    overflow: hidden;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    margin: auto;
    z-index: 1;
}
.waveWrapperInner {
    position: absolute;
    width: 100%;
    overflow: hidden;
    height: 100%;
    bottom: -1px;
    background-image: linear-gradient(to top, #e4eef2 20%, #cce5f0 80%);
}
.bgTop {
    z-index: 15;
    opacity: 0.5;
}
.bgMiddle {
    z-index: 10;
    opacity: 0.75;
}
.bgBottom {
    z-index: 5;
}
.wave {
    position: absolute;
    left: 0;
    width: 200%;
    height: 100%;
    background-repeat: repeat no-repeat;
    background-position: 0 bottom;
    transform-origin: center bottom;
}
.waveTop {
    background-size: 50% 100px;
}
.waveAnimation .waveTop {
  animation: move-wave 3s;
   -webkit-animation: move-wave 3s;
   -webkit-animation-delay: 1s;
   animation-delay: 1s;
}
.waveMiddle {
    background-size: 50% 120px;
}
.waveAnimation .waveMiddle {
    animation: move_wave 10s linear infinite;
}
.waveBottom {
    background-size: 50% 100px;
}
.waveAnimation .waveBottom {
    animation: move_wave 15s linear infinite;
}
            </style>

<h6 style="font-size:13px;color:grey;position:fixed;bottom:0; right:10px">All rights Reserver &middot; 2022</h6>
            
            <div class="waveWrapper waveAnimation">
  <div class="waveWrapperInner bgTop">
    <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
  </div>
  <div class="waveWrapperInner bgMiddle">
    <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
  </div>
  <div class="waveWrapperInner bgBottom">
    <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
  </div>
</div>

    </body>
    
</html>
