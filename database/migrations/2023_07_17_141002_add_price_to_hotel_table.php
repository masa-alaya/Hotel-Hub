<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->decimal('average_price', 8, 2)->nullable();

        });
        DB::unprepared("
        CREATE TRIGGER update_hotel_average_price
        AFTER INSERT ON rooms
        FOR EACH ROW
        BEGIN
            UPDATE hotels SET average_price = (
                SELECT AVG(price) FROM rooms WHERE rooms.hotel_id = NEW.hotel_id
            ) WHERE id = NEW.hotel_id;
        END
        ");
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
