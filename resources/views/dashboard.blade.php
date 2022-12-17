@extends('templates.template')

@section('petugas')


    <!-- ======= Blog Section ======= -->

              @error('msg')
                <p>{{ $message }}</p>
                  
              @enderror

              <h3 class="sidebar-title">Beranda Admin</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="/donor/list"><button type="button" class="btn btn-secondary">Kelola Pendonor</button></a></li>
                  <li><a href={{ route('logout') }} class="btn btn-danger text-white"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                </ul>
              </div><!-- End sidebar categories-->

              

              

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

            <div class="col-lg-8 entries">
            <div class="text-center">
                 <h1>Selamat Datang di Halaman Administrator</h1>
                 
            </div>
            <div class="text-center py-5">
                <img src="assets/img/admin.jpg" alt="" width="80%">
            </div>
           


    </section><!-- End Blog Section -->


@endsection