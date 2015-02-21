<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('account', 200);
            $table->enum('type', array('Income', 'Expense', 'Transfer'));
            $table->string('category', 200)->nullable();
            $table->decimal('amount', 18, 2);
            $table->string('payer', 200)->nullable();
            $table->string('payee', 200)->nullable();
            $table->string('method', 200)->nullable();
            $table->string('ref', 200)->nullable();
            $table->enum('status', array('Cleared', 'Uncleared', 'Reconciled', 'Void'));
            $table->text('description');
            $table->decimal('tax', 18, 2)->nullable();
            $table->date('date');
            $table->decimal('dr', 18, 2);
            $table->decimal('cr', 18, 2);
            $table->decimal('bal', 18, 2);
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
        Schema::drop('transactions');
    }

}
