<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('item_name')->nullable();
            $table->string('item_id')->nullable();
            $table->string('item_price')->nullable();
            $table->string('item_number')->nullable();
            $table->string('item_company')->nullable();
            $table->string('item_summary')->nullable();
            $table->longText('item_description')->nullable();
            $table->string('item_image_link')->nullable();
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
