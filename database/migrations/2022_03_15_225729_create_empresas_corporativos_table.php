<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tw_empresas_corporativo', function (Blueprint $table) {
            $table->id();
            $table->string('S_RazonSocial', 150);
            $table->string('S_RFC', 13);
            $table->string('S_Pais', 75)->nullable();
            $table->string('S_Estado', 75)->nullable();
            $table->string('S_Municipio', 75)->nullable();
            $table->string('S_ColoniaLocalidad', 75)->nullable();
            $table->string('S_Domicilio', 100)->nullable();
            $table->string('S_CodigoPostal', 5)->nullable();
            $table->string('S_UsoCFDI', 45)->nullable();
            $table->string('S_UrlRFC', 255)->nullable();
            $table->string('S_UrlActaConstitutiva', 255)->nullable();
            $table->boolean('S_Activo');
            $table->string('S_Comentarios', 255)->nullable();
            $table->foreignId('tw_corporativos_id')
                    ->constrained('tw_corporativos')
                    ->OnDelete('cascade'); 
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tw_empresas_corporativo');
    }
}
