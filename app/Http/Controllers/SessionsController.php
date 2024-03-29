<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        // This says that every route in the controller is bound to the guest filter EXCEPT destroy (logout)
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

        public function store()
        {
            // Attempt to authenticate user, if it doesn't work, send them back           
            if (! auth()->attempt(request(['email', 'password'])))
            {
                return back()->withErrors([
                    'message' => 'Please check your email & password and try ≤≥again'
                ]);
            }


            // Redirect to home page
            return redirect()->home();
        }

    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }
}
