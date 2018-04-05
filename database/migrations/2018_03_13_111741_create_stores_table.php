<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('category');
            $table->string('lat');
            $table->string('lng');
            $table->string('web');
            $table->string('postal');
            $table->string('phone'); 
            $table->string('city'); 
            $table->string('state');    
            $table->string('hours1');  
            $table->string('hours2');    
            $table->string('hours3');   
            $table->string('featured'); 
            $table->string('features');
            $table->date('date');
            $table->integer('agent_id')->unsigned();
            //$table->rememberToken();
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
        Schema::dropIfExists('stores');
    }
}
