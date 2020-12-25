<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserdataUpdateRequest;

class UserdataController extends Controller
{
    /**
     * Controller only for logged in users, all groups
     */
    public function __construct()
    {   
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()) 
        {
            $user = User::find(auth()->user()->id);
            return view('user.data', compact('user'));
        }  

        return redirect()->route('pocetna');
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserdataUpdateRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'city' => $request->city,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /***
     * Change password
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'stara_lozinka' => 'required|max:255',
            'nova_lozinka' => 'required|min:6|max:255',
            'ponovi_lozinku' => 'required|min:6|max:255',
        ]);

        // Check if user enter correct password
        if(Hash::check( $request->stara_lozinka , auth()->user()->password )) {
            // If 2 passwords matched
            if( $request->nova_lozinka === $request->ponovi_lozinku ) {
                
                $user = User::find(auth()->user()->id);
                $user->password = bcrypt($request->nova_lozinka);
                $user->save();

                return back()->with('success', 'Uspešno ste promenili lozinku');
            }
            else {
                // If passwords not matches
                return back()->with('error', 'Niste dobro ponovili lozinku');
            }
            
        }
        else {
            // If wrong old password
            return back()->with('error', 'Uneli ste pogrešnu lozinku');
        }

    }
}
