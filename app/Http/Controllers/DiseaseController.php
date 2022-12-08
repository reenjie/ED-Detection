<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Species;
use App\Models\Treatment;
use App\Models\Symptoms;
use App\Models\Images;

use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Species::all();
        $disease = Disease::all();
        $symptoms = Symptoms::all();
        $treatment = Treatment::all();

        if(session()->has('speciesID')){
        
            $id = session()->get('speciesID');
            $disease =  $disease = Disease::where('SpeciesID',$id)->get();
            session(['disease' => $disease]);
        }
        
       
        return view('pages.Disease.index',compact('data','symptoms','treatment'));
    }

    public function sort(Request $request){
        $id = $request->id;
        $species = Species::where('id',$id)->get();
        $disease = Disease::where('SpeciesID',$id)->get();
        
        session(['speciesID'=>$id]);
        session(['species'=> $species]);
        session(['disease' => $disease]);

        return redirect()->route('disease');

    }
    
    public function resetSort(){
        session()->remove('species');
        session()->remove('disease');
        return redirect()->route('disease');
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
       $name = $request->Name;
       $treatable = $request->Treatable;
       $speciesID = $request->id;
     $save =  Disease::create([
        'SpeciesID'=>$speciesID,
        'Name'=>$name,
        'Treatable'=>$treatable,
       ]);

    
      Treatment::create([
        'DiseaseID'=>$save->id,
        'Content'=>$request->treatment,
      ]);
      

       return redirect()->back()->with('alert','New Data Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit(Disease $disease)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disease $disease)
    {
        //
    }

    public function updateText(Request $request){
            $id = $request->id;
            $table = $request->table;
            $value = $request->value;

            if($table == 'disease'){
                Disease::findorFail($id)->update([
                    'Name'=>$value,
                ]);
            }else {
                Symptoms::findorFail($id)->update([
                    'Content'=>$value,
                ]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        
        $id = $request->id;
      
        Disease::findorFail($id)->delete();
        $data = Symptoms::where('DiseaseID',$id)->get();
        if(count($data)>=1){
          foreach($data as $s){
          
           $images = Images::where('SymptomsID',$s->id)->get();

            foreach($images as $img){
              try {
                unlink(public_path('attachments').'/'.$img->Photo);
              } catch (\Throwable $th) {
                //throw $th;
              }

    
           
            }


           
            
          }
          Symptoms::where('DiseaseID',$id)->delete();
          Images::where('SymptomsID',$s->id)->delete();
        }
      
     return redirect()->back()->with('alert',' Data Deleted Successfully!');
    }
}
