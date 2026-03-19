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
        Schema::create('humantalent_demographic_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('humantalent_employees')->onDelete('cascade')->comment('Id del empleado al que pertenece la información demográfica');
            $table->boolean('politically_exposed')->default(false)->comment('Indica si el empleado es una persona políticamente expuesta');
            $table->boolean('public_resources')->default(false)->comment('Indica si el empleado tiene acceso a recursos públicos');
            $table->boolean('special_protection')->default(false)->comment('Indica si el empleado requiere protección especial');
            $table->boolean('elderly_person')->default(false)->comment('Indica si el empleado es una persona mayor de 60 años');
            $table->boolean('disabled_person')->default(false)->comment('Indica si el empleado es una persona con discapacidad');
            $table->boolean('victims_conflict')->default(false)->comment('Indica si el empleado es una víctima de conflicto');
            $table->boolean('extreme_poverty')->default(false)->comment('Indica si el empleado vive en pobreza extrema');
            $table->boolean('indigenous_person')->default(false)->comment('Indica si el empleado es una persona indígena');
            $table->boolean('afro_population')->default(false)->comment('Indica si el empleado pertenece a una población afrodescendiente');
            $table->boolean('diverse_population')->default(false)->comment('Indica si el empleado pertenece a una población diversa LGTBQ+');
            $table->boolean('other_protection')->default(false)->comment('Indica si el empleado requiere otro tipo de protección');
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
        Schema::dropIfExists('humantalent_demographic_data');
    }
};
