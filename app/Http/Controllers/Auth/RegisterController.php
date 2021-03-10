<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'phone_number'=>'required|regex:/\+370[0-9]{8}/',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
        ]);
        User::create([
            'name'=> $request->name,
            'phone_number'=> $request->phone_number,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        return redirect()->route('dashboard');
    }
}
