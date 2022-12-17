@extends('templates.template')

@section('title', 'Detail')

@section('content')

            <h2 class="entry-title">
                {{ $donor->nama }}
              </h2>

               <h2 class="entry-title">
                {{ $donor->gender }}
              </h2>

                <h2 class="entry-title">
                {{ $donor->birth_date }}
              </h2>
               <h2 class="entry-title">
                {{ $donor->alamat }}
              </h2>


              <a href="/list">Kembali</a>
               


{{-- table>thead>tr>th*6 --}}

@endsection