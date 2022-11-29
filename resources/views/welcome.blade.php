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
    <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />

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
                <div class="col-12 mt-2">
                @if(session()->has('gsearch'))
                       <!-- if return to Default search -->
                    <div class="container">
                          
                <div style="text-align:left"> <button onClick="window.location.href='{{route('Back')}}'"  class="btn btn-light btn-sm ">Back</button></div>
                    </div>

                    @endif
                </div>
        </div>
    </div>
            <br>
            
            <div class="container " >
                
            <div class="row" id="body">
                <div class="col-md-1"></div>
                <div class="col-md-10 mt-4">
                   

                <div style="text-align:center">
              
                    <h4 style="font-weight:bolder" class="text-info text-gradient">   @if(session()->has('gsearch'))  Google  @else Search Symptoms @endif</h4>

                    
                   <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8"> 
                         
                    
                     
                       
                        @if(session()->has('gsearch'))
                        <script async src="https://cse.google.com/cse.js?cx=f08d8acf839244ab2">
                        </script>
                        <div class="gcse-search"></div>
                        @else 
                        <form action="{{route('search')}}">
                        <div class="" style="align-items:center;display: block;justify-content:center">
                        <input class="form-control" required autofocus name="searchkey" value="@if(session()->has('searchkey')){{session()->get('searchkey')}}@endif" placeholder="Symptoms,Types of Animals,Disease etc.."/>
                       
                     
                        <button type="submit" class="btn btn-light btn-sm btn-gradient d-flex mt-1 "  style="float:right">Search <i style="margin-left:2px;padding-top:2px" class="fas fa-search"></i></button>
                    
                     </div>
                        </form>
                
                    
                        <br><br>

                        @if(session()->has('SearchData'))
                        @if(count(session()->get('SearchData'))>=1 )
                                  <div class="mt-2" id="customsc" style="height:300px;overflow-y:scroll">
                        
                           - <div style="text-align:left" class="mb-2">
                            <a href="#" ><h6 class="text-info " style="font-weight:bold;text-decoration:underline;font-size:14px">Toxic Sdad</h6></a>
                            <p style="font-size:13px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt nisi, placeat ipsa dolorem ratione dolores ab dolor quo, totam odio alias hic similique repudiandae debitis, corporis esse beatae excepturi quod.</p>
                            </div> 
                           

                       
                        

                    

                   
                
                </div>  
                        @else 
                      <div mt-5>
                      <h6> No Results Found . Searchkey : <span class="text-danger">
                        @if(session()->has('searchkey'))
                        {{session()->get('searchkey')}}
                        @endif

                      </span></h6>
                           
                           <h6 style="font-size:15px;cursor:pointer;text-decoration:underline" onClick="window.location.href='{{route('googlesearch')}}'" class="text-primary">Try in Google Search</h6>
                      </div>
                        @endif
                      
                        @endif

                        @endif
                       
                   
                    <div class="col-md-2"></div>
                   </div>

                </div>
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
