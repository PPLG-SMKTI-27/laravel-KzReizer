<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarController extends Controller
{
    public function index(Request $request): View
    {
        $query = Car::query()
            ->when($request->filled('search'), function ($builder) use ($request) {
                $term = $request->string('search')->toString();
                $builder->where(function ($inner) use ($term) {
                    $inner->where('name', 'like', "%{$term}%")
                        ->orWhere('brand', 'like', "%{$term}%")
                        ->orWhere('model', 'like', "%{$term}%");
                });
            })
            ->when($request->filled('brand'), fn ($builder) => $builder->where('brand', $request->string('brand')->toString()))
            ->when($request->filled('condition'), fn ($builder) => $builder->where('condition', $request->string('condition')->toString()))
            ->when($request->filled('transmission'), fn ($builder) => $builder->where('transmission', $request->string('transmission')->toString()))
            ->when($request->filled('min_price'), fn ($builder) => $builder->where('price', '>=', (float) $request->min_price))
            ->when($request->filled('max_price'), fn ($builder) => $builder->where('price', '<=', (float) $request->max_price))
            ->orderByDesc('is_featured')
            ->latest();

        $cars = $query->paginate(9)->withQueryString();

        return view('shop', [
            'cars' => $cars,
            'brands' => Car::query()->select('brand')->distinct()->orderBy('brand')->pluck('brand'),
            'summary' => [
                'total' => Car::count(),
                'available' => Car::where('status', 'available')->count(),
                'featured' => Car::where('is_featured', true)->count(),
            ],
            'filters' => $request->only(['search', 'brand', 'condition', 'transmission', 'min_price', 'max_price']),
        ]);
    }

    public function show(Car $car): View
    {
        $relatedCars = Car::query()
            ->where('id', '!=', $car->id)
            ->where(function ($query) use ($car) {
                $query->where('brand', $car->brand)
                    ->orWhere('condition', $car->condition);
            })
            ->latest()
            ->take(3)
            ->get();

        return view('cars.show', compact('car', 'relatedCars'));
    }

    public function purchase(Request $request, Car $car): RedirectResponse
    {
        if ($car->status === 'sold' || $car->stock < 1) {
            return back()->with('error', 'Maaf, mobil ini sudah tidak tersedia.');
        }

        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:120'],
            'customer_email' => ['required', 'email', 'max:150'],
            'customer_phone' => ['required', 'string', 'max:40'],
            'city' => ['required', 'string', 'max:100'],
            'payment_method' => ['required', 'in:cash,credit,lease'],
            'offer_price' => ['required', 'numeric', 'min:0'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        $order = Order::create([
            'car_id' => $car->id,
            'user_id' => auth()->id(),
            'order_code' => 'LUX-'.now()->format('Ymd').'-'.strtoupper(str()->random(6)),
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'city' => $validated['city'],
            'payment_method' => $validated['payment_method'],
            'offer_price' => $validated['offer_price'],
            'notes' => $validated['notes'] ?? null,
            'ordered_at' => now(),
            'status' => 'new',
        ]);

        $car->decrement('stock');
        if ($car->fresh()->stock < 1) {
            $car->update(['status' => 'reserved']);
        }

        return redirect()
            ->route('shop.index')
            ->with('success', 'Permintaan pembelian berhasil dikirim. Kode order: '.$order->order_code);
    }
}

