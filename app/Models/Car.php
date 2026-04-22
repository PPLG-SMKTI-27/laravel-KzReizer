<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'brand',
        'model',
        'condition',
        'transmission',
        'fuel_type',
        'mileage',
        'color',
        'year',
        'price',
        'stock',
        'is_featured',
        'status',
        'description',
        'image',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'year' => 'integer',
        'price' => 'decimal:2',
        'mileage' => 'integer',
        'stock' => 'integer',
        'is_featured' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Car $car): void {
            if (blank($car->slug)) {
                $car->slug = Str::slug($car->brand.' '.$car->model.' '.$car->year.' '.$car->name);
            }
        });
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getPriceLabelAttribute(): string
    {
        return '$'.number_format((float) $this->price, 0, ',', '.');
    }
}
