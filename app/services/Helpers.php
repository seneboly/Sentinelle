<?php 

namespace App\Services;

use App\User;
use App\Role;
use Carbon\Carbon;
use App\Models\Reclamation;
use Illuminate\Support\Facades\DB;

class Helpers{


	public $title_reclamations = 

	[
		'#', 'code client', 'Nom du client', 
		'Nom du CCL',
		'Service traitant', 'Date reception','Status', 'Opérations'];

	public $title_reclamations_traitees = 

	[
		'#', 'code client', 'Nom du client', 
		'Nom du CCL',
		'Service traitant', 'Date reception','Durée traitement','Status', 'Opérations'];






	public $title_show_client_infos = 
	[	'#',
		'Code Client','Nom','Nombre de Rec.',
		'Code Gestionnaire Compte',
		'Numero agence'
	];

	public $title_assignees = 

	[
		'#', 'Code réclamation','Nom du CCL', 'Date',
	];

	public $title_motif_reclamation = 
	[
		'Motif','Justification'
	];

	public function getNameRole($user){

	$this->user = $user;

	foreach ($user->roles as $auth) {
		
		return $auth->nom_role;
	}

}


	public function colored($status)
	{
		
			if($status === "Non traitée"){

				return 'text-danger no-wrap-word';
			}
			elseif($status === "Traitée")
			{
				return 'text-success no-wrap-word';
			}

			else{

				return 'text-info no-wrap-word';

			}
		}



	




		

		public function fixWidth($index){

			$this->index = $index ;

			if($index == 2){

				return 'little-width';

			}else{
				return '';
			}
		}

		// public function recTraitedByMonth(){

		// 	$count = Reclamation::where('status_reclamation_id', 2)
			
		// 	->select(DB::raw('count(id) as `donnees`'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') date"),  DB::raw('YEAR(created_at) annees, MONTH(created_at) mois'))
		// 	->groupby('annees','mois', 'created_at')
		// 	->get();

		// 	return $this->getMonth($count);
		// }

		
		// public function getMonth($values)
		// {
		// 	$this->values = $values;
		// 	foreach ($values as $v) {


				
		// 		if($v->mois == 7){

		// 			return 'Juillet';
		// 		}
		// 	}
		// }

		public function getNameOf($email){

		
		$user = DB::table('users')->where('email', $email)->pluck('name');

		foreach ($user as $u) {
			
			return $u;
		}



}






}























 ?>