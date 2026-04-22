@php
    $editing = isset($car) && $car;
@endphp

<label>Nama Mobil</label>
<input type="text" name="name" value="{{ old('name', $editing ? $car->name : '') }}" required>

<label>Brand</label>
<input type="text" name="brand" value="{{ old('brand', $editing ? $car->brand : '') }}" required>

<label>Model</label>
<input type="text" name="model" value="{{ old('model', $editing ? $car->model : '') }}" required>

<div class="grid-2">
    <div>
        <label>Tahun</label>
        <input type="number" name="year" min="1886" max="{{ date('Y') + 1 }}" value="{{ old('year', $editing ? $car->year : date('Y')) }}" required>
    </div>
    <div>
        <label>Harga</label>
        <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $editing ? $car->price : '') }}" required>
    </div>
</div>

<div class="grid-2">
    <div>
        <label>Kondisi</label>
        <select name="condition" required>
            <option value="new" @selected(old('condition', $editing ? $car->condition : 'new') === 'new')>Baru</option>
            <option value="used" @selected(old('condition', $editing ? $car->condition : 'new') === 'used')>Bekas</option>
        </select>
    </div>
    <div>
        <label>Status</label>
        <select name="status" required>
            <option value="available" @selected(old('status', $editing ? $car->status : 'available') === 'available')>Available</option>
            <option value="reserved" @selected(old('status', $editing ? $car->status : 'available') === 'reserved')>Reserved</option>
            <option value="sold" @selected(old('status', $editing ? $car->status : 'available') === 'sold')>Sold</option>
        </select>
    </div>
</div>

<div class="grid-2">
    <div>
        <label>Transmisi</label>
        <select name="transmission" required>
            <option value="automatic" @selected(old('transmission', $editing ? $car->transmission : 'automatic') === 'automatic')>Automatic</option>
            <option value="manual" @selected(old('transmission', $editing ? $car->transmission : 'automatic') === 'manual')>Manual</option>
        </select>
    </div>
    <div>
        <label>Bahan Bakar</label>
        <select name="fuel_type" required>
            <option value="petrol" @selected(old('fuel_type', $editing ? $car->fuel_type : 'petrol') === 'petrol')>Petrol</option>
            <option value="diesel" @selected(old('fuel_type', $editing ? $car->fuel_type : 'petrol') === 'diesel')>Diesel</option>
            <option value="hybrid" @selected(old('fuel_type', $editing ? $car->fuel_type : 'petrol') === 'hybrid')>Hybrid</option>
            <option value="electric" @selected(old('fuel_type', $editing ? $car->fuel_type : 'petrol') === 'electric')>Electric</option>
        </select>
    </div>
</div>

<div class="grid-2">
    <div>
        <label>Kilometer</label>
        <input type="number" name="mileage" min="0" value="{{ old('mileage', $editing ? $car->mileage : 0) }}" required>
    </div>
    <div>
        <label>Stok</label>
        <input type="number" name="stock" min="0" value="{{ old('stock', $editing ? $car->stock : 1) }}" required>
    </div>
</div>

<label>Warna</label>
<input type="text" name="color" value="{{ old('color', $editing ? $car->color : '') }}">

<label>Deskripsi</label>
<textarea name="description" rows="4">{{ old('description', $editing ? $car->description : '') }}</textarea>

<label>Gambar</label>
<input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/webp">
@if($editing && $car->image)
    <img src="{{ Storage::url($car->image) }}" alt="{{ $car->name }}">
@endif

<label class="inline">
    <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $editing ? $car->is_featured : false))>
    Jadikan Featured
</label>
