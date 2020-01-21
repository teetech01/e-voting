<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {

        $credentials = $request->only('matric_no', 'password');

        if (Auth::guard('student')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended(route('vote.candidate'));
        }

        Auth::guard('student')->logout();
        $request->session()->invalidate();
        return back()->withErrors('Incorrect credentials');
    }
}
