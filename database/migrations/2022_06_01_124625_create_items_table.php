<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id()->index();
            $table->integer('category_id');
            $table->string('name',50);
            $table->string('image1',191)->nullable()->change();
            $table->string('image2',191)->nullable()->change();
            $table->string('image3',191)->nullable()->change();
            $table->string('image4',191)->nullable()->change();
            $table->integer('price');
            $table->string('item_detail',191);
            $table->integer('sales_status');
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
        Schema::dropIfExists('items');
    }
}
