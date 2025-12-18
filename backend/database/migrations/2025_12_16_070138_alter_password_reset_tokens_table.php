<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('password_reset_tokens');

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('identifier'); // email или phone
            $table->enum('type', ['email', 'phone']);   // тип восстановления
            $table->string('token');   // хэш 4-значного кода
            $table->unsignedSmallInteger('attempts')->default(0);   // сколько раз пытались подтвердить код
            $table->timestamp('last_sent_at')->nullable(); // когда последний раз отправляли
            $table->timestamp('created_at')->nullable();   // когда был создан
            $table->unique(['identifier', 'type']);   // активный код и тип
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
