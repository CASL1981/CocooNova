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
        Schema::create('humantalent_employees', function (Blueprint $table) {
            $table->id();
            // --- Identificación y Nombres ---
            $table->enum('type_document', ['CC', 'TI', 'CE', 'RC', 'PAS'])->comment('Tipo de documento de identidad');
            $table->string('identification', 10)->unique();
            $table->string('expedition_department', 100)->comment('Departamento de expedición del documento de identidad');
            $table->string('expedition_city', 100)->comment('Ciudad de expedición del documento de identidad');
            $table->string('first_name', 100)->comment('Nombres del empleado');
            $table->string('last_name', 100)->comment('Apellidos del empleado');
            // --- Ubicación y contacto ---
            $table->string('email', 100)->unique();
            $table->string('type_housing', 50)->comment('Tipo de vivienda'); ;
            $table->string('address', 250)->comment('Dirección de residencia');
            $table->tinyInteger('estrato')->default(1)->comment('Estrato socioeconomico');
            $table->string('cel_phone', 20)->comment('Número de celular principal');
            $table->string('cel_phone2', 20)->comment('Número de celular contacto de emergencia');
            $table->string('department', 100)->comment('Departamento de residencia');
            $table->string('city', 100)->comment('Ciudad de residencia');
            // --- Datos Demográficos ---
            $table->string('gender', 20)->comment('Género');
            $table->date('birth_date')->comment('Fecha de nacimiento');
            $table->string('department_birth', 100)->comment('Departamento de nacimiento');
            $table->string('city_birth', 100)->comment('Ciudad de nacimiento');
            $table->string('blood_type',10)->comment('Tipo de sangre');
            $table->string('marital_status', 20)->comment('Estado civil');
            $table->tinyInteger('number_children')->default(0)->comment('Numero de hijos');
            // --- Información Militar ---
            $table->string('military_service', 20)->nullable()->comment('Numero de libreta militar');
            $table->string('type_military', 20)->nullable()->comment('Tipo de libreta militar');
            $table->string('district', 50)->nullable()->comment('Distrito militar');
            // --- Información Laboral ---
            $table->string('position', 100)->nullable()->comment('Cargo del empleado');
            $table->string('area', 100)->nullable()->comment('Area o departamento de trabajo');
            $table->foreignId('destination_id')->constrained('destinations')->onDelete('cascade');
            $table->boolean('vendedor')->default(false);
            $table->boolean('auditor')->default(false);
            $table->boolean('approve')->default(false);

            $table->string('photo_path')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('humantalent_employees');
    }
};
