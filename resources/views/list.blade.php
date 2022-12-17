@extends('templates.template')

@section('title', 'Tambah Pendonor')

@section('content')

<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
    </thead>

    {{-- TODO: loop all student data --}}
    <tbody>
       @foreach($donors as $donor)
       <tr>
        <td>
            {{ $loop->iteration }}
        </td>
           <td>
               {{ $donor->nama }}
       </td>
       <td>
            {{ $donor->gender }}
        </td>
       <td>
           {{ $donor->birth_date }}
        </td>
        <td>
            {{ $donor->alamat }}
        </td>
         <td>
            <a href="detail/{{ $donor->id }}">details</a>
      
           <a href="destroy/{{ $donor->id }}" class="btn btn-danger">Hapus</a>
        </td>
    </tr>
       @endforeach
    </tbody>
    <a href="/dashboard" class="btn btn-danger">Kembali</a>
</table>

{{-- table>thead>tr>th*6 --}}

@endsection