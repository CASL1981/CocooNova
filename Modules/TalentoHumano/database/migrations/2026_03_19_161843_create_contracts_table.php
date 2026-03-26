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
        Schema::create('humantalent_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('humantalent_employees')->cascadeOnDelete()->comment('Id del empleado al que pertenece la evaluación');
            $table->string('identification', 10)->comment('Número de identificación del contrato');
            $table->string('full_name', 150)->comment('Nombre completo del empleado');
            $table->date('hiring_date')->comment('Fecha de contratación');
            $table->date('termination_date')->nullable()->comment('Fecha de terminación del contrato');
            $table->string('format', 100)->nullable()->comment('Formato del contrato');
            $table->string('observations', 200)->nullable()->comment('Observaciones sobre el contrato');
            $table->string('city', 100)->nullable()->comment('Ciudad donde desempeña el contrato');
            $table->string('type', 50)->nullable()->comment('Tipo de contrato');
            $table->string('probationary_period', 100)->nullable()->comment('Período de prueba en meses');
            $table->decimal('salary', 10, 2)->nullable()->comment('Salario del contrato');
            $table->string('work_schedule', 100)->nullable()->comment('Horario de trabajo del contrato');
            $table->string('reason_leaving', 200)->nullable()->comment('Motivo de terminación del contrato');
            $table->string('destination', 200)->nullable()->comment('Centro de costos o destino del contrato');
            $table->boolean('status')->default(true)->comment('Estado del contrato');
            $table->integer('period')->comment('Período del contrato');
            $table->integer('year')->comment('Año del contrato');
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
        Schema::dropIfExists('humantalent_contracts');
    }
};
