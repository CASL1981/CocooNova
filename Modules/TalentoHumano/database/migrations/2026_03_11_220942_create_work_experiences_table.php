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
        Schema::create('humantalent_work_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('humantalent_employees')->cascadeOnDelete()->comment('Id del empleado al que pertenece la experiencia laboral');
            $table->string('company', 200)->comment('Nombre de la empresa donde laboró el empleado');
            $table->enum('nature', ['Privada', 'Publica', 'Mixta'])->comment('Naturaleza del cargo');
            $table->string('position', 150)->comment('Puesto que ocupó el empleado');
            $table->string('immediate_supervisor', 150)->nullable()->comment('nombre del jefe inmediato');
            $table->date('start_date')->comment('Fecha de inicio de la experiencia laboral');
            $table->date('end_date')->nullable()->comment('Fecha de finalización de la experiencia laboral');
            $table->string('time_service', 50)->nullable()->comment('Tiempo de servicio en meses o años');
            $table->string('city', 100)->nullable()->comment('Ciudad donde laboró el empleado');
            $table->string('phone', 10)->nullable()->comment('Número de teléfono de la empresa');
            $table->string('contract_type', 100)->nullable()->comment('Tipo de contrato');
            $table->decimal('salary', 12, 2)->nullable()->comment('Salario del empleado');
            $table->text('main_duties')->nullable()->comment('Principales responsabilidades en el cargo');
            $table->text('reason_for_leaving')->nullable()->comment('Motivo de salida');

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
        Schema::dropIfExists('work_experiences');
    }
};
