<?php

namespace App\Nova;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsToMany;
use Whitecube\NovaFlexibleContent\Flexible;
use App\Rules\RequiredFlexibleImage;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Panel;

class Rooms extends Resource
{
    public function getImage($colName, $flexible = null)
    {
         return $this->{$colName} ?? 'temp.png';


    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Room::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','title'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable()->hidefromindex(),
            Select::make('Room Kind','kind')->options([
                'Single' => 'Single Room',
                'Double' => 'Double Room',
                'Family' => 'Family Room',
                'Suite' => 'Suite',

            ])->readonly(function(){
                return !(in_array(auth()->user()->role , [1,3]));
            })->displayUsingLabels()->sortable()->rules('required'),
            Select::make('Hotel name','hotel_id')->options(\App\Models\Hotels::pluck('title', 'id'))
            ->readonly(function () {
                return !(in_array(auth()->user()->role, [1, 3]));
            })
            ->displayUsingLabels()
            ->sortable()
            ->rules('required'),
            Number::make('Number of persons','persons') ->rules(['required']),

            Textarea::make('Room features','description') ->rules(['required']),
            Number::make('Price','price') ->rules(['required']),

            Image::make('logo','logo')->creationRules('required')->disk('screens')->deletable(false)->hideFromIndex(),
            Image::make('Image1','image1')->creationRules('required')->disk('screens')->deletable(false)
            ->preview(function () {
                return "<img src='/storage/screens/".$this->getImage('image1')."' style='max-width: 200px'>";
            })->hidefromindex(),
            Image::make('Image2','image2')->creationRules('required')->disk('screens')->deletable(false)
            ->preview(function () {
                return "<img src='/storage/screens/".$this->getImage('image2')."' style='max-width: 200px'>";
            })->hidefromindex(),
            Image::make('Image3','image3')->creationRules('required')->disk('screens')->deletable(false)
            ->preview(function () {
                return "<img src='/storage/screens/".$this->getImage('image3')."' style='max-width: 200px'>";
            })->hidefromindex(),
            Image::make('Image4','image4')->nullable()->disk('screens')->deletable(false)
            ->preview(function () {
                return "<img src='/storage/screens/".$this->getImage('image4')."' style='max-width: 200px'>";
            })->hidefromindex(),
            Image::make('Image5','image5')->nullable()->disk('screens')->deletable(false)
            ->preview(function () {
                return "<img src='/storage/screens/".$this->getImage('image5')."' style='max-width: 200px'>";
            })->hidefromindex(),
      ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
