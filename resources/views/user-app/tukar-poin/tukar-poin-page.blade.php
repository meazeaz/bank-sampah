@extends('layout.header-tukar-poin')
@section('title', 'Tukar Poin | TPST GBC')

@section('tukar-point-content')
<div class="container">
    {{-- MENU --}}
    <div class="row mx-3 mt-3">
        <div class="col p-0 d-flex justify-content-between">
            <a class=" btn btn-light text-dark rounded-4 py-2 px-3 shadow fw-bold mt-1" href="/history/points">
                <i style="color: var(--primary-color)" class="bi bi-file-earmark-text-fill pe-1"></i>
                <span>Riwayat Poin</span>
            </a>
            <a class="btn btn-light text-dark rounded-4 py-2 px-3 shadow fw-bold mt-1" href="/history/tukar-poin">
                <i style="color: var(--primary-color)" class="bi bi-bag-dash-fill pe-1"></i>
                <span>Pesanan Saya</span>
            </a>
        </div>
    </div>
</div>
{{-- REWARD --}}
<div class="container pb-5 mb-5">
    <div class="row mt-5 mx-3">
        <h5 class="fw-bold ps-0 mb-3">Hiasan</h5>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @if (isset($hiasan) || !empty($hiasan))
                @forelse ($hiasan as $reward)
                <div class="swiper-slide me-3 w-50">
                    <a class="text-dark text-decoration-none" href="{{url("/tukar-poin/reward/{$reward->id}")}}">
                        <div class="card border-0 shadow-sm rounded-3 overflow-hidden h-100" style="background: white;">
                            <img style="height: 100px; object-fit: cover; display: block;" src="{{ $reward->image }}" class="w-100" alt="{{ $reward->name }}">
                            <div class="card-body p-2 text-center">
                                <h6 class="card-title my-0 fw-bold text-success font-outfit" style="font-size: 13px;">
                                    {{ $reward->price }} Poin
                                </h6>
                                <p class="card-text reward-name font-sm mt-1 text-muted mb-0" style="font-size: 11px !important; line-height: 1.3;">
                                    {{ $reward->name }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title my-0 fw-bold">
                            Belum Ada Data!
                        </h6>
                        <p class="card-text reward-name font-sm mt-0">
                            Input data terlebih dulu!
                        </p>
                    </div>
                </div>
                @endforelse
                @endif
            </div>
        </div>
    </div>
    {{-- Reward Kategori 2 --}}
    <div class="row mt-4 mx-3">
        <h5 class="fw-bold ps-0 mb-3">Peralatan</h5>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @if (isset($peralatan) || !empty($peralatan ))
                @forelse ($peralatan as $reward)
                <div class="swiper-slide me-3 w-50">
                    <a class="text-dark text-decoration-none" href="{{url("/tukar-poin/reward/{$reward->id}")}}">
                        <div class="card border-0 shadow-sm rounded-3 overflow-hidden h-100" style="background: white;">
                            <img style="height: 100px; object-fit: cover; display: block;" src="{{ $reward->image }}" class="w-100" alt="{{ $reward->name }}">
                            <div class="card-body p-2 text-center">
                                <h6 class="card-title my-0 fw-bold text-success font-outfit" style="font-size: 13px;">
                                    {{ $reward->price }} Poin
                                </h6>
                                <p class="card-text reward-name font-sm mt-1 text-muted mb-0" style="font-size: 11px !important; line-height: 1.3;">
                                    {{ $reward->name }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title my-0 fw-bold">
                            Belum Ada Data!
                        </h6>
                        <p class="card-text reward-name font-sm mt-0">
                            Input data terlebih dulu!
                        </p>
                    </div>
                </div>
                @endforelse
                @endif
            </div>
        </div>
    </div>
    {{-- Reward Kategori 3 --}}
    <div class="row mt-4 mx-3">
        <h5 class="fw-bold ps-0 mb-3">Perlengkapan</h5>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @if (isset($perlengkapan) || !empty($perlengkapan ))
                @forelse ($perlengkapan as $reward)
                <div class="swiper-slide me-3 w-50">
                    <a class="text-dark text-decoration-none" href="{{url("/tukar-poin/reward/{$reward->id}")}}">
                        <div class="card border-0 shadow-sm rounded-3 overflow-hidden h-100" style="background: white;">
                            <img style="height: 100px; object-fit: cover; display: block;" src="{{ $reward->image }}" class="w-100" alt="{{ $reward->name }}">
                            <div class="card-body p-2 text-center">
                                <h6 class="card-title my-0 fw-bold text-success font-outfit" style="font-size: 13px;">
                                    {{ $reward->price }} Poin
                                </h6>
                                <p class="card-text reward-name font-sm mt-1 text-muted mb-0" style="font-size: 11px !important; line-height: 1.3;">
                                    {{ $reward->name }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title my-0 fw-bold">
                            Belum Ada Data!
                        </h6>
                        <p class="card-text reward-name font-sm mt-0">
                            Input data terlebih dulu!
                        </p>
                    </div>
                </div>
                @endforelse
                @endif
            </div>
        </div>
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
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
</script>
@endsection
