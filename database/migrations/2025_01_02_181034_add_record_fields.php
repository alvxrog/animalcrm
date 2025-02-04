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
        Schema::table('records', function (Blueprint $table) {
            // Amnamnesis
            $table->text('symptoms')->nullable();           // Síntomas actuales
            $table->text('history')->nullable();            // Historial clinico
            $table->text('medicine_history')->nullable();   // Medicamentos que está tomando
            $table->text('nourishmentm')->nullable();       // Alimentación

            $table->text('exam')->nullable();               // Exámen clínico
            // Campos de la receta
            $table->text('dps')->nullable();                // Dps 
            $table->text('active_ingr')->nullable();        // Principio activo
            $table->text('quantity')->nullable();           // Cantidad
            $table->text('dose_freq')->nullable();         // Dosis y frecuencia
            $table->text('admin_chann')->nullable();       // Vía de administración
            $table->text('treat_duration')->nullable();     // Duración tratamiento y % envase
            $table->enum('prescr_type', ['ordinary', 'exceptional'])->default('ordinary');  // Tipo de prescripción
            $table->text('indications')->nullable();       // Indicaciones
            $table->enum('treatment', ['therapeutic', 'profilactic', 'metafilactic'])->default('therapeutic'); // Tratamiento
            $table->text('warnings')->nullable();          // Advertencias e instrucciones
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('records', function (Blueprint $table) {
            //
        });
    }
};
