@extends('templates.template')

@section('title', 'Verifikasi Data Pendonor')
@section('content')

<div class="text-center">
    <h3>Form Pendaftaran Anggota PMW Negara Wakanda</h3>
    <form action={{ route('store') }} method="post">
    
    @csrf
    <div>
    <label for="name" > Nama : </label><br>
    <input type="text" name="name" required>
    </div>
    
     <div>
            <label for="">Jenis Kelamin : </label><br>
            <input type="radio" name="gender" value="l">
            <label for="">Laki-Laki</label><br>
            <input type="radio" name="gender" value="p">
            <label for="">Perempuan</label><br>
    </div>
   
    <div>
    <label for="birth_date"> Tanggal Lahir : </label><br>
    <input type="date" name="birth_date">
    </div>
    
    <div>
    <label for="alamat"> Alamat : </label><br>
    <textarea name="alamat" cols="30" rows="10">

    </textarea>
    </div>

     <div>
    <label for="email">Email : </label><br>
    <input type="text" name="email">
    </div>

    <div>
    <label for="password">Masukkan Password : </label><br>
    <input type="password" name="password">
    </div>

    <div>
    <label for="verification_password">Verifikasi Password : </label><br>
    <input type="password" name="verification_password">
    </div>

    <div class="py-4">
        <button type="submit" class="btn btn-primary my-3" >Kirim</button>
    </div>
    
</form>

    <div>
        <a href={{ route('home') }}>Kembali</a>
    </div>

</div>

@endsection