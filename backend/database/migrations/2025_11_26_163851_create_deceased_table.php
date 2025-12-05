<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deceased', function (Blueprint $table) {
            $table->id();
//            $table->timestamps();
            $table->foreignId('order_id')->constrained('orders');
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('patronymic', 255)->nullable();
            $table->date('date_of_birth');
            $table->date('date_of_death');
            $table->text('cause_of_death')->nullable();
            $table->text('comment')->nullable();
            $table->dateTime('created_at')->default(\Carbon\Carbon::now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deceased');
    }
};
