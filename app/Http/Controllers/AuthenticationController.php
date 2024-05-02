<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    /*
    * Displays the form
    */
    public function create()
    {
        return view('login');
    }


    /*
    * Authenticate user
    */
    public function store(LoginRequest $request)
    {
        if(!Auth::attempt($request->validated(), true))
        {
            throw ValidationException::withMessages([
                'name' => 'Invalid credentials!'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('login');
    }

}
