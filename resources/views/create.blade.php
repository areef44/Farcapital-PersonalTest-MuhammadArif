@extends('templates.template')

@section('title', 'Tambah Data Pendonor')
@section('content')
<form action="{{ route('store') }}" method="post">
    
    @csrf
    <label for="name" >Nama</label>
    <input type="text" name="nama" required>
    <label for="gender">Jenis Kelamin</label>
    <input type="text" name="gender">
    <label for="birth_date">Tanggal Lahir</label>
    <input type="text" name="birth_date">
    <label for="biodata">Alamat</label>
    <input type="text" name="alamat">
    <button type="submit">Simpan</button>

</form>
@endsection