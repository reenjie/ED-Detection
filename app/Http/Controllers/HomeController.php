<?php

namespace App\Http\Controllers;
use App\Models\Species;
use Illuminate\Http\Request;

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
        $data = Species::all();
    
        return view('welcome',compact('data'));
        
    }


    public function search(Request $request){
        $search = $request->searchkey;

       //$data = ['asd','www'];
        session(['SearchData'=>[]]);
       


        return redirect()->route('home')->with('searchkey',$search);

        

       

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
