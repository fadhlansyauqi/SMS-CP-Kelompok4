<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('admin/account', [ 
            'users' => $users 
        ]);;
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
