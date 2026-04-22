@extends('layouts.dashboard')

@section('content')
<div class="admin-container">
    <div class="flex justify-between items-center mb-8">
        <h2 class="admin-title">Detail Mobil</h2>
        <div>
            <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-edit">Edit</a>
            <a href="{{ route('admin.cars.index') }}" class="btn btn-create">Kembali</a>
        </div>
    </div>

    <div class="form-card">
        <h3>{{ $car->name }}</h3>
        <p class="text-secondary">{{ $car->brand }} {{ $car->model }} - {{ $car->year }}</p>
        <p class="text-gold">{{ $car->price_label }}</p>
        <p class="mt-2">{{ $car->description ?: 'Deskripsi belum tersedia.' }}</p>

        <div class="stats mt-6">
            <div class="card"><h3>Kondisi</h3><p>{{ ucfirst($car->condition) }}</p></div>
            <div class="card"><h3>Transmisi</h3><p>{{ ucfirst($car->transmission) }}</p></div>
            <div class="card"><h3>Bahan Bakar</h3><p>{{ ucfirst($car->fuel_type) }}</p></div>
            <div class="card"><h3>Stok</h3><p>{{ $car->stock }}</p></div>
        </div>
    </div>
</div>
@endsection
