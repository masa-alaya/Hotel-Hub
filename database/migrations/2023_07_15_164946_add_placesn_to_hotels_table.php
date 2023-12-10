<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlacesnToHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->string('nearby1')->nullable();
            $table->string('nearby2')->nullable();
            $table->string('nearby3')->nullable();
            $table->string('nearby4')->nullable();
            $table->string('restaurant1')->nullable();
            $table->string('restaurant2')->nullable();
            $table->string('restaurant3')->nullable();
            $table->string('restaurant4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            //
        });
    }
}
