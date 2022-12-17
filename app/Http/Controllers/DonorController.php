<?php

namespace App\Http\Controllers;

use App\Models\Donor;

use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function home()
    {
        return view('home');
    }


    public function list(Donor $donor)
    {
        return view(
            'list',
            [
                'donors' => Donor::all()
            ]
        );
    }

    public function detail($id)
    {
        $donor = Donor::find($id);
        dd($donor);
        return view('detail', [
            'donor' => $donor
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        $data = [
            'nama' => $request->input('nama'),
            'birth_date' => $request->input('birth_date'),
            'gender' => $request->input('gender'),
            'alamat' => $request->input('alamat'),

        ];
        $data = Donor::create($data);
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $donor = Donor::find($id);
        $donor->delete();
        return redirect()->route('list');
    }
}
