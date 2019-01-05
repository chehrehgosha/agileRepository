<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('product_id')->index();
            $table->integer('base_price')->default(0);
            $table->integer('highest_bid')->default(0);
            $table->dateTime('start_time');	
            $table->dateTime('end_time');	
            $table->integer('category_id')->index();
            $table->integer('district_id')->index();
            $table->string('attributes');
            $table->string('description');
            $table->string('name');
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
        Schema::dropIfExists('auctions');
    }
}
