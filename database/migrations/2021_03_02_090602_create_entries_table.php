<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('qntd');
            $table->string('total_points'); 
            $table->string('total_receive');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('material_id');

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('material_id')->references('id')->on('materials');
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
        Schema::dropIfExists('entries');
    }
}
