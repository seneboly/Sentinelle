<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

use \View;
use App\Models\Client;
use App\Models\ServiceChargeReclamation;
use App\Models\Reclamation;
use App\Models\StatusReclamations;

use Illuminate\Support\Facades\Blade;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer(['template.inc.counter', 'backend.dashboard.index', 'backend.reclamations.create', 'backend.clients.listeClients'], function($view){

            $view->with(
                [
                    'clients'=>Client::all(),
                    'reclamations'=>Reclamation::all(),
                    'services_responsable'=>ServiceChargeReclamation::all(),
                    'reclamations_traitees'=>Reclamation::where('status_reclamation_id', 1)->count(),
                    'reclamations_nonTraitees'=>Reclamation::where('status_reclamation_id', 3)->count(),
                ]);

        });

        Route::resourceVerbs([
               'create' => 'creer',
               'edit' => 'modifier',
           ]);

        View::composer('*', function($view){

            $view->with(['auth'=>auth()->user()]);

        });

        View::composer('template.partials.top_navbar', function($view){

            $view->with(['user_name'=>Str_slug(auth()->user()->name ) ]) ;

        });

         Blade::directive('diff', function($expression){

            return "<?php echo ($expression)->diffForHumans(); ?>";
        });

         Carbon::serializeUsing(function ($carbon) {
             return $carbon->format('U');
         });

         Carbon::setLocale('fr_FR');

         Blade::directive('date', function($expression){

             return "<?php echo ucfirst(($expression)->format('d-m-Y')); ?>";
         });

         Carbon::serializeUsing(function ($carbon) {
                    return $carbon->format('U');
                });
    }
}
