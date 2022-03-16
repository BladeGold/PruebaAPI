<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tw_corporativos', function (Blueprint $table) {
            $table->id()->length(11);
            $table->string('S_NombreCorto', 45);
            $table->string('S_NombreCompleto', 75);
            $table->string('S_LogoUrl', 255)->nullable();
            $table->string('S_DBName', 45);
            $table->string('S_DBUsuario', 45);
            $table->string('S_DBPassword', 150);
            $table->string('S_SystemUrl', 255);
            $table->boolean('S_Activo'); 
            $table->timestamp('D_FechaIncorporacion');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes("deleted_at");
            
            $table->foreignId('tw_usuarios_id')
                    ->constrained('tw_usuarios')
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
        Schema::dropIfExists('tw_corporativos');
    }
}
