<?php

namespace App\Http\Controllers;

use App\Models\Donor;

use App\Models\Users;

use Illuminate\Http\Request;

class DonorController extends Controller
{

    public function index()
    {

        // $users = Users::query()
        //     ->where('id', session()->get('id_user'))
        //     ->first();
        // $donors = Donor::query();
        $donors = Donor::all();
        return view('petugas.dashboard', compact('donors'));
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

        // $validated = [
        //     'izin' => 'required',
        //     'weight' => 'required',
        //     'temperature' => 'required',
        //     'sistole' => 'required',
        //     'diastole' => 'required',
        //     'denyut' => 'required',
        //     'hemoglobin' => 'required',
        //     'user_id' => 'required',
        // ];


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

        // $validated = $request->validate($validated);
        Donor::create($payload);
        return redirect()->route('petugas.dashboard')->with('Success', 'Pengguna Berhasil Ditambahkan');
        // $status_fisik = 0;

        // if ($request->berat_badan < 45) {
        //     $status_fisik += 1;
        // }
        // if ($request->temperature < 36.6 || $request->temperature > 37.5) {
        //     $status_fisik += 1;
        // }

        // if ($request->sistole >= 110 && $request->sistole <= 160 && $request->diastole >= 70 && $request->diastole <= 100) {
        // } else {
        //     $status_fisik += 1;
        // }

        // if ($request->denyut_nadi < 50 || $request->denyut_nadi > 100) {
        //     $status_fisik += 1;
        // }

        // if ($request->izin == 2) {
        //     $status_fisik += 1;
        // }

        // Donor::query()->where('id_user', $id)->update([
        //     'izin' => $request->izin,
        //     'berat_badan' => $request->weight,
        //     'temperature' => $request->temperature,
        //     'sistole' => $request->sistole,
        //     'diastole' => $request->diastole,
        //     'denyut' => $request->denyut,
        //     'hemoglobin' => $request->hemoglobin
        // ]);

        // if ($status_fisik > 0) {
        //     Donor::query()->where('id', $id)->update([
        //         'status_fisik' => 4
        //     ]);
        // } else {
        //     Donor::query()->where('id', $id)->update([
        //         'status_fisik' => 3
        //     ]);
        // }

        // return redirect()->route('dashboard');

        // $validated = $request->validate($validated);
        // $donor = Donor::create($validated);
        // return redirect()->route('petugas.dashboard');
    }

    public function edit($id)
    {
        $donor = Donor::find($id);
        return view('update', ['donor' => $donor]);
    }


    public function update(Request $request, $id)
    {
        $users = Users::query()
            ->where('id', session()->get('id_user'))->first();

        $this->validate($request, [
            'izin' => 'required',
            'weight' => 'required',
            'temperature' => 'required',
            'blood' => 'required',
            'sistole' => 'required',
            'diastole' => 'required',
            'denyut' => 'required',
            'hemoglobin' => 'required',

        ]);

        $status_fisik = 0;

        if ($request->berat_badan < 45) {
            $status_fisik += 1;
        }
        if ($request->temperature < 36.6 || $request->temperature > 37.5) {
            $status_fisik += 1;
        }

        if ($request->sistole >= 110 && $request->sistole <= 160 && $request->diastole >= 70 && $request->diastole <= 100) {
        } else {
            $status_fisik += 1;
        }

        if ($request->denyut_nadi < 50 || $request->denyut_nadi > 100) {
            $status_fisik += 1;
        }

        if ($request->izin == 2) {
            $status_fisik += 1;
        }

        Donor::query()->where('id_user', $id)->update([
            'izin' => $request->izin,
            'berat_badan' => $request->weight,
            'temperature' => $request->temperature,
            'sistole' => $request->sistole,
            'diastole' => $request->diastole,
            'denyut' => $request->denyut,
            'hemoglobin' => $request->hemoglobin
        ]);

        if ($status_fisik > 0) {
            Users::query()->where('id', $id)->update([
                'status_fisik' => 4
            ]);
        } else {
            Users::query()->where('id', $id)->update([
                'status_fisik' => 3
            ]);
        }

        return redirect()->route('petugas.dashboard');
    }

    public function destroy($id)
    {
        $donor = Donor::find($id);
        $donor->delete();
        return redirect()->route('donor.list');
    }
}
