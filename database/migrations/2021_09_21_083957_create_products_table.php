<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->nullable();
            $table->string('code')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->text('description')->nullable();
            $table->string('type',100)->nullable();
            $table->double('physical_quantity')->default(0);
            $table->double('virtual_quantity')->default(0);
            $table->double('qte_min')->default(0);
            $table->double('tva')->default(0);
            $table->double('price')->default(0);
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('unit_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_family_id')->nullable()->constrained()-> cascadeOnDelete();

            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('products');
    }
}
