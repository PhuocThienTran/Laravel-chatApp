<?php

namespace App\Http\Controllers;

/*
    Controller page for friendship, where base functions are created for the Friendship class
*/

use Illuminate\Http\Request;
use \Auth;
use App\Models\User;
use App\Models\Friendship;
use App\Models\Message;


class FriendshipController extends Controller
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

    /* index() is present in home page with all the users' friendships based on the Auth::id() of the user, 
    his/her friendship, and users */
    public function index()
    {
        $userfriendship = User::find(Auth::id())->userfriendship;
        $usermessage =  Message::all();
        return view('home')
        ->with('userfriendship', $userfriendship)
        ->with('usermessage', $usermessage)
        ->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /* create() gets the create a new friendship form with all the users */
    public function create()
    {
        return view('friendshipCreate')
        ->with('users', User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /* store() takes all user inputs of a new friendship and store them into database  */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user'=>'required',
            'userfollowing'=>'required',
            
        ]);
        $friendship = new Friendship();
        $friendship->user_id = $request->user;
        $friendship->friendship_user_id = $request->userfollowing;

        $friendship->save();
        return redirect("/home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /* destroy() takes the selected friendship and delete the following */
    public function destroy($id)
    {
        $friendship = Friendship::where('user_id', '=', Auth::id())->where('friendship_user_id', '=', $id)->delete();

        return redirect("/home");
    }
}
