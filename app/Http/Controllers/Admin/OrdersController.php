<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class OrdersController extends Controller
{
    public function index(Request $request): View
    {
        $orders = Order::query()
            ->with('car')
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->string('status')))
            ->latest('ordered_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        $order->load('car', 'user');
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(['new', 'contacted', 'processing', 'completed', 'cancelled'])],
        ]);

        $order->update($validated);

        if ($validated['status'] === 'completed' && $order->car && $order->car->status !== 'sold') {
            $order->car->update(['status' => 'sold']);
        }

        return back()->with('success', 'Status order berhasil diperbarui.');
    }
}
