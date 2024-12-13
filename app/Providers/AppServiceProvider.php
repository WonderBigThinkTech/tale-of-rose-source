<?php

namespace App\Providers;

use App\Models\Size;
use App\Models\Type;
use App\Models\Color;
use App\Models\Event;
use App\Models\Ink;
use App\Models\Shape;
use App\Models\Material;
use App\Models\Postcode;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Paginator::useBootstrapFive();

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->greeting('Welcome to Tales of Roses!')
                ->subject('TaleofRoses - Verify Email Address')
                ->line("Thank you for registering on TaleofRoses.com.au")
                ->line('You can click the button below to verify your email address')
                ->action('Verify Email Address', $url);
        });





        $allTypes = Type::all();
        $everydayEvent = Event::all();

        $everyday = Event::where('event_group', 'Everyday Occasions')->get();
        $upcoming = Event::where('event_group', 'Upcoming Occasions')->get();




        $popularEvents = Event::where(
            'name',
            'Anniversary'
        )->orWhere(
            'name',
            'Birthday'
        )->orWhere(
            'name',
            'Weddings'
        )->orWhere('name', 'Baby Shower')->get();


        $allShape = Shape::all();
        $allSize = Size::all();
        $allMaterial = Material::all();
        $allColors = Color::all();
        $allStates = Postcode::groupBy('state')->pluck('state');
        $allInks = Ink::all();

        View::share([
            'types' => $allTypes,
            'shapes' => $allShape,
            'sizes' => $allSize,
            'materials' => $allMaterial,
            'colors' => $allColors,
            'everydayEvents' => $everydayEvent,
            'allStates' => $allStates,
            'popularEvents' => $popularEvents,
            'everyday' => $everyday,
            'upcoming' => $upcoming,
            'inks' => $allInks,
        ]);
    }
}
