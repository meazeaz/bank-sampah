@extends('layout.header-tukar-poin')

@section('title', 'Reward | TPST GBC')

@section('tukar-point-content')
{{-- HERO REWARD --}}
<div class="container-fluid mt-4 px-0">
    <img class="w-100 rounded-3" style="height: 300px; object-fit: cover; display: block;" src="{{ url($reward->image) }}" alt="reward">
</div>
<div class="container mt-4 pb-5 mb-5 ">
    <div class="row">
        <div class="col m-0 d-flex justify-content-between">
            <h5 class="fw-bold m-0">
                {{ $reward->name }}
            </h5>
            <p class="fw-bold" style="color: var(--accent-color);">
                {{ $reward->price }} Poin
            </p>
        </div>
    </div>
    <div class="row">
        <p class="font-sm">
            {{ $reward->description }}
        </p>
    </div>
    <div class="row mx-4">
        <a class="btn btn-primary rounded-pill fw-bold my-2 px-4 py-2"
            href="{{ url('/tukar-poin/reward/'.$reward->id.'/konfirmasi') }}">
            Tukarkan Poin <i class="bi bi-chevron-right"></i>
        </a>
    </div>
</div>

<div class="navigation-menu py-1">
    <div class="container d-flex justify-content-evenly">
        <div>
            <a class="btn btn-lg border-0 px-1 py-auto" href="/dashboard">
                <i class="bi bi-house" style="font-size: 1.4rem; color: #94a3b8;"></i>
                <p class="text-muted fw-bold font-sm p-0 m-0" style="font-size: 11px !important;">Beranda</p>
            </a>
        </div>
        <div>
            <a class="btn btn-lg border-0 px-1 py-auto" href="/kategori-sampah">
                <i class="bi bi-grid" style="font-size: 1.4rem; color: #94a3b8;"></i>
                <p class="text-muted fw-bold font-sm p-0 m-0" style="font-size: 11px !important;">Kategori</p>
            </a>
        </div>
        <div>
            <a class="btn btn-lg border-0 px-1 py-auto" href="/profile">
                <i class="bi bi-person" style="font-size: 1.4rem; color: #94a3b8;"></i>
                <p class="text-muted fw-bold font-sm p-0 m-0" style="font-size: 11px !important;">Profil</p>
            </a>
        </div>
        <div>
            <a class="btn btn-lg border-0 px-1 py-auto" href="/settings">
                <i class="bi bi-gear" style="font-size: 1.4rem; color: #94a3b8;"></i>
                <p class="text-muted fw-bold font-sm p-0 m-0" style="font-size: 11px !important;">Pengaturan</p>
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
</script>
@endsection
