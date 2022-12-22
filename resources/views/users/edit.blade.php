@extends('templates.template')

@section('title', 'Halaman Edit Identitas')

@section('edit')

    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach 
    @endif
    <form action={{ route('users.update', ['users' => $users->id] ) }} method="post">

     @csrf   
    <div>

    <div class="w-50 h-3 px-4">
        <h5>Data Identitas Pribadi</h5>
        <div>
            <label for="">Nama : </label>
            <input type="text" name="name" value={{ $users->name }}>
        </div>
        <div>
            <label for="">Tanggal Lahir : </label>
            <input type="date" name="birth_date" value={{ $users->birth_date}}>
        </div>

        <div>
            <label for="">Jenis Kelamin : </label><br>
            <input type="radio" name="gender" value="l"{{ $users->gender == 'l' ? 'checked' : '' }}>
            <label for="">Laki-Laki</label><br>
            <input type="radio" name="gender" value="p"{{ $users->gender == 'p' ? 'checked' : '' }}>
            <label for="">Perempuan</label><br>
        </div>
        <div>
            <label for="">Alamat : </label><br>
            <textarea name="alamat" id="" cols="30" rows="10">{{ $users->alamat}}</textarea>
        </div>

         <div>
            <h3>Pengecekan Persyaratan</h3>
            <label for="">Apakah Anda Sudah memenuhi Syarat Mendonorkan Darah : </label><br>
            <input type="radio" name="status" value="sudah" {{ $users->status == 'sudah' ? 'checked' : '' }}>
            <label for="">Sudah</label><br>
            <input type="radio" name="status" value="belum" {{ $users->status == 'belum' ? 'checked' : '' }}>
            <label for="">Belum</label><br>
        </div>
        
        <button type="submit">Submit</button>
        <a href={{ route('users.dashboard')}}><button>kembali</button></a> 
    </div>

    

    </form>
    
</div>

@endsection