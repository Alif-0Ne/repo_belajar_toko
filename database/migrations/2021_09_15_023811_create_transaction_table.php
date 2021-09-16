<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('id_transaction');

            $table->unsignedBigInteger('id_customers');
            $table->foreign('id_customers')->references('id_customers')->on('customers');

            $table->unsignedBigInteger('id_officer');
            $table->foreign('id_officer')->references('id_officer')->on('officer');

            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
