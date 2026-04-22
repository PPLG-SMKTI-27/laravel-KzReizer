@extends('layouts.luxauto')

@section('title', 'LuxAuto - Premium Luxury Car Dealer')

@section('content')
<!-- Hero -->
<section class="lux-hero">
    <div class="hero-overlay"></div>
    <img src="{{ asset('images/luxauto.jpeg') }}" alt="LuxAuto" class="hero-bg">
    <div class="hero-content">
        <h1>Lux<span>Auto</span></h1>
        <p>Premium Luxury Car Dealer</p>
        <div class="hero-buttons">
            <a href="/shop" class="btn-primary">Browse Inventory</a>
            <a href="#about" class="btn-secondary">Learn More</a>
        </div>
    </div>
</section>

<!-- Featured Cars -->
<section class="featured">
    <div class="container">
        <h2 class="section-title">Featured Cars</h2>
        <div class="featured-grid">
            @php $featured = App\Models\Car::latest()->limit(3)->get(); @endphp
            @forelse($featured as $car)
            <div class="featured-card">
                <img src="{{ $car->image ? Storage::url($car->image) : asset('images/no-car.jpg') }}" alt="{{ $car->name }}">
                <div class="card-info">
                    <h3>{{ $car->name }}</h3>
                    <div>${{ number_format($car->price, 0) }}</div>
                    <a href="{{ route('cars.show', $car) }}" class="btn-small">View Details</a>
                </div>
            </div>
            @empty
            <p>No featured cars</p>
            @endforelse
        </div>
    </div>
</section>

<!-- Stats -->
<section class="stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat">
                <div class="stat-number">{{ App\Models\Car::count() }}</div>
                <div class="stat-label">Cars Available</div>
            </div>
            <div class="stat">
                <div class="stat-number">50+</div>
                <div class="stat-label">Happy Customers</div>
            </div>
            <div class="stat">
                <div class="stat-number">10+</div>
                <div class="stat-label">Years Experience</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container">
        <h2>Ready to find your dream car?</h2>
        <a href="/shop" class="btn-large">Start Shopping</a>
    </div>
</section>
@endsection
