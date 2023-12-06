<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class AccountController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 5); 
        $users = User::where('email', 'like', "%$search%")->paginate($perPage);

        return view('admin.account', compact('users'));
    }

    public function create()
    {
        return view('admin/account-create');
    }

    public function store(Request $request)
    {
        // $validateData = validator($request->all(), [
        //     'role' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:3',
        // ])->validate();

        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
            'role' => ['required', Rule::in(['TEACHER', 'STUDENT'])],
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal harus 3 karakter',
            'role.required' => 'Role harus dipilih',
            'role.in' => 'Role yang dipilih tidak valid',
        ]);

        $user = new User($validatedData);
        $user->save();

        return redirect(route('admin.account'))->with('success', 'User Berhasil Ditambahkan');
    }
}
