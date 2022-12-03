<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Species::all();
        return view('pages.Species.index',compact('data'));
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
       $type = $request->Type;
       $desc = $request->Description;

       $validate =Species::where('Type',$type)->get();

       if(count($validate)){
            $type = $type.'_Duplicate';
       }    

       Species::create([
        'Type'=>$type,
        'Description'=>$desc,
       ]);

       return redirect()->back()->with('alert','Species Added Successfully !');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function show(Species $species)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $type = $request->Type;
       $desc = $request->Description;
       $id = $request->id;

       $validate =Species::where('Type',$type)->get();

       if(count($validate)){
            $type = $type.'_Duplicate';
       }    

       Species::findorFail($id)->update([
        'Type'=>$type,
        'Description'=>$desc,
       ]);

       return redirect()->back()->with('alert','Species Updated Successfully !');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Species::findorFail($id)->delete();
        return redirect()->back()->with('alert','Species Deleted Successfully !');
    }
}
