<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundlePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundle_prices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bundle_id')->unsigned();
            $table->bigInteger('car_type_id')->unsigned();
            $table->double('price');
            $table->timestamps();
        });
        Schema::table('bundle_prices',function (Blueprint $table){
            $table->foreign('bundle_id')->references('id')->on('bundles')->cascadeOnDelete();
            $table->foreign('car_type_id')->references('id')->on('car_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bundle_prices');
    }
}
