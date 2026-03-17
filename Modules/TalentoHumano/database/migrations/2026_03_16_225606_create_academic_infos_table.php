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
        Schema::create('humantalent_academic_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('humantalent_employees')->cascadeOnDelete()->comment('Id del empleado al que pertenece la información académica');
            $table->string('academic_modality', 150)->nullable()->comment('Modalidad académica del título obtenido');
            $table->boolean('graduate')->default(false)->comment('Indica si el empleado es graduado');
            $table->string('degree_obtained', 200)->nullable()->comment('Título obtenido');
            $table->string('educational_institution', 200)->nullable()->comment('Institución educativa');
            $table->string('duration', 50)->nullable()->comment('Duración del programa');
            $table->date('completion_date')->nullable()->comment('Fecha de finalización');
            $table->string('professional_license', 50)->nullable();
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
        Schema::dropIfExists('humantalent_academic_infos');
    }
};
