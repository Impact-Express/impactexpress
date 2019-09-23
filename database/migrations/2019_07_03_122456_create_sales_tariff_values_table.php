<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTariffValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_tariff_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sales_tariff_id');
            $table->decimal('weight', 8, 2);
            $table->integer('zone');
            $table->boolean('documents');
            $table->decimal('amount', 10, 5);
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
        Schema::dropIfExists('sales_tariff_values');
    }
}
