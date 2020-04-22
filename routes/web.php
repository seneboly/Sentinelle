<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::redirect('/home', '/sentinelle');


Route::get('/','DashboardController@index')->name('home');

Route::resources(
	[
		'clients'=>'ClientController',
		'services-responsables'=>'ServiceChargeReclamationController',
		'reclamations'=>'ReclamationController',
		'utilisateurs'=>'UserController',
	]
);




Auth::routes();


Route::get('reclamations_non_traitees', 'ReclamationController@getReclamationsNonTraitees')
->name('reclamations_non_traitees');

Route::get('reclamations_en_attente', 'ReclamationController@getReclamationsEnAttente')
->name('reclamations_en_attente');

Route::get('assigner-reclamation', 'AssignReclamationcontroller@index')
->name('assigner-reclamation');

Route::post('assigner-reclamation', 'AssignReclamationcontroller@assigner')
->name('assigner');


Route::get('reporting-personnel/{name}', 'UserController@getPersonnelReporting')->name('getPersonnelReporting');
Route::get('parametre-du-compte/{name}', 'UserController@getCountParams')->name('getParamas');

Route::get('impayes', 'ImpayesController@index');
Route::post('impayes', 'ImpayesController@store')->name('impayes');

//Ajax routes
Route::get('ajax-client', 'ClientController@dataAjax')->name('ajax-client');
Route::get('ajax-ccl', 'UserController@dataAjax')->name('ajax-ccl');
Route::get('ajax-service', 'ServiceChargeReclamationController@dataAjax')->name('ajax-service');
Route::get('ajax-reclamation', 'ReclamationController@dataAjax')->name('ajax-reclamation');

Route::get('ajax-renseigneur', 'AssignReclamationcontroller@dataAjax')->name('ajax-assigner');


Route::get('tous-les-clients', 'ClientController@getClientsListe')->name('all_clients');

Route::resource('clients', 'ClientController');



