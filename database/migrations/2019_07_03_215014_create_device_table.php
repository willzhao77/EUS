<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device', function (Blueprint $table) {
          $table->bigIncrements('device_id');
          $table->integer('device_type');
          $table->integer('device_manufacturer');
          $table->string('device_name');
          $table->string('device_sn');
          $table->integer('device_model');
          $table->string('device_user');
          $table->text('device_note');
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
        Schema::dropIfExists('device');
    }
}
