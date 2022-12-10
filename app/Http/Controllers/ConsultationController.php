<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Disease;
use App\Models\Message;
use App\Models\User;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkifexist = DB::select('select * from consultations where UserID = '.Auth::user()->id.'');
        $disease = Disease::all();
        $allconsultation = Consultation::all();
        $alluserwConsultation = DB::select('select * from users where id in (select UserID from consultations)');
       return view('pages.Consultation.index',compact('checkifexist','disease','allconsultation','alluserwConsultation'));
    }
    


    public function open(Request $request){
        $userid = $request->id;
     
        $selecteduser = User::where('id',$userid)->get();
        $consultationData = Consultation::where('UserID',$userid)->get(); 
       
        $consid =  $consultationData[0]['id'];

        Message::where('UserID',$userid)->where('ConsultationID',$consid)->where('AdminID',Auth::user()->id)->update([
            'status'=>1,
        ]);

        $variable = [
            'userid'=>$userid,
            'data'  =>$selecteduser,
            'consultation'=>$consultationData,
        ];
        

    
         session(['userid'=>$variable]);

        return redirect()->back();

    }

    public function reset(){
        session()->remove('userid');
        return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $diseaseID = $request->disease;
        $details = $request->details;

        
        if($diseaseID == 'Unknown'){
            $diseaseID = 0;
        }

        if($request->file('imagefile')){
          $file = $request->file('imagefile');

          $insert =  Consultation::create([
            'UserID'=>Auth::user()->id,
            'Content'=>$details,
            'DiseaseID'=>$diseaseID,
            'Status'=>0,
        ]);



          foreach($file as $key => $img){
            $image = time().$key.'.'.$img->getClientOriginalExtension();

            $img->move(public_path('attachments'), $image);
    
            Images::create([
                'Photo'=>$image,
                'SymptomsID'=>0,
                'ConsultationID'=>$insert->id,
                'SpeciesID'=>0,
                'MessageID'=>0
            ]);
          }
          
        }else {
        
        Consultation::create([
            'UserID'=>Auth::user()->id,
            'Content'=>$details,
            'DiseaseID'=>$diseaseID,
            'Status'=>0,
        ]);

            
        }
       
   
       return redirect()->back()->with('alert','Consultation Request Send Successfully!');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $val = $request->val;
        Consultation::findorFail($id)->update([
            'Content'=>$val,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        //
    }
}
