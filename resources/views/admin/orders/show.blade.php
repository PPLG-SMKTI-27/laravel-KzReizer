@extends('layouts.dashboard')

@section('content')
<div class="admin-container">
    <div class="flex justify-between items-center mb-8">
        <h2 class="admin-title">Detail Order {{ $order->order_code }}</h2>
        <a class="btn btn-create" href="{{ route('admin.orders.index') }}">Kembali</a>
    </div>

    <div class="form-card">
        <h3>{{ $order->car->name ?? '-' }}</h3>
        <p class="text-secondary">Customer: {{ $order->customer_name }} - {{ $order->customer_phone }}</p>
        <p class="text-secondary">Email: {{ $order->customer_email }} | Kota: {{ $order->city }}</p>
        <p class="text-gold">Penawaran: ${{ number_format($order->offer_price, 0) }}</p>
        <p class="mt-2">Metode Bayar: {{ strtoupper($order->payment_method) }}</p>
        <p>Catatan: {{ $order->notes ?: '-' }}</p>

        <form method="POST" action="{{ route('admin.orders.update', $order) }}" class="admin-form mt-6">
            @csrf
            @method('PUT')
            <label>Update Status</label>
            <select name="status" required>
                <option value="new" @selected($order->status === 'new')>New</option>
                <option value="contacted" @selected($order->status === 'contacted')>Contacted</option>
                <option value="processing" @selected($order->status === 'processing')>Processing</option>
                <option value="completed" @selected($order->status === 'completed')>Completed</option>
                <option value="cancelled" @selected($order->status === 'cancelled')>Cancelled</option>
            </select>
            <button type="submit" class="btn btn-create">Simpan Status</button>
        </form>
    </div>
</div>
@endsection
