<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id = Auth::user()->id;
        $messages = DB::select('select * from messages where UserID = '.$id.' or AdminID ='.$id.' order by created_at desc ');

        return view('pages.Consultation.message',compact('messages'));
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
        $message = $request->val;
        $consultationID = $request->id;
       
      


        if(Auth::user()->role== 0){
            //Admin 
            $me = Auth::user()->id;
            $receiver = session()->get('userid')['userid'];
            Consultation::where('UserID',$receiver)->update([
                'Status'=>1,
            ]);


            Message::create([
                'ConsultationID'=>$consultationID,
                'Message'=>$message,
                'UserID'=>$receiver,
                'AdminID'=>$me,
                'Sender'=>$me,
            ]);

        }else {

            $me = Auth::user()->id;
            //User
            $receiver = User::where('role',0)->get();
            Message::create([
                'ConsultationID'=>$consultationID,
                'Message'=>$message,
                'UserID'=> $me,
                'AdminID'=>$receiver[0]['id'],
                'Sender'=>$me,
            ]);
        }
        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Message::findorFail($id)->delete();
    }
}
