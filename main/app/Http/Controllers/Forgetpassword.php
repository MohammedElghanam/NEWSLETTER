<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\Send_mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Forgetpassword extends Controller
{
    public function pageemail(){
        return view('Auth.forgetpassword');
    }


    public function sendemail(Request $request){

        // dd($request);

        $token = Str::random(64);
        // dd($token);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::Now()
        ]);

        Mail::to($request->email)->send(new Send_mail($request,$token));

        return redirect()->back();

    }


    public function pagereset($email, $token){
        
        return view('Auth.resetpassword', compact('email', 'token'));
    }

    public function resetpassword(Request $request){
        // dd($request);
        
        $validation = $request->validate([
            'email' => 'required | email | exists:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        $update_password = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token_email
            ])->first();

        if (!$update_password) {
            return redirect()->back()->with('error', 'The email you entered does not exist');
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
     
        DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email
            ])->delete();

        return redirect()->route('login');
    }
}
