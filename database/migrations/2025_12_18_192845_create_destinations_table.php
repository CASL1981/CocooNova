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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('costcenter', 10)->comment('codigo del centro de costos');
            $table->string('name', 192)->comment('nombre del centro de costo');
            $table->string('address', 254)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('location', 20)->nullable()->comment('ubicacion del centro de costo');
            $table->integer('minimun')->nullable()->comment('campo para validar posibles limites minmo');
            $table->integer('maximun')->nullable()->comment('campo para validar posibles limites maximo');
            $table->boolean('status')->default(true)->comment('estado del centro de costo');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
