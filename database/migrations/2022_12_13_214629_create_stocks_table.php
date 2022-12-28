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
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supplyDestination')->nullable();
            $table->date('date')->nullable();
            $table->decimal('inComingQuantity' , 10,3)->nullable();
            $table->decimal('inComingUnitPrice' , 10,3)->nullable();
            $table->decimal('inComingTotal' , 10,3)->nullable();

            $table->decimal('outComingQuantity' , 10,3)->nullable();
            $table->decimal('outComingUnitPrice' , 10,3)->nullable();
            $table->decimal('outComingTotal' , 10,3)->nullable();
            $table->decimal('residual' , 10,3)->default(0.000);

            // $table->string('unitOfMeasure')->nullable();
            $table->string('note')->nullable();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

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
        Schema::dropIfExists('stocks');
    }
};
