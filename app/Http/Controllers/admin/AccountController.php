<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        // $users = User::all(); 
        // return view('admin/account', [ 
        //     'users' => $users 
        // ]);;

        $search = $request->input('search');
        $users = User::where('email', 'like', "%$search%")
                        ->paginate(10); // Set your desired pagination limit here
    
        return view('admin.account', compact('users'));
    } 

    public function create()
    {
        return view('admin/account-create');
    }

    public function store(Request $request)
    {
        $validateData = validator($request->all(), [
            'role'     => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:3',
        ])->validate();

        $user = new User($validateData);
        $user->save();

        return redirect(route('admin.create'))->with('success', 'User Berhasil Ditambahkan');
    }
}
