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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->enum('status', ['pending', 'confirmed', 'in_progress', 'completed', 'cancelled'], 50)->default('pending');
            $table->timestamps();
            $table->dateTime('cremation_date')->nullable();
            $table->text('urn_delivery_place');
            $table->text('cancellation_reason')->nullable();

            $table->dateTime('confirmed_at')->nullable(); // >= creation_date
            $table->dateTime('in_progress_at')->nullable(); // >= confirmed_at
            $table->dateTime('completed_at')->nullable(); // >= in_progress_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
