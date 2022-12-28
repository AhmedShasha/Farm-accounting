<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category');

            $table->decimal('quantity_FirstPeriod' , 10 , 3 )->nullable();
            $table->decimal('price_FirstPeriod' , 10 , 3 )->nullable();
            $table->decimal('amount_FirstPeriod' , 10 , 3 )->nullable();

            $table->decimal('quantityPurchases_DuringPeriod' , 10 , 3 )->nullable();
            $table->decimal('pricePurchases_DuringPeriod' , 10 , 3 )->nullable();
            $table->decimal('amountPurchases_DuringPeriod' , 10 , 3 )->nullable();

            $table->decimal('quantity_LastPeriod' , 10 , 3 )->nullable();
            $table->decimal('price_LastPeriod' , 10 , 3 )->nullable();
            $table->decimal('amount_LastPeriod' , 10 , 3 )->nullable();

            $table->decimal('quantityOutcoming_DuringPeriod' , 10 , 3 )->nullable();
            $table->decimal('priceOutcoming_DuringPeriod' , 10 , 3 )->nullable();
            $table->decimal('amountOutcoming_DuringPeriod' , 10 , 3 )->nullable();

            $table->string('unitOfMeasure')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.  The amount of purchases during the period
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
