@extends('templates.template')

@section('title', 'List data Pendonor')

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
            <form action="{{ route('donor.destroy',$donor->id) }}" method="post">
            @csrf
            @method('DELETE')
            <a href={{ route('donor.detail',$donor->id) }}>details</a>
            <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
       @endforeach
    </tbody>
    <a href={{ route('dashboard') }} class="btn btn-danger">Kembali</a>
</table>

{{-- table>thead>tr>th*6 --}}

@endsection