<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Point;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\MealOrder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Point::factory(10)->create();
        //Category::factory(10)->create();
        //Meal::factory(20)->create();
        DB::table('addresses')->insert(
            [
             'user_id' => 1, 
             'title' => 'البيت', 
             'region' => 'اللاذقية 8 آذار',
             'street'=>'8 آذار',
             'floorNo'=>1,
             'details'=>'مقابل قيادة الشرطة'
           ]
          );
        Order::factory(2)->create();
        //MealOrder::factory(4)->create();

        // DB::table('meal_order')->insert(
        //     [
        //      'order_id' => 1, 
        //      'meal_id' => 1, 
        //      'meal_price' => 5000,
        //    ]
        //   );

        
    }
}
