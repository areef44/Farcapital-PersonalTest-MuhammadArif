<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(Request $request)
    {
        if ($request->method() == "GET") {
            return view('login');
        }

        $email = $request->input("email");
        $password = $request->input("password");

        $users = Users::query()
            ->where("email", $email)
            ->first();
        // dd($users);
        if ($users == null) {
            return redirect()
                ->back()
                ->withErrors([
                    "msg" => "Email tidak ditemukan"
                ]);
        }
        // dd(Hash::make($password), $pengguna, Hash::check('fulan123', $pengguna->password));

        if (!Hash::check($password, $users->password)) {
            return redirect()
                ->back()
                ->withErrors([
                    "msg" => "password salah!"
                ]);
        }


        if (!session()->isStarted()) session()->start();
        session()->put("id_user", $users->id);
        session()->put("role_id", $users->role_id);

        if ($users->role_id == 0) {
            session()->put("logged", true);
            return redirect()->route("petugas.dashboard");
        } else if ($users->role_id == 1) {
            session()->put("logged-user", true);
            return redirect()->route("users.dashboard");
        }
    }

    function logout(Request $request)
    {
        session()->flush();
        return redirect()->route("login");
    }
}
