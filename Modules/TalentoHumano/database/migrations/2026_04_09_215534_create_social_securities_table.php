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
        Schema::create('humantalent_social_securities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->constrained('humantalent_contracts')->onDelete('cascade');
            $table->string('position', 100)->nullable()->comment('Cargo del empleado');
            $table->string('work_location', 100)->nullable()->comment('Ubicación de trabajo');
            $table->string('contract_type', 100)->nullable()->comment('Tipo de contrato');
            $table->decimal('salary', 10, 2)->nullable()->comment('Salario del contrato');
            $table->date('start_date')->nullable()->comment('Fecha de inicio del contrato');
            $table->date('end_date')->nullable()->comment('Fecha de fin del contrato');
            $table->boolean('status')->default(true)->comment('Estado de la seguridad social');
            $table->string('eps', 100)->nullable()->comment('Entidad de seguridad social');
            $table->string('afp', 100)->nullable()->comment('Administradora de fondos de pensiones');
            $table->string('risk', 100)->nullable()->comment('Nivel de riesgo');
            $table->string('work_shift', 100)->nullable()->comment('Turno de trabajo');
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
        Schema::dropIfExists('social_securities');
    }
};
