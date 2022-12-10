<?php

namespace App\Http\Controllers;

use App\Models\Symptoms;
use App\Models\Images;
use Illuminate\Http\Request;

class SymptomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        //'DiseaseID',
       // 'Content',
       $diseaseId = $request->DiseaseID;
       $Content = $request->Content;
       $file = $request->file('img');

        if(count($file)<= 3){
            $insert = Symptoms::create([
                'DiseaseID'=>$diseaseId,
                'Content'=>$Content,
            ]);

           
            foreach($file as $key => $img){
        $image = time().$key.'.'.$img->getClientOriginalExtension();
        $img->move(public_path('attachments'), $image);

        Images::create([
            'Photo'=>$image,
            'SymptomsID'=>$insert->id,
            'ConsultationID'=>0,
            'SpeciesID'=>0,
            'MessageID'=>0
        ]);
    
            }
            return redirect()->back()->with('alert','Symptoms Added Successfully!');

        }else {
            return redirect()->back()->with('error','Error in Adding File. Maximum limit Reached. Allowed number of images to upload | 3');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Symptoms  $symptoms
     * @return \Illuminate\Http\Response
     */
    public function show(Symptoms $symptoms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Symptoms  $symptoms
     * @return \Illuminate\Http\Response
     */
    public function edit(Symptoms $symptoms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Symptoms  $symptoms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Symptoms $symptoms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Symptoms  $symptoms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Symptoms $symptoms)
    {
        //
    }
}
