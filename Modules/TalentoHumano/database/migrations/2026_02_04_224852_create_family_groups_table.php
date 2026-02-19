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
            $table->foreignId('employee_id')->constrained('humantalent_employees');
            $table->string('employee_fullName', 150)->comment('Nombre completo del empleado');
            $table->string('name', 100)->comment('Nombre del familiar');
            $table->string('kinship', 100)->comment('Parentesco con el empleado');
            $table->string('profession')->nullable()->comment('Profesión del familiar');
            $table->string('occupation')->nullable()->comment('Ocupación del familiar');
            $table->string('company')->nullable()->comment('Empresa donde labora el familiar');
            $table->string('education_level')->nullable()->comment('Nivel de educación del familiar');
            $table->date('birth_date')->comment('Fecha de nacimiento del familiar');
            $table->text('illness')->nullable()->comment('Enfermedades que padece el familiar');
            $table->string('phone')->nullable()->comment('Teléfono del familiar');

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
