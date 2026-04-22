<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CarsController extends Controller
{
    public function index(): View
    {
        $cars = Car::query()->latest()->paginate(12);
        return view('admin.cars.index', compact('cars'));
    }

    public function create(): View
    {
        return view('admin.cars.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'condition' => ['required', Rule::in(['new', 'used'])],
            'transmission' => ['required', Rule::in(['automatic', 'manual'])],
            'fuel_type' => ['required', Rule::in(['petrol', 'diesel', 'hybrid', 'electric'])],
            'mileage' => 'required|integer|min:0',
            'color' => 'nullable|string|max:50',
            'year' => 'required|integer|min:1886|max:'.(date('Y')+1),
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'status' => ['required', Rule::in(['available', 'reserved', 'sold'])],
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('cars', 'public');
        }

        Car::create($data);

        return redirect()->route('admin.cars.index')->with('success', 'Mobil baru berhasil ditambahkan.');
    }

    public function show(Car $car): View
    {
        return view('admin.cars.show', compact('car'));
    }

    public function edit(Car $car): View
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'condition' => ['required', Rule::in(['new', 'used'])],
            'transmission' => ['required', Rule::in(['automatic', 'manual'])],
            'fuel_type' => ['required', Rule::in(['petrol', 'diesel', 'hybrid', 'electric'])],
            'mileage' => 'required|integer|min:0',
            'color' => 'nullable|string|max:50',
            'year' => 'required|integer|min:1886|max:'.(date('Y')+1),
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'status' => ['required', Rule::in(['available', 'reserved', 'sold'])],
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            $data['image'] = $request->file('image')->store('cars', 'public');
        }

        $car->update($data);

        return redirect()->route('admin.cars.index')->with('success', 'Data mobil berhasil diperbarui.');
    }

    public function destroy(Car $car): RedirectResponse
    {
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil dihapus.');
    }
}

