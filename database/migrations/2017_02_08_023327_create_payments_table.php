<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('preregister_id')->unsigned();
            $table->foreign('preregister_id')->references('id')->on('preregisters');
            $table->float('amount');
            $table->enum('payment_type', array( 'D', 'C', 'E', 'H'));
            $table->integer('movements');
            $table->datetime('payment_date');
            $table->float('remaining_amount');
            $table->text('comments');
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
        Schema::drop('payments');
    }
}
