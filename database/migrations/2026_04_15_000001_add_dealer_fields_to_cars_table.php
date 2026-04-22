<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
            $table->enum('condition', ['new', 'used'])->default('new')->after('model');
            $table->string('transmission', 30)->default('automatic')->after('condition');
            $table->string('fuel_type', 30)->default('petrol')->after('transmission');
            $table->unsignedInteger('mileage')->default(0)->after('fuel_type');
            $table->string('color', 50)->nullable()->after('mileage');
            $table->unsignedInteger('stock')->default(1)->after('price');
            $table->boolean('is_featured')->default(false)->after('stock');
            $table->enum('status', ['available', 'reserved', 'sold'])->default('available')->after('is_featured');

            $table->index(['brand', 'status']);
            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropIndex(['brand', 'status']);
            $table->dropIndex(['slug']);
            $table->dropColumn([
                'slug',
                'condition',
                'transmission',
                'fuel_type',
                'mileage',
                'color',
                'stock',
                'is_featured',
                'status',
            ]);
        });
    }
};
