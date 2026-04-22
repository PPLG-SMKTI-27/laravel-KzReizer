@extends('layouts.luxauto')

@section('title', 'LuxAuto Dealer - Katalog Mobil')

@section('content')
<section class="shop-hero">
    <div class="shop-hero-content">
        <p class="eyebrow">Dealer Dashboard Ready</p>
        <h1>Platform Dealer Mobil End-to-End</h1>
        <p>Kelola stok mobil, terima order pembelian, dan pantau performa penjualan dari satu sistem.</p>
    </div>
    <div class="shop-metrics">
        <article>
            <h3>{{ $summary['total'] }}</h3>
            <p>Total Unit</p>
        </article>
        <article>
            <h3>{{ $summary['available'] }}</h3>
            <p>Ready Stock</p>
        </article>
        <article>
            <h3>{{ $summary['featured'] }}</h3>
            <p>Featured Unit</p>
        </article>
    </div>
</section>

<section class="filter-section">
    <form method="GET" action="{{ route('shop.index') }}" class="filter-grid">
        <input type="text" name="search" placeholder="Cari merek/model..." value="{{ $filters['search'] ?? '' }}">

        <select name="brand">
            <option value="">Semua Brand</option>
            @foreach($brands as $brand)
                <option value="{{ $brand }}" @selected(($filters['brand'] ?? '') === $brand)>{{ $brand }}</option>
            @endforeach
        </select>

        <select name="condition">
            <option value="">Semua Kondisi</option>
            <option value="new" @selected(($filters['condition'] ?? '') === 'new')>Baru</option>
            <option value="used" @selected(($filters['condition'] ?? '') === 'used')>Bekas</option>
        </select>

        <select name="transmission">
            <option value="">Transmisi</option>
            <option value="automatic" @selected(($filters['transmission'] ?? '') === 'automatic')>Automatic</option>
            <option value="manual" @selected(($filters['transmission'] ?? '') === 'manual')>Manual</option>
        </select>

        <input type="number" name="min_price" placeholder="Harga min" value="{{ $filters['min_price'] ?? '' }}">
        <input type="number" name="max_price" placeholder="Harga max" value="{{ $filters['max_price'] ?? '' }}">

        <div class="filter-actions">
            <button type="submit" class="btn-solid">Filter</button>
            <a class="btn-ghost" href="{{ route('shop.index') }}">Reset</a>
        </div>
    </form>
</section>

<section class="catalog-grid">
    @forelse($cars as $car)
        <article class="catalog-card">
            <div class="catalog-image">
                @if($car->image)
                    <img src="{{ Storage::url($car->image) }}" alt="{{ $car->name }}" loading="lazy">
                @else
                    <div class="placeholder-image">No Image</div>
                @endif
                <span class="badge">{{ strtoupper($car->status) }}</span>
            </div>
            <div class="catalog-body">
                <h3>{{ $car->name }}</h3>
                <p class="specs">{{ $car->brand }} • {{ $car->model }} • {{ $car->year }}</p>
                <p class="specs">{{ ucfirst($car->condition) }} • {{ ucfirst($car->transmission) }} • {{ ucfirst($car->fuel_type) }}</p>
                <p class="stock">Stok: {{ $car->stock }}</p>
                <div class="card-footer">
                    <strong>{{ $car->price_label }}</strong>
                    <a href="{{ route('cars.show', $car) }}" class="btn-solid">Lihat Detail</a>
                </div>
            </div>
        </article>
    @empty
        <div class="empty-catalog">
            <h3>Tidak ada mobil sesuai filter</h3>
            <p>Coba ubah filter atau reset pencarian.</p>
        </div>
    @endforelse
</section>

<div class="pagination-wrap">
    {{ $cars->links() }}
</div>

<section class="feature-strip">
    <article>
        <h4>Transaksi Terekam</h4>
        <p>Semua pembelian masuk ke dashboard order admin.</p>
    </article>
    <article>
        <h4>Manajemen Stok</h4>
        <p>Stok berkurang otomatis saat order dibuat.</p>
    </article>
    <article>
        <h4>Siap Industri</h4>
        <p>Struktur data dan alur bisa diperluas untuk pembayaran gateway.</p>
    </article>
</section>
@endsection

