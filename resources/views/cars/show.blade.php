@extends('layouts.luxauto')

@section('title', $car->name . ' - Detail Mobil')

@section('content')
<a href="{{ route('shop.index') }}" class="back-link"><- Kembali ke Katalog</a>

<section class="detail-grid">
    <div class="detail-media">
        <div class="detail-image">
            @if($car->image)
                <img src="{{ Storage::url($car->image) }}" alt="{{ $car->name }}" class="main-img">
            @else
                <div class="no-image-large">No Image Available</div>
            @endif
        </div>
        <div class="spec-grid">
            <p><span>Brand</span>{{ $car->brand }}</p>
            <p><span>Model</span>{{ $car->model }}</p>
            <p><span>Year</span>{{ $car->year }}</p>
            <p><span>Condition</span>{{ ucfirst($car->condition) }}</p>
            <p><span>Transmisi</span>{{ ucfirst($car->transmission) }}</p>
            <p><span>Bahan Bakar</span>{{ ucfirst($car->fuel_type) }}</p>
            <p><span>Kilometer</span>{{ number_format($car->mileage) }} km</p>
            <p><span>Warna</span>{{ $car->color ?: '-' }}</p>
            <p><span>Status</span>{{ ucfirst($car->status) }}</p>
            <p><span>Stok</span>{{ $car->stock }}</p>
        </div>
    </div>

    <div class="detail-panel">
        <h1>{{ $car->name }}</h1>
        <p class="price">{{ $car->price_label }}</p>
        <p class="description">{!! nl2br(e($car->description ?: 'Deskripsi belum tersedia.')) !!}</p>

        <form method="POST" action="{{ route('cars.purchase', $car) }}" class="purchase-form">
            @csrf
            <h3>Form Pembelian</h3>
            <label>Nama Lengkap
                <input type="text" name="customer_name" value="{{ old('customer_name', auth()->user()->name ?? '') }}" required>
            </label>
            <label>Email
                <input type="email" name="customer_email" value="{{ old('customer_email', auth()->user()->email ?? '') }}" required>
            </label>
            <label>No. HP
                <input type="text" name="customer_phone" value="{{ old('customer_phone') }}" required>
            </label>
            <label>Kota
                <input type="text" name="city" value="{{ old('city') }}" required>
            </label>
            <label>Metode Pembayaran
                <select name="payment_method" required>
                    <option value="cash" @selected(old('payment_method') === 'cash')>Cash</option>
                    <option value="credit" @selected(old('payment_method') === 'credit')>Credit</option>
                    <option value="lease" @selected(old('payment_method') === 'lease')>Lease</option>
                </select>
            </label>
            <label>Penawaran Harga (opsional bisa sama)
                <input type="number" name="offer_price" value="{{ old('offer_price', $car->price) }}" min="0" step="0.01" required>
            </label>
            <label>Catatan
                <textarea name="notes" rows="3">{{ old('notes') }}</textarea>
            </label>
            <button class="btn-solid" type="submit" @disabled($car->stock < 1 || $car->status === 'sold')>
                {{ $car->stock < 1 || $car->status === 'sold' ? 'Stok Habis' : 'Beli Sekarang' }}
            </button>
            @if($errors->any())
                <ul class="form-errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>
    </div>
</section>

@if($relatedCars->isNotEmpty())
<section class="related-section">
    <h2>Unit Serupa</h2>
    <div class="related-grid">
        @foreach($relatedCars as $related)
            <article>
                <h4>{{ $related->name }}</h4>
                <p>{{ $related->brand }} - {{ $related->year }}</p>
                <p>{{ $related->price_label }}</p>
                <a href="{{ route('cars.show', $related) }}">Lihat Unit</a>
            </article>
        @endforeach
    </div>
</section>
@endif
@endsection
