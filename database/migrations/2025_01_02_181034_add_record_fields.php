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
            $table->text('symptoms');           // Síntomas actuales
            $table->text('history');            // Historial clinico
            $table->text('medicine_history');   // Medicamentos que está tomando
            $table->text('nourishmentm');       // Alimentación

            $table->text('exam');               // Exámen clínico
            // Campos de la receta
            $table->text('dps');                // Dps 
            $table->text('active_ingr');        // Principio activo
            $table->text('quantity');           // Cantidad
            $table->text('dose_freq');          // Dosis y frecuencia
            $table->text('admin_chann');        // Vía de administración
            $table->text('treat_duration');     // Duración tratamiento y % envase
            $table->enum('prescr_type', ['ordinary', 'exceptional'])->default('ordinary');  // Tipo de prescripción
            $table->text('indications');        // Indicaciones
            $table->enum('treatment', ['therapeutic', 'profilactic', 'metafilactic'])->default('therapeutic'); // Tratamiento
            $table->text('warnings');           // Advertencias e instrucciones
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
