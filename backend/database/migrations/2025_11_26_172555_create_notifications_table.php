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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('order_id')->constrained('orders');
            $table->enum('type', ['status_update', 'document_ready', 'admin_message']);
            // TODO: докопаться до аналитиков с вопросом насчет конкретики по enum: почему там есть это шикарное "и т.п."?
            // дело в том, что enum либо обновлять через alter, либо сносить полностью и переопределять. поэтому нужно конкретнее знать все enum, хотя бы подавляющее кол-во
            $table->dateTime('created_at')->nullable()->default(Carbon\Carbon::now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
