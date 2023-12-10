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
use Ajhaupt7\ImageUploadPreview\ImageUploadPreview;

class Hotels extends Resource
{



    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Hotels::class;

    public function getImage($colName, $flexible = null)
    {
         return $this->{$colName} ?? 'temp.png';


    }
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
            Text::make('Hotel Name', 'title')->rules('required','max:255'),
            Select::make('City','city_id')->options([
                '11' => 'Damasscus',
                '12' => 'Lattakia',
                '13' => 'Aleppo',
                '14' => 'Homs',
                '15' => 'Ar Raqqah',
                '16' => 'Tartus',
                '17' => 'Deir ez-Zur',
                '18' => 'Qamishli',
                '19' => 'Hama',
                '20' => 'Idlib',
                '21' => 'Daraa',
                '22' => 'As Suwayda',
                '23' => 'Al-Hasakah',
                '24' => 'Quneitra',
                '25' => 'Rural Damascus',
            ])->readonly(function(){
                return !(in_array(auth()->user()->role , [1,3]));
            })->displayUsingLabels()->sortable()->rules('required'),
            Image::make('logo', 'logo')->creationRules('required')->disk('screens')->deletable(false),
            Number::make('Stars', 'stars')->min(1)->max(5)->rules(['required']),
            Textarea::make('Description','description') ->rules(['required']),
            Text::make('Region','region') ->rules(['required']),
            Text::make('Street','street') ->nullable(),
            Image::make('Image1','image1')->creationRules('required')->disk('screens')->deletable(false)
            ->hidefromindex(),
            Image::make('Image2','image2')->creationRules('required')->disk('screens')->deletable(false)
            ->hidefromindex(),
            Image::make('Image3','image3')->nullable()->disk('screens')->deletable(false)
            ->hidefromindex()->nullable(),
            Image::make('Image4','image4')->nullable()->disk('screens')->deletable(false)
            ->hidefromindex()->nullable(),
            Image::make('Image5','image5')->nullable()->disk('screens')->deletable(false)
            ->hidefromindex()->nullable(),
            new Panel('Famous places near this hotel',$this->nearby()),
            new Panel('restaurants near this hotel',$this->restaurants()),


        ];
    }
    public function nearby()
     {
        return [
            Text::make('first', "nearby1")->nullable()->hidefromindex(),
            Text::make('second', "nearby2")->nullable()->hidefromindex(),
            Text::make('Third', "nearby3")->nullable()->hidefromindex(),
            Text::make('Fourth', "nearby4")->nullable()->hidefromindex(),


        ];
    }
    public function restaurants()
     {
        return [
            Text::make('first', "restaurant1")->nullable()->hidefromindex(),
            Text::make('second', "restaurant2")->nullable()->hidefromindex(),
            Text::make('Third', "restaurant3")->nullable()->hidefromindex(),
            Text::make('Fourth', "restaurant4")->nullable()->hidefromindex(),


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
