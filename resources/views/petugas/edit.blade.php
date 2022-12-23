@extends('templates.template')
@section('title, tambah verifikasi')

@section('editpendonor')

<h3>Form Edit Data Pendonor</h3>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach 
    @endif

<form action={{ route('petugas.update', $donors->id) }} method="post">
@csrf
<div class="form-group">
    <label for="">Nama Pendonor : </label>
  
    <input type="text" name="name" value="{{ $user->name }}" disabled>
    <input type="hidden" name="user_id" value="{{ $user->id }}" >
    
</div>

@php
    $dateOfBirth = $user->birth_date;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    // echo 'Age is '.$diff->format('%y');
@endphp

<div>
     <label for="">Umur Pendonor : </label>
     <input type="text" id="umur" value="{{ $diff->format('%y')  }}" disabled>
</div>

<div>
    <label for=""> Jika Pendonor dibawah 17 tahun apakah sudah mendapatkan izin orang tua(jika diatas 17tahun pilih sudah) </label><br>
    <input type="radio" name="izin" value="1" {{ $donors->izin == '1' ? 'checked' : '' }}>
    <label for="">Sudah</label><br>
    <input type="radio" name="izin" value="0" {{ $donors->izin == '0' ? 'checked' : '' }}>
    <label for="">Belum</label><br>
</div>

<div>
    <label for=""> Apakah Berat Badan Pendonor Diatas 45kg : </label><br>
    <input type="radio" name="weight" value="1" {{ $donors->weight == '1' ? 'checked' : '' }}>
    <label for="">Iya</label><br>
    <input type="radio" name="weight" value="0" {{ $donors->weight == '0' ? 'checked' : '' }}>
    <label for="">Tidak</label><br>
</div>

<div>
    <label for=""> Apakah Temperatur Tubuh Si Pendonor Antara 36,6 - 37,5 derajat Celcius </label><br>
    <input type="radio" name="temperature" value="1" {{ $donors->temperature == '1' ? 'checked' : '' }}>
    <label for="">Iya</label><br>
    <input type="radio" name="temperature" value="0" {{ $donors->temperature == '0' ? 'checked' : '' }}>
    <label for="">Tidak</label><br>
</div>

<div>
    <label for=""> Apakah Tekanan darah si pendonor yaitu sistole antara 110-160 mmHg, </label><br>
    <input type="radio" name="sistole" value="1" {{ $donors->sistole == '1' ? 'checked' : '' }} >
    <label for="">Iya</label><br>
    <input type="radio" name="sistole" value="0" {{ $donors->sistole == '0' ? 'checked' : '' }}>
    <label for="">Tidak</label><br>
</div>

<div>
    <label for=""> Apakah Tekanan darah si pendonor yaitu diastole antara 70-100 mmHg, </label><br>
    <input type="radio" name="diastole" value="1" {{ $donors->diastole == '1' ? 'checked' : '' }}>
    <label for="">Iya</label><br>
    <input type="radio" name="diastole" value="0" {{ $donors->diastole == '0' ? 'checked' : '' }}>
    <label for="">Tidak</label><br>
</div>

<div>
    <label for=""> Apakah Denyut nadi si pendonor 50-100 kali/menit </label><br>
    <input type="radio" name="denyut" value="1" {{ $donors->denyut == '1' ? 'checked' : '' }}>
    <label for="">Iya</label><br>
    <input type="radio" name="denyut" value="0" {{ $donors->denyut == '0' ? 'checked' : '' }}>
    <label for="">Tidak</label><br>
</div>

<div>
    <label for=""> Apakah Hemoglobin si pendonor telah memenuhi syarat (perempuan minimal 12 gram) dan (laki-laki minimal 12,5 gram) </label><br>
    <input type="radio" name="hemoglobin" value="1" {{ $donors->hemoglobin == '1' ? 'checked' : '' }}>
    <label for="">Iya</label><br>
    <input type="radio" name="hemoglobin" value="0" {{ $donors->hemoglobin == '0' ? 'checked' : '' }}>
    <label for="">Tidak</label><br>
</div>

<div>
    <input type="hidden" name="user_id" value="{{ $donors->id }}">
</div>

 <div class="py-4">
        <button type="submit" class="btn btn-primary my-3" >Kirim</button>
</div>

</form>


  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

  <script>

    $("#user_id").on("change", function(){
        let umur = $(this).find(':selected').attr('data-umur')
        $("#umur").val(_calculateAge(umur))
    })

    function _calculateAge(birthday) { // birthday is a date
        var ageDifMs = Date.now() - birthday.getTime();
        var ageDate = new Date(ageDifMs); // miliseconds from epoch
        return Math.abs(ageDate.getUTCFullYear() - 1970);
    }
    
  </script>


@endsection