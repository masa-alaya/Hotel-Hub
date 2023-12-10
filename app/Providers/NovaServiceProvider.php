<?php

namespace App\Providers;

use App\Models\User;
use App\Nova\Metrics\NewUsers;
use App\Nova\Metrics\TotalSalesPerDay;
use App\Nova\Metrics\TotalSalesPerUser;
use App\Nova\Metrics\UsersPerDay;
use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::createUserUsing(function($command) {        return [
            $command->ask('Name'),
            $command->ask('Email Address'),
            $command->secret('Password'),            // My Custom prompts:
            $command->ask('phone'),
        ];    }, function($name, $email, $password, $phone) {        (new User)->forceFill([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),            // My custom fields
            'email_verified_at' => now(),
            'phone' => $phone,
            'role' => 1
         ])->save();    });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            //new Help, //this card shows links to nova documentation

            (new TotalSalesPerDay)->width('full'),
            (new TotalSalesPerUser)->width('full'),
            (new NewUsers)->width('1/2'),
            (new UsersPerDay)->width('1/2'),
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
