<?php

namespace App\Http\Controllers;

use App\Models\Donor;

use App\Models\Users;

use Illuminate\Http\Request;

class DonorController extends Controller
{

    public function index()
    {

        $users = Users::all();
        // ->where('id', session()->get('id_user'))
        // ->first();




        $donors = Donor::all();
        $donors = $donors->map(function ($donor) use ($users) {
            $donor['user'] = $users->where('id', $donor['id'])->first();
            return $donor;
        });
        // dd($donors);

        return view('petugas.dashboard', [
            'donors' => $donors,
            'users' => $users
        ]);
    }


    public function create()
    {
        $users = Users::query()
            ->where('role_id', 1)->get();

        return view('petugas.tambah', compact('users'));
    }

    public function store(Request $request)
    {
        $jml = $request->izin + $request->weight + $request->temperature + $request->sistole + $request->diastole + $request->denyut + $request->hemoglobin;

        if ($jml < 7) {
            $status_fisik = "Tidak Layak";
        } else {
            $status_fisik = "Layak";
        }
        dd($request);

        $payload = [
            'izin' => $request->izin,
            'weight' => $request->weight,
            'temperature' => $request->temperature,
            'sistole' => $request->sistole,
            'diastole' => $request->diastole,
            'denyut' => $request->denyut,
            'hemoglobin' => $request->hemoglobin,
            'user_id' => $request->user_id,
            'status_fisik' => $status_fisik
        ];

        // dd($validated);

        Donor::create($payload);
        return redirect()->route('petugas.dashboard');
    }

    public function edit($id)
    {
        $donor = Donor::find($id);
        $users = Users::all();
        return view('petugas.edit', [
            'donor' => $donor,
            'users' => $users
        ]);
    }


    public function update(Request $request, $id)
    {

        $jml = $request->izin + $request->weight + $request->temperature + $request->sistole + $request->diastole + $request->denyut + $request->hemoglobin;

        if ($jml < 7) {
            $status_fisik = "Tidak Layak";
        } else {
            $status_fisik = "Layak";
        }


        $payload = [
            'izin' => $request->izin,
            'weight' => $request->weight,
            'temperature' => $request->temperature,
            'sistole' => $request->sistole,
            'diastole' => $request->diastole,
            'denyut' => $request->denyut,
            'hemoglobin' => $request->hemoglobin,
            'user_id' => $request->user_id,
            'status_fisik' => $status_fisik
        ];

        // dd($validated);
        $donor = Donor::find($id);
        $donor->fill($payload);
        $donor->save();
        return redirect()->route('petugas.dashboard');
    }

    public function destroy($id)
    {
        $donor = Donor::find($id);
        $donor->delete();
        return redirect()->route('donor.list');
    }
}
