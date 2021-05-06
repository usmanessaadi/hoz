<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitalLocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digital_locks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('digital_door_type_id')->default('0');
            $table->integer('digital_lock_type_id')->default('0');
            $table->integer('digital_handle_type_id')->default('0');

            $table->string('type_name')->default('Digital Locks');
            $table->string('product_name');
            $table->mediumText('description')->nullable();
            $table->string('brand');

            $table->integer('fingerprint')->default('0');
            $table->integer('physical_key')->default('0');
            $table->integer('bluetooth')->default('0');
            $table->integer('pin')->default('0');
            $table->integer('rfid_card')->default('0');
            $table->integer('wifi')->default('0');
            $table->integer('nfc')->default('0');
            $table->integer('smasung_smart_things')->default('0');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('digital_locks');
    }
}
