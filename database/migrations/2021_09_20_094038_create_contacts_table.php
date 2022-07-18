<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('fname',150);
            $table->string('lname',150);
            $table->string('phone',20)->nullable();
            $table->string('mobile',20)->nullable();
            $table->string('fax',20)->nullable();
            $table->string('email',150)->nullable();
            $table->string('job_title',200);
            $table->string('note')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->foreignId('account_id')->nullable()->constrained()-> cascadeOnDelete();
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
        Schema::dropIfExists('clients.js');
    }
}
