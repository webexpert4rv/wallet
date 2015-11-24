<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserBalance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_account',function(Blueprint $table){

                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->unsignedInteger('user_id');
                $table->string('transaction_type');
                $table->decimal('amount',5,2);
                $table->timestamps();
        });

        Schema::table('user_account',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_account');
    }
}
