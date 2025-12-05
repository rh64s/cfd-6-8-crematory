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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->boolean('is_active')->default(true);
            $table->dateTime('created_at')->default(Carbon\Carbon::now());
            $table->dateTime('updated_at')->nullable();
        });
//        DB::statement('ALTER TABLE services ADD CONSTRAINT price > 0');
        //DB::statement('ALTER TABLE services ADD CONSTRAINT valid_price CHECK ( price >= 0 )');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE services DROP CONSTRAINT valid_price');
        Schema::dropIfExists('services');
    }
};
