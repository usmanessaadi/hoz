<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->integer('digital_lock_id')->nullable();
            $table->integer('door_id')->nullable();
            $table->integer('gate_id')->nullable();
            $table->integer('accessory_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->float('price');
            $table->integer('stock');
            $table->integer('discount');
            // $table->string('main_image')->default('assets/images/default_product_img.jpg');
          ///  $table->string('main_image')->nullable();
            $table->integer('status')->default(1);

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
        Schema::dropIfExists('product_details');
    }
}
