<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // Allow access for publishers and admins
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($role = 0)
    {
        $users = User::when($role, function($query, $role) {
            return $query->where('role', $role);
        })
        ->paginate(20);

        return view('admin.users.index', compact('users', 'role'));
    }

    public function changeRole(Request $request)
    {
        $user_id = $request->user_id;
        $role = $request->role;

        $user = User::find($user_id);
        $user->role = $role;
        $user->save();

        return response()->json(['success', 'Uspešno ste promenili ulogu korisnika']);
    }
}
