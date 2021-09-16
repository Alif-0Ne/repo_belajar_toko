<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_transaction', function (Blueprint $table) {
            $table->bigIncrements('id_detail_transaction');

            $table->unsignedBigInteger('id_transaction');
            $table->foreign('id_transaction')->references('id_transaction')->on('transaction');

            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id_product')->on('product');

            $table->integer('qty');
            $table->integer('subtotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('det_transaction');
    }
}
