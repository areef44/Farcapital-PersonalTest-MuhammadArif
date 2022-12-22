<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {

        $users = Users::query()
            ->where('id', session()->get('id_user'))
            ->first();
        return view('users.dashboard', compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    function show($id)
    {
        $users = Users::query()
            ->where("id", $id)
            ->first();
        return $users;
    }

    public function store(Request $request)
    {

        //Validasi Inputan User
        $validated = [
            'name' => 'required|min:3|max:50',
            'birth_date' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'password' => 'min:8|required_with:verification_password|same:verification_password',
            'verification_password' => 'min:8'

        ];
        $validated = $request->validate($validated);
        // dd($validated);
        $users = Users::query()->create($validated);
        if (!session()->isStarted()) session()->start();
        session()->put("logged", true);
        session()->put("id_user", $users->id);
        session()->put("role_id", $users->role_id);
        return view('users.dashboard', compact('users'));
    }


    public function edit(Users $users)
    {
        return view('users.edit', ['users' => $users]);
    }

    public function update(Request $request, Users $users)
    {

        $validated = [
            'name' => 'required|min:3|max:50',
            'birth_date' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'status' => 'required'

        ];
        // dd($validated);
        $validated = $request->validate($validated);
        $users->update($validated);
        return redirect()->route('users.dashboard');
    }
}
