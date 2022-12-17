<?php

namespace App\Http\Controllers;

use App\Models\Officer;
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

        $pengguna = Officer::query()
            ->where("email", $email)
            ->first();
        if ($pengguna == null) {
            return redirect()
                ->back()
                ->withErrors([
                    "msg" => "Email tidak ditemukan"
                ]);
        }
        // dd(Hash::make($password), $pengguna, Hash::check('fulan123', $pengguna->password));

        if (!Hash::check($password, $pengguna->password)) {
            return redirect()
                ->back()
                ->withErrors([
                    "msg" => "password salah!"
                ]);
        }

        if (!session()->isStarted()) session()->start();
        session()->put("logged", true);
        session()->put("idPengguna", $pengguna->id);
        return redirect()->route("dashboard");
    }

    function logout(Request $request)
    {
        session()->flush();
        return redirect()->route("login");
    }
}
