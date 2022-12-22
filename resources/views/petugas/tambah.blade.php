@extends('templates.template')
@section('title, tambah verifikasi')

@section('verifikasi')

<h3>Form Pengisian Data Pendonor</h3>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach 
    @endif

<form action={{ route('petugas.store') }} method="post">
@csrf
<div class="form-group">
    <label for="">Nama Pendonor : </label>
        <select name="user_id" id="user_id">
            <option value="">Pilih Pendonor</option>
        @foreach($users as $pendonor)
            <option value="{{$pendonor->id}}" data-umur="{{$pendonor->birth_date}}">{{ $pendonor->name}}</option>
        @endforeach
    </select>
</div>

<div>
     <label for="">Umur Pendonor : </label>
     <input type="text" id="umur" disabled>
</div>

<div>
    <label for=""> Jika Pendonor dibawah 17 tahun apakah sudah mendapatkan izin orang tua(jika diatas 17tahun pilih sudah) </label><br>
    <input type="radio" name="izin" value="1">
    <label for="">Sudah</label><br>
    <input type="radio" name="izin" value="0">
    <label for="">Belum</label><br>
</div>

<div>
    <label for=""> Apakah Berat Badan Pendonor Diatas 45kg : </label><br>
    <input type="radio" name="weight" value="1">
    <label for="">Iya</label><br>
    <input type="radio" name="weight" value="0">
    <label for="">Tidak</label><br>
</div>

<div>
    <label for=""> Apakah Temperatur Tubuh Si Pendonor Antara 36,6 - 37,5 derajat Celcius </label><br>
    <input type="radio" name="temperature" value="1">
    <label for="">Iya</label><br>
    <input type="radio" name="temperature" value="0">
    <label for="">Tidak</label><br>
</div>

<div>
    <label for=""> Apakah Tekanan darah si pendonor yaitu sistole antara 110-160 mmHg, </label><br>
    <input type="radio" name="sistole" value="1">
    <label for="">Iya</label><br>
    <input type="radio" name="sistole" value="0">
    <label for="">Tidak</label><br>
</div>

<div>
    <label for=""> Apakah Tekanan darah si pendonor yaitu diastole antara 70-100 mmHg, </label><br>
    <input type="radio" name="diastole" value="1">
    <label for="">Iya</label><br>
    <input type="radio" name="diastole" value="0">
    <label for="">Tidak</label><br>
</div>

<div>
    <label for=""> Apakah Denyut nadi si pendonor 50-100 kali/menit </label><br>
    <input type="radio" name="denyut" value="1">
    <label for="">Iya</label><br>
    <input type="radio" name="denyut" value="0">
    <label for="">Tidak</label><br>
</div>

<div>
    <label for=""> Apakah Hemoglobin si pendonor telah memenuhi syarat (perempuan minimal 12 gram) dan (laki-laki minimal 12,5 gram) </label><br>
    <input type="radio" name="hemoglobin" value="1">
    <label for="">Iya</label><br>
    <input type="radio" name="hemoglobin" value="0">
    <label for="">Tidak</label><br>
</div>


 <div class="py-4">
        <button type="submit" class="btn btn-primary my-3" >Kirim</button>
</div>

</form>


  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

  <script>

    $("#user_id").on("change", function(){
        let umur = $(this).find(':selected').attr('data-umur')
        $("#umur").val(umur)
    })
    
  </script>


@endsection