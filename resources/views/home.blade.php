@extends('templates.template')


@section('title', 'Tambah Pendonor')

@section('content')

<div class="text-center align-center">
<h2>Selamat datang di Palang Merah Negara Wakanda</h2>
<h3>Apakah anda ingin berkontribusi?</h3>
<h4>Sudah Punya Akun</h4><span><a href={{ route('login') }}>Login</a>
<h4>Belum Punya Akun</h4><span><a href={{ route('create') }}>Register</a>
</div>





@endsection