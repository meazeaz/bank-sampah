@extends('layout.main')

@section('title', 'TPST GRIYA BERSEMI CISOKA')

@section('content')
<header class="dashboard-header gradient-brand position-relative">
   <div class="header-wrapper">
      <div class="container text-center">
         <img src="{{ asset('images/logo-white.png') }}" alt="we-cycle-logo" srcset="">
      </div>
   </div>
</header>
<main id="home-page" class="main-container">
   <!-- Hero -->
   <section class="hero text-center bg-image">
      <div class="d-flex justify-content-center align-items-center h-100">
         <div class="text-white">
            <img src="{{ asset('images/logo-hero.png') }}" alt="we-cycle-brand">
            <h5 class="text-center pt-2">Kelola sampah jadi mudah</h5>
              <p class="text-center pt-2">segera tukarkan nyawamu</p>
         </div>
      </div>
   </section>
   <!-- Hero End -->
   {{-- Slider --}}
   <section class="container pt-5 px-4">
      <div class="row text-center">
         <div class="col">
            <!-- Swiper -->
            <div class="swiper sampahSlider">
               <div class="swiper-wrapper">
                  @forelse($banners as $banner)
                  <div class="swiper-slide">
                     <img class="w-100" src="{{ asset($banner->image) }}" alt="{{ $banner->title }}" srcset="" style="border-radius: 12px; height: 180px; object-fit: cover;">
                     <div class="hero-text" style="background: rgba(0,0,0,0.5); border-radius: 0 0 12px 12px; bottom: 0; left: 0; right: 0; padding: 10px;">
                        <p class="fw-bold text-white mb-0" style="font-size: 14px;">
                           {{ $banner->title }}
                        </p>
                     </div>
                  </div>
                  @empty
                  <div class="swiper-slide">
                     <div class="bg-secondary text-white text-center py-5 rounded-4">
                        Belum ada banner iklan.
                     </div>
                  </div>
                  @endforelse
               </div>
               <div class="swiper-pagination"></div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col">
            <h1 class="mt-4 fs-2 fw-bold mb-0">
               Halo!
            </h1>
            <h3 class="fs-4 fw-bold">
               Selamat Datang di TPST GRIYA BERSEMI CISOKA!
            </h3>
            <p class="mt-4">
               Ayo Tukarkan Sampahmu Dan Dapatkan <br> Reward Menarik Sekarang Juga!
            </p>
         </div>
      </div>
      {{-- Login action --}}
      <div class="row mt-2">
         <div class="col">
            <div class="d-grid gap-2">
               <a class="btn btn-primary rounded-pill fw-bold my-2" href="{{ url('login') }}">
                  Login
               </a>
               <a class="btn btn-outline-primary rounded-pill fw-bold mt-1" href="{{ url('register') }}">
                  Buat Akun
               </a>
            </div>
         </div>
      </div>
   </section>
   {{-- Alur penanganan Sampah --}}
   <section class="container mt-5 pt-2 px-4">
      <div class="row">
         <div class="col">
             <h4 class="fw-bold">
                Alur Penanganan Sampah<br>
                Oleh <span style="color: var(--primary-color)">TPST GRIYA BERSEMI CISOKA</span>
             </h4>
            <img class="w-100" src="{{ asset('images/waste-art-1.png') }}" alt="Alur Penanganan Sampah" srcset="">
         </div>
      </div>
      <div class="row">
         <div class="col">
            <div class="card mb-1 landing-card-shadow border-light">
               <div class=" row g-0">
                  <div class="col-3 p-2 d-flex justify-content-center align-items-center text-center">
                     <img class="max-w-100 ps-3" src="{{ asset('images/icons/peoples.png') }}"
                        class="img-fluid rounded-start" alt="peoples">
                  </div>
                  <div class="col-9">
                     <div class="card-body">
                        <h6 class="card-title fw-bold">
                           Pemberdayaan Masyarakat
                        </h6>
                        <p class="font-sm card-text">
                           Mengajak Komunitas Masyarakat Mengikuti Campaign TPST GRIYA BERSEMI CISOKA
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card mb-1 landing-card-shadow border-light">
               <div class=" row g-0">
                  <div class="col-3 p-2 d-flex justify-content-center align-items-center text-center">
                     <img class="max-w-100 ps-3" src="{{ asset('images/icons/book.png') }}"
                        class="img-fluid rounded-start" alt="education">
                  </div>
                  <div class="col-9">
                     <div class="card-body">
                        <h6 class="card-title fw-bold">
                           Edukasi
                        </h6>
                        <p class="font-sm card-text">
                           Mengajarkan Ilmu & Keterampilan Terkait Kepada Masyarakat
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card mb-1 landing-card-shadow border-light">
               <div class=" row g-0">
                  <div class="col-3 p-2 d-flex justify-content-center align-items-center text-center">
                     <img class="max-w-100 ps-3" src="{{ asset('images/icons/gift.png') }}"
                        class="img-fluid rounded-start" alt="reward">
                  </div>
                  <div class="col-9">
                     <div class="card-body">
                        <h6 class="card-title fw-bold">
                           Reward
                        </h6>
                        <p class="font-sm card-text">
                           Masyarakat mendapatkan Reward Berdasarkan Kontribusinya
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card mb-1 landing-card-shadow border-light">
               <div class=" row g-0">
                  <div class="col-3 p-2 d-flex justify-content-center align-items-center text-center">
                     <img class="max-w-100 ps-3" src="{{ asset('images/icons/cycle.png') }}"
                        class="img-fluid rounded-start" alt="economic-cycle">
                  </div>
                  <div class="col-9">
                     <div class="card-body">
                        <h6 class="card-title fw-bold">
                           Siklus Ekonomi
                        </h6>
                        <p class="font-sm card-text">
                           Menjalankan Roda Ekonomi Melalui Transaksi di TPST GRIYA BERSEMI CISOKA
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
    {{-- ACHIEVEMENT --}}
    <section class="achievement-section text-center">
       <h4 class="text-light text-center mb-4">
          ACHIEVEMENTS
       </h4>
       <div class="row g-3 px-2">
          <div class="col-6">
             <div class="achievement-card">
                <img src="{{ asset('images/icons/users.png') }}" alt="users" style="height: 36px; object-fit: contain;">
                <h5 class="text-light fw-bold mb-0 mt-2">100+</h5>
                <p class="text-light-50 font-sm mb-0">Nasabah Aktif</p>
             </div>
          </div>
          <div class="col-6">
             <div class="achievement-card">
                <img src="{{ asset('images/icons/weight.png') }}" alt="weight" style="height: 36px; object-fit: contain;">
                <h5 class="text-light fw-bold mb-0 mt-2">10 Ton+</h5>
                <p class="text-light-50 font-sm mb-0">Sampah Dikelola</p>
             </div>
          </div>
          <div class="col-6">
             <div class="achievement-card">
                <img src="{{ asset('images/icons/partner.png') }}" alt="partners" style="height: 36px; object-fit: contain;">
                <h5 class="text-light fw-bold mb-0 mt-2">25+</h5>
                <p class="text-light-50 font-sm mb-0">Mitra UMKM</p>
             </div>
          </div>
          <div class="col-6">
             <div class="achievement-card">
                <img src="{{ asset('images/icons/trash.png') }}" alt="trash" style="height: 36px; object-fit: contain;">
                <h5 class="text-light fw-bold mb-0 mt-2">8 Tahun</h5>
                <p class="text-light-50 font-sm mb-0">Melayani Desa</p>
             </div>
          </div>
       </div>
    </section>
   {{-- PENYETORAN SAMPAH --}}
   <section class="container mt-4 pt-2 px-4">
      <div class="row">
         <div class="col-sm-12 text-center">
             <h4 class="fw-bold">
                Penyetoran Sampah Ke <span style="color: var(--primary-color)">TPST GRIYA BERSEMI CISOKA</span>
             </h4>
            <img class="w-100 px-5 mt-3" src="{{ asset('images/waste-management.png') }}" alt="alur penyetoran sampah"
               srcset="">
         </div>
         <div class="col-sm-12">
            <ol class="list-group list-group-numbered fw-bold">
               <li class="list-group-item d-flex border-0 justify-content-between align-items-start ">
                  <div class="ms-2 me-auto fw-normal">
                     <div class="fw-bold">
                        Sampah dipilah berdasarkan kategori yang diterima di bank sampah.
                     </div>
                     <a class="btn btn-secondary rounded-pill fw-bold my-2" href="#">
                        Pelajari Selengkapnya
                     </a>
                  </div>
               </li>
               <li class="list-group-item d-flex border-0 justify-content-between align-items-start">
                  <div class="ms-2 me-auto fw-normal">
                     <div class="fw-bold">
                        Sampah yang telah dipilah diantarkan ke TPST GRIYA BERSEMI CISOKA.
                     </div>
                     <ul class="list-group border-light">
                        <li class="list-group-item border-0">
                           <img src="{{ asset('images/icons/location-sm.png') }}" alt="location">
                           Desa Cibugel, Kecamatan Cisoka, Kabupaten Tangerang.
                        </li>
                        <li class="list-group-item border-0">
                           Senin-Jum'at : 08.00 - 15.00 WIB <br>
                           Sabtu : 08.00 - 13.00 WIB <br>
                           Minggu/Tanggal Merah
                           <span class="fw-bold" style="color: red"> LIBUR</span>
                        </li>
                     </ul>
                  </div>
               </li>
               <li class="list-group-item d-flex border-0 justify-content-between align-items-start">
                  <div class="ms-2 me-auto fw-normal">
                     <div class="fw-bold">
                        Untuk warga yang belum terdaftar, dapat mendaftarkan diri terlebih dahulu melalui
                        website TPST GRIYA BERSEMI CISOKA.
                     </div>
                  </div>
               </li>
               <li class="list-group-item d-flex border-0 justify-content-between align-items-start">
                  <div class="ms-2 me-auto fw-normal">
                     <div class="fw-bold">
                        Apabila sudah terdaftar, sampah yang dikumpulkan akan langsung dihitung dan diperiksa oleh
                        petugas.
                     </div>
                  </div>
               </li>
               <li class="list-group-item d-flex border-0 justify-content-between align-items-start">
                  <div class="ms-2 me-auto fw-normal">
                     <div class="fw-bold">
                        Terjadi transaksi antara petugas dan anggota, sampah yang dikumpulkan akan ditukarkan
                        dengan
                     </div>
                     <ul class="list-group border-light">
                        <li class="list-group-item border-0">
                           - Uang: harga per kategori/kilogram
                        </li>
                        <li class="list-group-item border-0">
                           - Point: 100 point/kilogram
                        </li>
                     </ul>
                  </div>
               </li>
               <li class="list-group-item d-flex border-0 justify-content-between align-items-start">
                  <div class="ms-2 me-auto fw-normal">
                     <div class="fw-bold">
                        Anggota dapat mengecek progress pada dashboard user dengan mengakses website TPST GRIYA BERSEMI CISOKA dan
                        login dengan akun yang telah terdaftar
                     </div>
                  </div>
               </li>
               <li class="list-group-item d-flex border-0 justify-content-between align-items-start">
                  <div class="ms-2 me-auto fw-normal">
                     <div class="fw-bold">
                        Anggota dapat menukar point yang telah dikumpulkan dengan reward di bagian tukar point.
                     </div>
                  </div>
               </li>
            </ol>
         </div>
          <h6 class="my-4 fw-bold text-center" style="color: var(--primary-color)">
             Siap Mengelola Sampah Bersama Kami?
          </h6>
      </div>
   </section>
</main>
<footer class="landing-footer">
   <div class="container px-4 pt-5 pb-2">
      <div class="row">
         <h5 class="text-center mt-2 fw-bold">
            Contact Us
         </h5>
         <div class="col mt-3 d-flex justify-content-center align-items-center">
            <a class="btn btn-dark btn-circle" href="#!" role="button">
               <i class="bi bi-facebook"></i>
            </a>
            <a class="btn btn-dark btn-circle" href="#!" role="button">
               <i class="bi bi-instagram"></i>
            </a>
            <a class="btn btn-dark btn-circle" href="#!" role="button">
               <i class="bi bi-twitter"></i>
            </a>
         </div>
         <a href="#" class="text-dark mt-4 mb-2">
            <h6 class="fw-bold">
               Syarat dan Ketentuan*
            </h6>
         </a>
         <hr>
      </div>
   </div>
   <div class="container d-flex justify-content-between px-3">
      <p>
         &#169; Copyright @2023
      </p>
      <p>
         All Right Reserved
      </p>
   </div>
</footer>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
   var swiper = new Swiper(".sampahSlider", {
      pagination: {
       el: ".swiper-pagination",
      },
      });
</script>
@endsection
