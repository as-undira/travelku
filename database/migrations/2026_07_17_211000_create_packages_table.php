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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('destination');

            $table->integer('duration_days');

            $table->decimal('price', 15, 2);

            $table->integer('distance_km');

            $table->string('thumbnail')
                ->nullable();

            $table->text('description');

            $table->text('facilities');

            $table->text('itinerary');

            $table->enum('status', [
                'available',
                'full',
                'finished',
            ])->default('available');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};