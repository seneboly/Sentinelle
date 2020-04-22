<?php

namespace App\Http\Controllers;

use App\models\Reclamation;
use Illuminate\Http\Request;

use App\Role;
use App\User;

use App\Models\Client;

use App\Models\StatusReclamations;

use App\Http\Requests\CreateReclamation;
use App\Http\Requests\UpateReclamation;

use Illuminate\Support\Facades\DB;



use App\Mail\InformationReclamation;
use App\Mail\UpdatedReclamation;

use Illuminate\Support\Facades\Mail;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function __construct(){

        
         
        $this->middleware('auth');
    }
    public function index()
    {
        $reclamations = Reclamation::where('status_reclamation_id', 1)->orderBy('created_at', 'desc')->get();

        return view('backend.reclamations.reclamations_traitees.index')->withReclamations($reclamations);
    }

    public function getReclamationsNonTraitees()
    {
        $reclamations = Reclamation::where('status_reclamation_id', 3)->orderBy('created_at', 'desc')->get();

        return view('backend.reclamations.reclamations_non_traitees.index')->withReclamations($reclamations);
    }

     public function getReclamationsEnAttente()
    {
        $reclamations = Reclamation::where('status_reclamation_id', 2)->orderBy('created_at', 'desc')->get();

        return view('backend.reclamations.reclamations_en_attente.index')->withReclamations($reclamations);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ccls = Role::find(2);

        $status = StatusReclamations::select('id', 'status')->get();


        return view('backend.reclamations.create', ['status'=>$status] )->withCcls($ccls);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReclamation $request)
    {
        // dd($request->all());
        
        $counter = $this->getNumberOfReclamation();

        $code_client = $this->getCodeClient($request->client_id);

        $fileUploaded = $request->fileUploaded;

        if($fileUploaded != null){

           
           

            $fileUploaded_name = strtolower( $fileUploaded->getClientOriginalName() );


            $path = $fileUploaded->storeAs('public/fichiers/reclamations', $fileUploaded_name, 'local');

             

            $reclamation = Reclamation::create([
                 'code_reclamation'=>'Rec-'.date('d').'-'.date('m').'-'.date('Y').'-'.$code_client.'-'.++$counter,
                 'motif_reclamation'=>$request->motif_reclamation,
                 'justification_traitement'=>$request->justification_traitement,
                 'canal_reception'=>$request->canal_reception,
                 'provenance_reclamation'=>$request->provenance_reclamation,
                 'email_renseigneur'=>$request->email_renseigneur,
                 'reponse_partielle'=>$request->reponse_partielle,
                 'user_id'=>$request->user_id,
                 'service_charge_reclamation_id'=>$request->service_charge_reclamation_id,
                 'client_id'=>$request->client_id,
                 'status_reclamation_id'=>$request->status_reclamation_id,
                 'fileName'=>$fileUploaded_name,
                 'date_reception_sgbs'=>$request->date_reception_sgbs,
                 'date_reception_marche_iaao'=>$request->date_reception_marche_iaao,
                 'date_renseignement_reclamation'=>$request->date_renseignement_reclamation,
            ]);

    }

    else{


                 $reclamation = Reclamation::create([
                 'code_reclamation'=>'Rec-'.date('d').'-'.date('m').'-'.date('Y').'-'.$code_client.'-'.++$counter,
                 'motif_reclamation'=>$request->motif_reclamation,
                 'justification_traitement'=>$request->justification_traitement,
                 'canal_reception'=>$request->canal_reception,
                 'provenance_reclamation'=>$request->provenance_reclamation,
                 'email_renseigneur'=>$request->email_renseigneur,
                 'reponse_partielle'=>$request->reponse_partielle,
                 'user_id'=>$request->user_id,
                 'service_charge_reclamation_id'=>$request->service_charge_reclamation_id,
                 'client_id'=>$request->client_id,
                 'status_reclamation_id'=>$request->status_reclamation_id,
                 'date_reception_sgbs'=>$request->date_reception_sgbs,
                 'date_reception_marche_iaao'=>$request->date_reception_marche_iaao,
                 'date_renseignement_reclamation'=>$request->date_renseignement_reclamation,
        ]);
    }


       

        foreach (auth()->user()->roles as $role) {
            
            if($role->id == 2){

                $ccl = User::find(2);
            }

            else{

                 $ccl = User::find($reclamation->user->id);
            }
        }

       

        $this->sendNotification($ccl->email, $reclamation);

        

        if(!$reclamation){

            return back()->withInput();
        }

        $this->flashMsg('Réclamation renseignée avec succès', 'alert-success');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function show(Reclamation $reclamation)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reclamation $reclamation)
    {
        $status = StatusReclamations::select('id', 'status')->get();
        return view('backend.reclamations.edit', compact('status'))->withReclamation($reclamation);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function update(UpateReclamation $request, Reclamation $reclamation)
    {
        $reclamation_updated = $reclamation->update($request->all());

        $this->flashMsg('Réclamation : '.$reclamation->code_reclamation.' mise à jour avec succès.', 'alert-success');

        if($request->status_reclamation_id == 1){

            $ccl = User::find($reclamation->user_id);   
                 $this->sendUpdatedNotification($ccl , $reclamation)
                 ->flashMsg('Réclamation : '.$reclamation->code_reclamation.' a été bien traitée.', 'alert-success');

            return redirect()->route('reclamations.index');
        }
        
        elseif($request->status_reclamation_id == 2){

            $ccl = User::find($reclamation->user_id);

             $this->sendUpdatedNotification($ccl , $reclamation);

             $this->flashMsg('Réclamation : '.$reclamation->code_reclamation.' a bien été mise en attente.', 'alert-info');

            return redirect()->route('reclamations_en_attente');

        }
        else{

            $ccl = User::find($reclamation->user_id);
            

             $this->flashMsg('Réclamation : '.$reclamation->code_reclamation.' reste non traitée.', 'alert-warning');

            return redirect()->route('reclamations_non_traitees');

        }


        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reclamation $reclamation)
    {
        //
    }

    public function flashMsg($status, $class){

        session()->flash('status', $status);
        session()->flash('class', $class);
        return $this;

    }

    public function sendNotification($destinataire, $reclamation){

        Mail::to($destinataire)
        ->send(new InformationReclamation($reclamation) );

        return $this;
    }

     public function sendUpdatedNotification($destinataire, $reclamation){

        Mail::to($destinataire)
        ->send(new UpdatedReclamation($reclamation) );

        return $this;
    }

   
     public function dataAjax(Request $request)
    {
        $data = [];


        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("reclamations")
            ->join('clients', 'reclamations.client_id', '=','clients.id')
                    ->select("reclamations.id","reclamations.created_at","clients.code_client", 'clients.nom_client')
                    ->where('clients.nom_client','LIKE',"%$search%")

                    ->OrWhere('clients.code_client', 'LIKE', "%$search%")
                    ->get();
        }

        return response()->json($data);
    }

    //endof test


    public function getCodeClient($id){

        $client = Client::find($id);

        return $client->code_client;
    }

     public function getNumberOfReclamation(){

        $res = DB::table('reclamations')->pluck('id')->count();

        return $res;
    }



}
