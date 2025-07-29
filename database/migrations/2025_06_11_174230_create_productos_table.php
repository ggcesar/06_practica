<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->longText('marca');
            $table->longText('modelo');
            $table->longText('descripcion')->nullable();
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2);
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->longText('imagen');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
