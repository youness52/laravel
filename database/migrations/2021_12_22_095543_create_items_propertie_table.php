<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsPropertieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_propertie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()-> cascadeOnDelete()->nullable();
            $table->foreignId('propertie_id')->constrained()-> cascadeOnDelete()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_propertie');
    }
}
