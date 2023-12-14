<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        $validatedData = $request->validate(
            [
                'name'     => 'required',
                'email'    => 'required|email',
                'password' => 'required|min:3',
                'role'     => ['required', Rule::in(['TEACHER', 'STUDENT'])],
            ],
            [
                'name.required'     => 'Nama harus diisi',
                'email.required'    => 'Email harus diisi',
                'email.email'       => 'Format email tidak valid',
                'password.required' => 'Password harus diisi',
                'password.min'      => 'Password minimal harus 3 karakter',
                'role.required'     => 'Role harus dipilih',
                'role.in'           => 'Role yang dipilih tidak valid',
            ],
        );

        $user = new User($validatedData);
        $user->password = Hash::make($request->password);
        $user->save();


        return redirect(route('admin.account'))->with('success', 'User Berhasil Ditambahkan');
    }

    public function edit(User $user)
    {

        return view('admin/account-edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validateData = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3',
            'role' => ['required', Rule::in(['TEACHER', 'STUDENT'])],
        ])->validate();

        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->password = Hash::make($validateData['password']);
        $user->role = $validateData['role'];
        $user->save();

        return redirect(route('admin.account'))->with('success', 'User Berhasil Diupdate');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('admin.account'))->with('success', 'User Berhasil Dihapus');
    }
}
