<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_accounts', function (Blueprint $table) {
            $table->id();
            $table->double('buying_price')->default(0);
            $table->double('selling_price')->default(0);
            $table->double('exclusive_price')->default(0);
            $table->double('quantity')->default(0);
            $table->double('quantity_alert')->default(0);
            $table->foreignId('account_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('products_accounts');
    }
}
