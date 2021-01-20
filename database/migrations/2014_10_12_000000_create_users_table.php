<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); 
            $table->bigInteger('idroles'); // id del rol que la persona manejara dentro del sistema 
            $table->string('email')->unique(); // Correo unico de la persona que ingresara al sistema 
            $table->string('password'); // Contraseña de acceso de la persona que ingresara al sistema
            $table->string('name', 100); // Nombre de la persona que ingresara al sistema
            $table->string('last_name', 100); // Apellido de la persona que ingresara al sistema
            $table->bigInteger('phone'); //Número de la persona que ingresara al sistema
            $table->bigInteger('identification_number')->unique(); //Número unico que identifica a la persona que ingresasra al sistema 
            $table->date('birth_date'); // Fecha de nacimiento de la persona que ingresara al sistema    
            $table->bigInteger('status')->default(1); // Estado para identificar si esta habilitado el usuario  
            $table->bigInteger('idcities'); //Id de la ciudad de la persona que ingresara al sistema
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
