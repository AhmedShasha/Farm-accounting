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
        Schema::create('capital_periods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('count' , 10)->nullable();
            $table->decimal('quantity' , 10,3)->nullable();
            $table->decimal('unitPrice' , 10,3)->nullable();
            $table->decimal('totalPrice',10,3)->nullable();
            $table->boolean('periodStatus');
            $table->date('periodDate')->nullable();

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
        Schema::dropIfExists('capital_periods');
    }
};
