<?php

/*
    Controller page for registering, where base functions are created for the Registering class
*/

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::all();   

        return view('home')
        ->with('$users', $users);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    /* store a new registered user into database via user input */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'userImage'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $image_store = request()->file('userImage')->store('user_image', 'public');
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->image = $image_store;
        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect('home');

    }
}
