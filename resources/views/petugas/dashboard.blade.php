@extends('templates.template')

@section('title, kelola data pendonor')

@section('admin')

{{-- <h2 class="entry-title">Selamat Datang, {{ $users->name }}</h2> --}}

<table border="1" class="table-bordered text-center">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Izin</th>
            <th>Berat Badan</th>
            <th>Suhu Badan</th>
            <th>Sistole</th>
            <th>Diastole</th>
            <th>Denyut Nadi</th>
            <th>Hemoglobin</th>
            <th>Apakah Sudah Memenuhi Syarat</th>
            <th>Action</th>
        </tr>
    </thead>

    {{-- TODO: loop all pendonor data --}}
    <tbody>
    @foreach($donors as $donor)
       <tr>
        <td>
            {{ $loop->iteration }}
        </td>
        <td>
            {{ $donor->users->name }}
        </td>
        <td>
            {{ $donor->izin }}
        </td>
        <td>
            {{ $donor->weight }}
        </td>
        <td>
           {{ $donor->temperature }}
        </td>
         <td>
            {{ $donor->sistole }}
        </td>
         <td>
            {{ $donor->diastole }}
        </td>
         <td>
            {{ $donor->denyut }}
        </td>
         <td>
            {{ $donor->hemoglobin }}
        </td>
         <td>
            {{ $donor->status_fisik }}
        </td>
        <td>
            
            <form action="{{ route('petugas.destroy',$donor->id) }}" method="post">
            <button><a href={{ route('petugas.edit',$donor->id )}}>Edit</a></button>
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
            </form>
        </td>
         <td>
        </td>
       
       </tr>
        @endforeach
    </tbody>
    {{-- <a href={{ route('dashboard') }} class="btn btn-danger">Kembali</a> --}}
</table>


<h3>verifikasi Data Pendonor</h3>
{{-- <a href={{ route('petugas.edit')}}></a> --}}

@endsection