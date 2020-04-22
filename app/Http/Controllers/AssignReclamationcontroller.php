<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;

use App\User;

use App\Mail\AssignerReclamation;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\DB;

use App\Role;

class AssignReclamationcontroller extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

     

        return view('backend.reclamations.assigner.index');
    }

    public function assigner(Request $request){

        $reclamation = Reclamation::find($request->reclamation_id);


        
        $ccl = User::find($request->user_id);



        $assignateur = $request->assignateur;

     

        $ccl->reclamation()->attach($reclamation);
       
        $this->notifierAssignation($ccl->email, $assignateur, $reclamation);

        session()->flash('status', 'La reclamation vient d\'être assignée à '.$ccl->name);
        session()->flash('class', 'alert-success');

        return redirect()->back();
        
    }

        public function notifierAssignation($assigne, $assignateur, $reclamation){

            Mail::to($assigne)
            ->send(new AssignerReclamation($assignateur, $reclamation) ); 

            return $this;
        }


         public function dataAjax(Request $request)
        {
            $data = [];


            if($request->has('q')){
                $search = $request->q;
                $data = DB::table('users')

                    ->join('role_user', 'users.id', '=', 'role_user.user_id')

                    ->join('roles', 'role_user.role_id', '=', 'roles.id')
                    ->select('users.id', 'users.name')
                    ->where('roles.nom_role', 'Assisantant Conseiller Clientèle (ACE)')
                    ->orWhere('roles.nom_role', 'Conseiller Clientèle (CCL) ')
                    ->get();
            }

            

            return response()->json($data);
        }
}
