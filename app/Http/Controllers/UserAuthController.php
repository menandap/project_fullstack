<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Auth;

class UserAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function actLogin(Request $request)
    {
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect()->route('dashboard');
        // }

        if(!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))){
            // throw ValidationException::withMessages([
            //     'error' => 'invalid email or password'
            // ]);
            return back()->with(['error' => 'invalid email or password']);
        }

        return redirect()->route('dashboard');
    }

    public function actRegister(Request $request)
    {
        $register = new User();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = bcrypt($request->password);
        $register->save();
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
