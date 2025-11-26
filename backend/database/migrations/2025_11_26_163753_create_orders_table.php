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
            $table->enum('status', ['pending', 'confirmed', 'in_progress', 'completed', 'cancelled'], 50)->nullable();
            $table->dateTime('creation_date')->default(Carbon\Carbon::now());
            $table->dateTime('updated_at'); // on update current_timestamp?
            $table->dateTime('cremation_date')->nullable();
            $table->text('urn_delivery_place');
            $table->text('cancellation_reason')->nullable();
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
