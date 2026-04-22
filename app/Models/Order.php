<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'order_code',
        'customer_name',
        'customer_email',
        'customer_phone',
        'city',
        'payment_method',
        'notes',
        'offer_price',
        'status',
        'ordered_at',
    ];

    protected $casts = [
        'offer_price' => 'decimal:2',
        'ordered_at' => 'datetime',
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
