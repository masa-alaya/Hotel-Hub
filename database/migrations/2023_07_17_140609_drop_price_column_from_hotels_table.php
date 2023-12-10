<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropPriceColumnFromHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn('average_price');
        });
    }

    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->decimal('average_price', 8, 2)->nullable();
        });
    }
}
