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
        Schema::create('humantalent_family_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('humantalent_employees')->onDelete('cascade')->comment('Id del empleado al que pertenece el grupo familiar');
            $table->string('identification', 10)->comment('Número de identificación del familiar');
            $table->string('name', 100)->comment('Nombre del familiar');
            $table->string('kinship', 100)->comment('Parentesco con el empleado');
            $table->string('profession', 150)->nullable()->comment('Profesión del familiar');
            $table->string('occupation', 150)->nullable()->comment('Ocupación del familiar');
            $table->string('company', 150)->nullable()->comment('Empresa donde labora el familiar');
            $table->string('education_level', 100)->nullable()->comment('Nivel de educación del familiar');
            $table->date('birth_date')->comment('Fecha de nacimiento del familiar');
            $table->string('illness', 255)->nullable()->comment('Enfermedades que padece el familiar');
            $table->string('phone', 20)->nullable()->comment('Teléfono del familiar');
            
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
        Schema::dropIfExists('humantalent_family_groups');
    }
};
