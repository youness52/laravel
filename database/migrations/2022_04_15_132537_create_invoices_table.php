<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->date('reception_date')->nullable();
            $table->date('commande_date')->nullable();
            $table->date('due_date')->nullable();
            $table->date('payment_date')->nullable();

            $table->string('document_number')->nullable();

            $table->string('terms_of_payment')->nullable();
            $table->string('object')->nullable();
            $table->string('remarks')->nullable();

            $table->foreignId('account_id')->nullable()->constrained()-> cascadeOnDelete();
            $table->foreignId('payement_method_id')->nullable()->constrained()-> cascadeOnDelete();
            $table->foreignId('invoice_type_id')->nullable()->constrained()-> cascadeOnDelete();
            $table->foreignId('currency_id')->nullable()->constrained()-> cascadeOnDelete();
            $table->foreignId('status_id')->nullable()->constrained()-> cascadeOnDelete();
            $table->foreignId('invoice_id')->nullable()->constrained()-> cascadeOnDelete();

            $table->string('is_valid')->default(0);
            $table->double('amount')->default(0);
            $table->double('paid')->default(0);
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
        Schema::dropIfExists('invoices');
    }
}
