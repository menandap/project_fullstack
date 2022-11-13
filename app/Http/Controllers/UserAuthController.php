<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Undangan;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\Story;
use App\Models\Image;
use Auth;

class UserAuthController extends Controller
{
    public function actLogin(Request $request)
    {
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect()->route('dashboard');
        // }

        if(!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))){

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

    public function view_undangan($id){
        // $users = Auth::user()->id;
        $id_undangan = Transaction::where('keyword', '=', $id)->first();
        $undangan = Undangan::where('id', '=', $id_undangan->id_undangan)->first();
        $event = Event::where('id_undangan', '=', $id_undangan->id_undangan)->get();
        $story = Story::where('id_undangan', '=', $id_undangan->id_undangan)->get();
        $image = Image::where('id_undangan', '=', $id_undangan->id_undangan)->get();

        // return $id_undangan->id_undangan;
        // return $undangan;

        return view('undangan.template_undangan_1', compact('undangan','event','story','image'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
