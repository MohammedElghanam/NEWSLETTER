<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembersController extends Controller
{
    //

    public function store(Request $request){

        // dd($request);
        $data = request()->validate([
            'email' => 'required | email'
        ]);

        $created = Members::create($data);
        if ($created) {
            return redirect()->route('landing.page')->with('success', 'Subscription status updated successfully.');
        } else {
            return redirect()->route('landing.page')->with('error', 'Failed to update subscription status.');
        }
    }

    public function update(Request $request){

        // dd($request);
        $data = request()->validate([
            'email' => 'required | email | exists:members,email'
        ]);

        $updated = Members::where('email', $data['email'])->update(['sub' => 'unsubscribe']);

        if ($updated) {
            return redirect()->route('landing.page')->with('success', 'Subscription status updated successfully.');
        } else {
            return redirect()->route('landing.page')->with('error', 'Failed to update subscription status.');
        }
     
    }

    
}
