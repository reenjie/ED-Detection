<?php

namespace App\Http\Controllers;
use App\Models\Species;
use App\Models\Disease;
use App\Models\Symptoms;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        echo 'agoy';
        // $data = Species::all();
    
        // return view('welcome',compact('data'));
        
    }


    public function search(Request $request){
        $search = $request->searchkey;

       //$data = ['asd','www'];
       $id = $request->species;
       $searchkey = $request->searchkey;

       $data = DB::select('select 
       diseases.id as diseaseID,diseases.Name as diseaseName,diseases.Treatable as diseaseTreatable,
       symptoms.id as symptomsID,symptoms.Content as symptomsContent,
       species.id as speciesID,species.Type as speciesType
       from 
       diseases 
       LEFT join symptoms on symptoms.DiseaseID = diseases.id 
       LEFT join species on species.id = diseases.SpeciesID 
       where species.id = '.$id.' and symptoms.Content like "%'.$searchkey.'%" or diseases.Name like "%'.$searchkey.'%" ');

       // diseaseID | diseaseName | diseaseTreatable | symptomsID | symptomsContent | speciesID | speciesType
       if(count($data)>=1){
        //Search found something

        session(['SearchData'=>$data]);
        return redirect()->route('home')->with('searchkey',$search);
       }else {
        //Nothing Found.

        session(['SearchData'=>[]]);
        return redirect()->route('home')->with('searchkey',$search);
       }

       
        // 
       


        // 

        

       

    }


    public function ResultView(Request $request){
        $did = $request->id;


        $disease = Disease::where('id',$did)->get();
        $species = DB::select('select * from species where id in (select SpeciesID from diseases where id ='.$did.' )');
        $symptoms = Symptoms::where('DiseaseID',$did)->get();
        
      return view('view',compact('disease','species','symptoms'));


    }

    public function googlesearch(Request $request){
        session()->forget('SearchData');
        session(['gsearch'=>true]);
        return redirect()->route('home');

    }

    public function Back (Request $request){
        session()->flush();
        return redirect()->route('home');
    }
}
