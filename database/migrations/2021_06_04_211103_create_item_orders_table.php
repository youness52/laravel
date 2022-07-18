<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()-> cascadeOnDelete()->nullable();
            $table->foreignId('order_id')->constrained()-> cascadeOnDelete()->nullable();
            $table->string('status')->default('pending');
            $table->integer('quantity')->default(0);
            $table->float('price')->default(0);
            $table->string('comment')->nullable();


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
        Schema::dropIfExists('item_orders');
    }
}
