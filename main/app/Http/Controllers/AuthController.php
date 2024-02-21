<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function pageregister()
    {
        return view('Auth.register');
    }

    
    public function registeruser(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        
        $user = new User();
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $userCount = User::count();


        if ($userCount === 0) {
            
            $user->assignRole('admin');
        } else {
            
            $user->assignRole('writer');
        }
    
        $user->save();
        return redirect()->route('login');

    }

    
    public function login(){
        return view('Auth.login');
    }


    public function loginuser(Request $request){

        request()->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $data=[
            'email' => $request->email,
            'password'=> $request->password,
        ];
        
        if(Auth::attempt($data, $request->filled('remember'))){

            $user = Auth::user();

            if ($user->hasRole('admin')) {

                return redirect()->route('dashboard');
            
            } elseif ($user->hasRole('writer')) {

                return redirect()->route('landing.page');

            } elseif ($user->hasRole('user')) {

                return redirect()->route('dashboard');

            }
            
        }
        return back()->with('erreur','fact account');

    }


    

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('landing.page');
     }


}
