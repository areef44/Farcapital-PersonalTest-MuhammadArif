@extends('templates.template')

@section('title', 'Halaman Pendonor')

@section('user')


     <div class="text-center" style="border: 1px">
     
     <h2 class="entry-title">Selamat Datang, {{ $users->name }}</h2>

     <h5>Silakan Mengisi Form Persyaratan donor darah</h5>
     
     <a href={{ route('users.edit', ['users' => $users->id] ) }}><button>isi data</button></a> 
     
     <div class="text-center">
     <a href={{ route('logout') }} class="text-center"><button>Log Out</button></a>
     </div>


@endsection