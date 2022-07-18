<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_variations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()-> cascadeOnDelete()->nullable();
            $table->foreignId('variation_id')->constrained()-> cascadeOnDelete()->nullable();
            $table->double('price')->nullable();
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
        Schema::dropIfExists('items_variations');
    }
}
