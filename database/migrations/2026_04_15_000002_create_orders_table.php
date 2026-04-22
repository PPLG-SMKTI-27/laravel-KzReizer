<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('order_code')->unique();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone', 40);
            $table->string('city', 100);
            $table->enum('payment_method', ['cash', 'credit', 'lease']);
            $table->text('notes')->nullable();
            $table->decimal('offer_price', 12, 2);
            $table->enum('status', ['new', 'contacted', 'processing', 'completed', 'cancelled'])->default('new');
            $table->timestamp('ordered_at');
            $table->timestamps();

            $table->index(['status', 'ordered_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
