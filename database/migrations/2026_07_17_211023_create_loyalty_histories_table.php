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
        Schema::create('loyalty_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('previous_tier', [
                'bronze',
                'silver',
                'gold',
                'platinum',
            ]);

            $table->enum('new_tier', [
                'bronze',
                'silver',
                'gold',
                'platinum',
            ]);

            $table->integer('total_distance');

            $table->integer('reward_percentage');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loyalty_histories');
    }
};