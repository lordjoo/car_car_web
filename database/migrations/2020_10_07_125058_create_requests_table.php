<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            // personal info
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('state');
            // request date
            $table->string('day');
            $table->string('time');
            // bundle info
            $table->bigInteger('bundle_id')->unsigned();
            $table->bigInteger('car_type_id')->unsigned();
            // total
            $table->string('total');
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
        Schema::dropIfExists('requests');
    }
}
