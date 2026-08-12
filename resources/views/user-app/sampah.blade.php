@extends('layout.main')
@section('title', 'Kategori Sampah | TPST GBC')

@section('content')
<header class="gradient-brand-toRight mx-auto rounded-bottom" style="max-width: 428px; width: 100%">
    {{-- Nav Header --}}
    <div class="container text-center px-4 py-4">
        <div class="row">
            <div class="col py-4 text-center text-light">
                <h4 class="mb-0 fw-bold" style="letter-spacing: 1px;">
                    KATEGORI PEMILAHAN <br>
                    SAMPAH
                </h4>
            </div>
        </div>
    </div>
</header>
<main style="min-height: calc(100vh - 150px);" class="main-container">
    <div class="container pt-4 pb-5 mb-5">
        <div class="row mx-auto mt-3">
            @foreach ($sampahByCategory as $categoryId => $sampah)
            <h5 class="fw-bold mb-3">
                {{ $categoryId }}
            </h5>
            @forelse ($sampah as $item)
            <div class="col-6 mb-3">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden h-100" style="background: white;">
                    <img style="height: 120px; object-fit: cover; display: block;" src="{{ $item->image }}" class="w-100" alt="{{ $item->name }}">
                    <div class="card-body p-2 text-center">
                        <h6 class="card-title my-0 fw-bold text-success font-outfit" style="font-size: 13px;">
                            Rp {{ number_format($item->price_per_kg, 0, ',', '.') }} /Kg
                        </h6>
                        <p class="card-text font-sm mt-1 text-muted mb-0" style="font-size: 11px !important; line-height: 1.3;">
                            {{ $item->name }}
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-6 mb-3">
                <div class="card border border-primary">
                    <div class="card-body text-center">
                        <h6 class="card-title my-0 fw-bold">
                            Belum ada data pada kategori ini.
                        </h6>
                    </div>
                </div>
            </div>
            @endforelse
            @endforeach
        </div>
    </div>
    {{-- NAVIGATION MENU --}}
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
                    <i class="bi bi-grid-fill" style="font-size: 1.4rem; color: var(--primary-color);"></i>
                    <p class="fw-bold font-sm p-0 m-0" style="color: var(--primary-color); font-size: 11px !important;">Kategori</p>
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
