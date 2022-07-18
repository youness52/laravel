<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ref',100)->nullable();
            $table->string('rc',100)->nullable();
            $table->string('ice',100)->nullable();
            $table->string('iftax',100)->nullable();
            $table->foreignId('country_id')->nullable()->constrained()-> cascadeOnDelete();
            $table->integer('country_id_delivery')->nullable();
            $table->foreignId('currency_id')->constrained()-> cascadeOnDelete();
            $table->string('city',100)->nullable();
            $table->string('city_delivery',100)->nullable();
            $table->string('zipcode',50)->nullable();
            $table->string('zipcode_delivery',100)->nullable();
            $table->string('address')->nullable();
            $table->string('address_delivery',100)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('mobile',20)->nullable();
            $table->string('fax',20)->nullable();
            $table->string('email',200)->nullable();
            $table->string('website',200)->nullable();
            $table->float('discount')->default(0);
            $table->foreignId('activity_area_id')->nullable()->constrained()-> cascadeOnDelete();
            $table->foreignId('payement_method_id')->nullable()->constrained()-> cascadeOnDelete();
            $table->foreignId('payement_period_id')->nullable()->constrained()-> cascadeOnDelete();
            $table->foreignId('account_types_id')->nullable()->constrained()-> cascadeOnDelete();
            $table->text('note')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
