<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->double('quantity')->nullable();
            $table->double('price')->nullable();
            $table->foreignId('product_id')->nullable()->constrained()-> cascadeOnDelete();
            $table->foreignId('invoice_id')->constrained()-> cascadeOnDelete();
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('invoice_item_id')->nullable();
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
        Schema::dropIfExists('invoice_items');
    }
}
