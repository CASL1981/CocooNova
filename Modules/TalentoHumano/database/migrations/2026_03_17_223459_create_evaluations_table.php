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
        Schema::create('humantalent_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('humantalent_employees')->cascadeOnDelete()->comment('Id del empleado al que pertenece la evaluación');
            $table->enum('type', ['Anual', 'Periodica', 'Proceso'])->comment('Tipo de evaluación');
            $table->date('start_date')->comment('Fecha de inicio de la evaluación');
            $table->date('end_date')->comment('Fecha de finalización de la evaluación');
            $table->date('date')->comment('Fecha de la evaluación');
            $table->decimal('result', 3, 1)->comment('Resultado de la evaluación');
            $table->enum('interpretation', ['Critica', 'Aceptable', 'Satisfactorio'])->nullable()->comment('Interpretación del resultado');
            $table->unsignedBigInteger('created_by')->nullable()->comment('Id del usuario que creó el registro');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('Id del usuario que actualizó el registro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('humantalent_evaluations');
    }
};
