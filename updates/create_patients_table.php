<?php namespace Mohsin\MediScan\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreatePatientsTable extends Migration
{

    public function up()
    {
        Schema::create('mohsin_mediscan_patients', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('gender');
            $table->string('phone_no');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mohsin_mediscan_patients');
    }

}
