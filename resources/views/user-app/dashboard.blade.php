@extends('layout.main')

@section('title', 'User Dashboard | TPST GBC')

@section('style')
<style>
    .gradient-top-bottom {
        background: linear-gradient(180deg, var(--primary-color) 0%, var(--secondary-color) 100%) !important;
    }
    .card-hover {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card-hover:active {
        transform: scale(0.98);
    }
    .carousel-item {
        transition: transform 0.6s ease-in-out, opacity 0.6s ease-in-out;
    }
    .dashboard-header, #dashboard-page, .navigation-menu {
        max-width: 428px !important;
        margin: 0 auto !important;
    }
</style>
@endsection

@section('content')
<header class="dashboard-header gradient-top-bottom pb-5 pt-3 mb-4" style="border-radius: 0 0 24px 24px; position: relative;">
    <div class="container text-center px-4">
        <div class="d-flex justify-content-between align-items-center mt-2">
            <h5 class="text-light fw-bold m-0" style="font-family: 'Outfit', sans-serif; letter-spacing: 0.5px;">TPST GRIYA BERSEMI</h5>
            <div class="profile">
                <a href="/profile">
                    <img src="{{ $user->picture ?? asset('images/profile3.png') }}" alt="profile"
                        style="width: 40px; height: 40px; border: 2px solid rgba(255,255,255,0.8);" class="rounded-circle shadow-sm">
                </a>
            </div>
        </div>
        
        <div class="row mt-4 mb-4">
            <div class="col text-start text-light">
                <p class="font-sm m-0 opacity-75" style="font-size: 13px !important;">Selamat Datang,</p>
                <h3 class="fw-bold text-white m-0" style="font-family: 'Outfit', sans-serif; letter-spacing: 0.5px; font-size: 22px;">{{ $user->username }}</h3>
            </div>
        </div>
    </div>
</header>

