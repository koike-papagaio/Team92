<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buys', function (Blueprint $table) {
            $table->id()->index();
            $table->integer('user_id');
            $table->string('user_name',30);
            $table->string('address',191);
            $table->string('email',191);
            $table->string('image1',191)->nullable();
            $table->string('item_name',50);
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('payment');
            $table->integer('bought_num');
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
        Schema::dropIfExists('buys');
    }
}
