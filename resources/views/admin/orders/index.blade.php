@extends('layouts.dashboard')

@section('content')
<div class="admin-container">
    <div class="flex justify-between items-center mb-8">
        <h2 class="admin-title">Order Pembelian Masuk</h2>
        <a class="btn btn-create" href="{{ route('shop.index') }}">Lihat Shop</a>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Mobil</th>
                <th>Customer</th>
                <th>Penawaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->order_code }}</td>
                    <td>{{ $order->car->name ?? '-' }}</td>
                    <td>
                        {{ $order->customer_name }}
                        <div class="text-muted">{{ $order->customer_phone }}</div>
                    </td>
                    <td>${{ number_format($order->offer_price, 0) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>
                        <a class="btn btn-edit" href="{{ route('admin.orders.show', $order) }}">Detail</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center py-8">Belum ada order.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">{{ $orders->links() }}</div>
</div>
@endsection
