<?php namespace Mohsin\MediScan\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateScansTable extends Migration
{

    public function up()
    {
        Schema::create('mohsin_mediscan_scans', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('patient_id');
            $table->string('type');
            $table->text('specs');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mohsin_mediscan_scans');
    }

}
