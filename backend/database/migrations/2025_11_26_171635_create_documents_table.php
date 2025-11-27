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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->enum('document_type', ['certificate', 'report', 'act', 'other']);
            $table->text('file_path');
            $table->string('encryption_key_ref', 255);
            $table->boolean('uploaded_by_admin')->default(false);
            $table->dateTime('created_at')->default(Carbon\Carbon::now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
