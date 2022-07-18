<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('CIN');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->string('image')->nullable();
           $table->string('card')->nullable();
            $table->string('fonction');
            $table->string('tel');
            $table->string('email')->nullable();
            $table->string('cnss')->nullable();
            $table->string('situation_familiale')->nullable();
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('employes');
    }
}
