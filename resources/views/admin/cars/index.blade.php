@extends('layouts.dashboard')

@section('content')
<div class="admin-container">
    <div class="flex justify-between items-center mb-8">
        <h2 class="admin-title">Inventori Mobil Dealer</h2>
        <a href="{{ route('admin.cars.create') }}" class="btn btn-create">+ Tambah Mobil</a>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Mobil</th>
                <th>Spesifikasi</th>
                <th>Harga/Stok</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cars as $car)
                <tr>
                    <td>
                        <strong>{{ $car->name }}</strong>
                        <div class="text-muted">{{ $car->brand }} {{ $car->model }} ({{ $car->year }})</div>
                    </td>
                    <td>
                        {{ ucfirst($car->condition) }} / {{ ucfirst($car->transmission) }} / {{ ucfirst($car->fuel_type) }}
                        <div class="text-muted">{{ number_format($car->mileage) }} km - {{ $car->color ?: '-' }}</div>
                    </td>
                    <td>
                        <strong>{{ $car->price_label }}</strong>
                        <div class="text-muted">Stok: {{ $car->stock }}</div>
                    </td>
                    <td>
                        <span>{{ ucfirst($car->status) }}</span>
                        @if($car->is_featured)
                            <div class="text-gold">Featured</div>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.cars.show', $car) }}" class="btn btn-edit">Detail</a>
                        <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" class="inline" onsubmit="return confirm('Hapus mobil ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-8">Belum ada data mobil.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">
        {{ $cars->links() }}
    </div>
</div>
@endsection
