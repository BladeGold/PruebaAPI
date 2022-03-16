<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tw_contratos_corporativos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('D_FechaInicio');
            $table->dateTime('D_FechaFin');
            $table->string('S_URLContrato', 255)->nullable();

            $table->foreignId('tw_coporativos_id')
                    ->constrained('tw_corporativos')
                    ->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tw_contratos_corporativos');
    }
}
