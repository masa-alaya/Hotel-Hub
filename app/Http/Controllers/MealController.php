<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\MealOrder;
use App\Models\Category;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class MealController extends Controller
{

    // public function showHomePage(){
    //     $meals = collect();
    //     // get the best seller meals
    //     // $best_meals = MealOrder::selectRaw('meal_id, count(meal_id) as total')->groupBy('meal_id')->orderBy('total', 'desc')->limit(10)->get();

    //     $best_meals = Meal::limit(10)->get();

    //     // looping through best seller meals ids and fetching the meal data
    //     // foreach($best_meals as $meal) {
    //     //     $meals->push(Meal::find($meal->meal_id));
    //     // }
    //     foreach($best_meals as $meal) {
    //         $meals->push(Meal::find($meal->id));
    //     }

    //     // getting all the categories
    //     $categories = Category::all();

    //     // redirecting the the web page
    //     return view('welcome')->with([
    //         'meals' => $meals,
    //         'categories' => $categories,
    //         'numOfCategories' => $categories->count()
    //     ]);
    // }

    // public function search(Request $request){
    //     // number of items per page
    //     $pageSize = 10;
    //     if(isset($request->pageSize) && !empty($request->pageSize)) {
    //         $pageSize = $request->pageSize;
    //     }

    //     // getting all the categories
    //     $categories = Category::all();

    //     return view('search', [
    //         // 'meals' => Meal::latest()->filter($request->all())->paginate($pageSize),
    //         'meals' => Meal::latest()->filter($request->all())->get(),
    //         'categories' => $categories
    //     ]);
    // }

    // public function mealsInCategory(Request $request){
    //     $meals=Meal::all()->where('category_id', '=', $request->id);
    //     if($meals->count()==0)
    //         return view('errors.404');

    //     dump($meals); //prepare the view and pass $meals
    // }

    // public function getCartMeals(Request $request) {
    //     $request->validate([
    //         'meals' => 'required'
    //     ]);
    //     return Meal::whereIn('id', json_decode($request->meals))->get();
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
