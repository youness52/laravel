<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsVariationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_variation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()-> cascadeOnDelete()->nullable();
            $table->foreignId('variation_id')->constrained()-> cascadeOnDelete()->nullable();
            $table->double('price')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_variation');
    }
}