<main id="dashboard-page" class="main-container" style="background: transparent; padding-bottom: 85px;">
    <div class="container px-4">
        <div style="height: 24px;"></div>
        <!-- Floating Stats Card -->
        <div class="card rounded-4 border-0 shadow-sm mb-4" style="background: white;">
            <div class="card-body py-3 px-2">
                <div class="row text-center align-items-center g-0">
                    <div class="col">
                        <div class="d-flex flex-column align-items-center">
                            <div class="rounded-circle bg-success bg-opacity-10 p-2 mb-1" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-coin text-success" style="font-size: 1.2rem;"></i>
                            </div>
                            <span class="fw-bold text-dark font-outfit" style="font-size: 16px;">{{ $point->total_points ?? 0 }}</span>
                            <span class="text-muted font-sm" style="font-size: 11px !important;">Poin</span>
                        </div>
                    </div>
                    <div class="col border-start border-end">
                        <div class="d-flex flex-column align-items-center">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-2 mb-1" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-wallet2 text-primary" style="font-size: 1.2rem;"></i>
                            </div>
                            <span class="fw-bold text-dark font-outfit" style="font-size: 16px;">Rp {{ number_format($transactions->sum('total_income'), 0, ',', '.') }}</span>
                            <span class="text-muted font-sm" style="font-size: 11px !important;">Hasil Penjualan</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-column align-items-center">
                            <div class="rounded-circle bg-warning bg-opacity-10 p-2 mb-1" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-gift text-warning" style="font-size: 1.2rem;"></i>
                            </div>
                            <span class="fw-bold text-dark font-outfit" style="font-size: 16px;">{{ $tukar_poin ?? 0 }}</span>
                            <span class="text-muted font-sm" style="font-size: 11px !important;">Klaim Hadiah</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Card for Tukar Poin -->
        <div class="card rounded-4 border-0 shadow-sm overflow-hidden mb-4" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
            <div class="card-body p-3 text-light">
                <div class="row align-items-center">
                    <div class="col-7 text-start">
                        <span class="badge bg-white text-success fw-bold mb-2" style="font-size: 10px; padding: 4px 8px; border-radius: 6px;">TUKAR POIN</span>
                        <h5 class="fw-bold mb-1 font-outfit text-white" style="font-size: 16px;">Tukarkan Poinmu!</h5>
                        <p class="font-sm mb-3 opacity-90" style="font-size: 11px !important; line-height: 1.4;">Dapatkan Kaos, Sembako, atau Produk UMKM menarik.</p>
                        <a href="/tukar-poin" class="btn btn-light text-success btn-sm rounded-pill fw-bold px-3 py-1 shadow-sm" style="font-size: 11px !important;">
                            Tukar Sekarang <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-5">
                        <!-- Product Slideshow -->
                        <div id="rewardsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-touch="true">
                            <div class="carousel-inner">
                                @forelse($rewards as $index => $reward)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <div class="rounded-3 shadow-sm mb-2 overflow-hidden" style="width: 80px; height: 80px; background: #fff;">
                                            <img src="{{ $reward->image ? asset($reward->image) : asset('images/icons/gift-light.png') }}" class="w-100 h-100" style="object-fit: cover; display: block;" alt="{{ $reward->name }}">
                                        </div>
                                        <span class="d-block text-truncate fw-bold text-white mb-1" style="max-width: 100px; font-size: 11px !important;">{{ $reward->name }}</span>
                                        <span class="badge bg-warning text-dark fw-bold" style="font-size: 9px !important; padding: 2px 6px;">{{ $reward->price }} Poin</span>
                                    </div>
                                </div>
                                @empty
                                <div class="carousel-item active">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <div class="bg-white p-2 rounded-3 shadow-sm mb-2" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-gift text-success" style="font-size: 2rem;"></i>
                                        </div>
                                        <span class="d-block text-truncate fw-bold text-white mb-1" style="max-width: 100px; font-size: 11px !important;">Hadiah Menarik</span>
                                        <span class="badge bg-warning text-dark fw-bold" style="font-size: 9px !important; padding: 2px 6px;">Tukar Poin</span>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promo & Event (Square Banners) -->
        @if(isset($squareBanners) && count($squareBanners) > 0)
        <section class="mb-4">
            <h6 class="fw-bold font-outfit mb-3 text-dark" style="font-size: 15px;">Promo & Informasi Spesial</h6>
            <div class="row g-2">
                @foreach($squareBanners as $banner)
                <div class="col-6">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden card-hover h-100" style="background: white;">
                        <a href="{{ $banner->link ?? '#' }}" class="text-decoration-none text-dark">
                            <img src="{{ asset($banner->image) }}" class="w-100" style="aspect-ratio: 1/1; object-fit: cover;" alt="{{ $banner->title }}">
                            <div class="p-2 text-center">
                                <span class="fw-bold font-outfit text-truncate d-block" style="font-size: 11px; max-width: 100%;">{{ $banner->title }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- Transaction Section -->
        <section class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold font-outfit m-0 text-dark" style="font-size: 15px;">Riwayat Setoran</h6>
                <a class="text-success fw-bold font-sm text-decoration-none" href="/history/transaction" style="font-size: 13px !important;">
                    Lihat Semua <i class="bi bi-chevron-right" style="font-size: 9px;"></i>
                </a>
            </div>
            
            @if (isset($transactions) && count($transactions) > 0)
                @foreach ($transactions as $transaction)
                <div class="card border-0 shadow-sm mb-2 rounded-4 card-hover" style="background: white;">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-8 text-start">
                                <div class="d-flex align-items-center mb-1">
                                    <span class="fw-bold text-dark font-outfit" style="font-size: 13px;">Setoran Sampah</span>
                                    <span class="badge bg-success bg-opacity-10 text-success fw-bold ms-2" style="font-size: 10px; padding: 3px 8px;">
                                        +{{ $transaction->point_received }} Pts
                                    </span>
                                </div>
                                <p class="mb-1 text-muted" style="font-size: 12px;">
                                    Total Berat: <span class="fw-bold text-dark">{{ $transaction->total_weight }} Kg</span>
                                </p>
                                <p class="mb-0 text-muted" style="font-size: 10px;">
                                    <i class="bi bi-clock me-1"></i>{{ \Carbon\Carbon::parse($transaction->created_at)->locale('id')->diffForHumans() }}
                                </p>
                            </div>
                            <div class="col-4 text-end">
                                <span class="font-sm text-muted d-block" style="font-size: 10px !important;">Pendapatan</span>
                                <span class="fw-bold text-success font-outfit" style="font-size: 13px;">
                                    Rp {{ number_format($transaction->total_income, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="card border-0 shadow-sm rounded-4 text-center py-4 px-3" style="background: white;">
                    <i class="bi bi-journal-x text-muted mb-2" style="font-size: 2rem;"></i>
                    <p class="mb-0 text-muted font-sm">Belum ada transaksi setoran sampah.</p>
                </div>
            @endif
        </section>
    </div>

    {{-- NAVIGATION MENU --}}
    <div class="navigation-menu py-1">
        <div class="container d-flex justify-content-evenly">
            <div>
                <a class="btn btn-lg border-0 px-1 py-auto" href="/dashboard">
                    <i class="bi bi-house-fill" style="font-size: 1.4rem; color: var(--primary-color);"></i>
                    <p class="fw-bold font-sm p-0 m-0" style="color: var(--primary-color); font-size: 11px !important;">Beranda</p>
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
</main>
@endsection
