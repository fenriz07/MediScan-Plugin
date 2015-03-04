<?php namespace Mohsin\MediScan\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreatePropsTable extends Migration
{

    public function up()
    {
        Schema::create('mohsin_mediscan_props', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('type');
            $table->integer('prop_id')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mohsin_mediscan_props');
    }

}
