<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('package_schedule_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('participant_count');

            $table->decimal('package_price', 15, 2);

            $table->integer('discount_percentage')
                ->default(0);

            $table->decimal('total_price', 15, 2);

            $table->dateTime('booking_date');

            $table->dateTime('payment_date')
                ->nullable();

            $table->enum('status', [
                'pending_payment',
                'paid',
                'completed',
                'cancelled',
            ])->default('pending_payment');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};