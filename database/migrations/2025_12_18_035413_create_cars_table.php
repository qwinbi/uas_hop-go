<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->integer('year');
            $table->string('color');
            $table->string('plate_number')->unique();
            $table->decimal('price_per_day', 10, 2);
            $table->integer('seats');
            $table->string('transmission');
            $table->string('fuel_type');
            $table->text('description');
            $table->json('features')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};