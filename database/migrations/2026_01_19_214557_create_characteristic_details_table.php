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
        Schema::create('characteristic_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('characteristic_id')->constrained()->onDelete('cascade');
            $table->string('name', 100);
            $table->string('abbreviation', 100)->nullable();
            $table->string('code', 100)->nullable();
            $table->decimal('value', 10, 2)->nullable();
            $table->decimal('percentage', 5, 2)->nullable();
            $table->integer('max')->nullable()->comment('Valor máximo permitido');
            $table->integer('min')->nullable()->comment('Valor mínimo permitido');
            $table->integer('stock')->nullable()->comment('Cantidad en inventario');
            $table->boolean('status')->default(true)->comment('estado del detalle de la característica: activo/inactivo');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characteristic_details');
    }
};
