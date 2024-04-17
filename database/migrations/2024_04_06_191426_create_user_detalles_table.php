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
        Schema::create('user_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('sexo', ['M', 'F']);
            $table->enum('estado_civil', ['Soltero', 'Casado', 'Divorciado', 'Viudo']);
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->integer('edad')->nullable();
            $table->foreignId('ciudad_id')->constrained('ciudad');
            $table->foreignId('departamento_id')->constrained('departamento');
            $table->foreignId('pais_id')->constrained('pais');
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('nombre_padre')->nullable();
            $table->string('nombre_madre')->nullable();
            $table->boolean('tiene_tutor')->default('0');
            $table->integer('cant_hermanos')->nullable();
            $table->string('lugar_trabajo')->nullable();
            $table->string('tutor')->nullable();
            $table->string('religion')->nullable();
            $table->foreignId('situacion_laboral_id')->constrained('situacion_laboral')->nullable();
            $table->foreignId('profesion_id')->constrained('profesiones')->nullable();
            $table->foreignId('nivel_escolaridad_id')->constrained('nivel_escolar')->nullable();
            $table->string('nro_emergencia')->nullable();
            $table->string('motivo_consutla')->nullable();
            $table->string('antecedentes_personales')->nullable();
            $table->string('antecedentes_familiares')->nullable();
            $table->string('examen_medico')->nullable();
            $table->string('examen_psicopatolico')->nullable();
            $table->string('disimulacion')->nullable();
            $table->string('aspecto_del_paciente')->nullable();
            $table->string('actitud')->nullable();
            $table->string('contacto_visual')->nullable();
            $table->string('atencion_orientacion_temp_espa')->nullable();
            $table->string('memoria')->nullable();
            $table->string('sensoperecepcion')->nullable();
            $table->string('pensamiento')->nullable();
            $table->string('afectividad')->nullable();
            $table->string('psicomotricidad')->nullable();
            $table->string('insigth')->nullable();
            $table->string('diagnostico_presuntivo')->nullable();
            $table->string('diagnostico_diferencial')->nullable();
            $table->string('plan_tratamiento')->nullable();
            $table->string('pronostico')->nullable();
            $table->string('evolucion')->nullable();
            $table->string('epicrisis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_detalles');
    }
};
