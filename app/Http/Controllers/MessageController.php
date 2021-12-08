<?php

/*
    Controller page for message, where base functions are created for the Message class
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\Models\User;
use App\Models\Friendship;
use App\Models\Message;


class MessageController extends Controller
{
    /* construct() for auth middleware, only index() and show() for "guests" */
    function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /* store() takes all user inputs of a new messge and store them into database  */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
            'text' => 'required',
            'image'=>'image|nullable|max:255', 

        ]);
        // Checks if message has image file, if not then image_store = ""
        if ($request->file('messageImage') == null) {
            $image_store = "";
        }else{
            $image_store = request()->file('messageImage')->store('message_image','public');
        }; 
        $message = new Message();
        $message->user_id = $request->user;
        $message->message = $request->text;
        $message->image = $image_store;

        $message->save();
        return redirect('message/test');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /* show() displays all saved items in storage based on the $id of the message */
    public function show($id)
    {
        $usermessage =  Message::all();
        return view('/message')
        ->with('usermessage', $usermessage)
        ->with('userfriendship', Friendship::all())
        ->with('users', User::all());

    }
}
