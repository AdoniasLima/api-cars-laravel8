<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("cars_brands_id")->unsigned();
            $table->foreign("cars_brands_id")->references("id")->on("cars_brands")->onDelete("cascade");
            $table->string("name", 30);
            $table->string("horsepower", 4);
            $table->string("fuel", 10);
            $table->string("gearshift", 10);
            $table->integer("year");
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
        Schema::dropIfExists('cars');
    }
}
