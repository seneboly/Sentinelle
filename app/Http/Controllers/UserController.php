<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


use App\User;
use App\Role;
use App\Models\Reclamation;

use App\Http\Requests\SetPassword;

class UserController extends Controller
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
        //
    }

     public function getPersonnelReporting()
    {
        $reclamation_renseignees = Reclamation::where('email_renseigneur', auth()->user()->email)->paginate(5);

        $rr = Reclamation::where('email_renseigneur', auth()->user()->email)->count();
       
        $reclamation_renseignees_traitee = Reclamation::where('email_renseigneur', auth()->user()->email)
        ->where('status_reclamation_id', 1)->paginate(20);

        $rt = Reclamation::where('email_renseigneur', auth()->user()->email)
        ->where('status_reclamation_id', 1)->count();



         $reclamation_renseignees_attente = Reclamation::where('email_renseigneur', auth()->user()->email)
        ->where('status_reclamation_id', 2)->paginate(20);

         $rea = Reclamation::where('email_renseigneur', auth()->user()->email)
        ->where('status_reclamation_id', 2)->count();

         $reclamation_renseignees_non_traitee = Reclamation::where('email_renseigneur', auth()->user()->email)
        ->where('status_reclamation_id', 3)->paginate(20);

          $rnr= Reclamation::where('email_renseigneur', auth()->user()->email)
        ->where('status_reclamation_id', 3)->count();

        return view('backend.user.personnel_reporting', compact('reclamation_renseignees', 'reclamation_renseignees_traitee', 'reclamation_renseignees_attente', 'reclamation_renseignees_non_traitee', 'rr', 'rt', 'rea', 'rnr'));
    }

    public function getCountParams(){

      return view('backend.user.parametre_compte');
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
    public function store(SetPassword $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SetPassword $request, $id)
    {
        $user = User::find(auth()->user()->id);

       $user->password = bcrypt($request->password);

       $user->update();
        

        session()->flash('status', 'Votre mot de passe a été modifié avec succès');
        session()->flash('class', 'alert-success');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function msgFlash($status, $class){

          session()->flash('status', $status);
          session()->flash('class', $class);

          return $this;
    }

    public function userCredentiels(User $user)
    {
        $user->name = request('name');
        $user->email = request('email');

        return $this;

    }

       protected function assignRole($user, $request)
    {
        $role = Role::find($request);
        $user->roles()->attach($role);
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
                    ->where('roles.nom_role', 'Conseiller Clientèle (CCL) ')
                    ->orWhere('roles.nom_role', 'Responsable Conseiller Clientèle (RCE) ')
                    ->get();
            }

            

            return response()->json($data);
        }


    public function form(){
       return view('template.view_repository.user_form');
     }

     public function uploadFile(Request $request){

         if ($request->input('submit') != null ){

           $file = $request->file('file');

           // File Details 
           $filename = $file->getClientOriginalName();
           $extension = $file->getClientOriginalExtension();
           $tempPath = $file->getRealPath();
           $fileSize = $file->getSize();
           $mimeType = $file->getMimeType();

           // Valid File Extensions
           $valid_extension = array("csv");

           // 2MB in Bytes
           $maxFileSize = 2097152; 

           // Check file extension
           if(in_array(strtolower($extension),$valid_extension)){

             // Check file size
             if($fileSize <= $maxFileSize){

               // File upload location
               $location = 'users';

               // Upload file
               $file->move($location,$filename);

               // Import CSV to Database
               $filepath = url($location."/".$filename);

               // Reading file
               $file = fopen($filepath,"r");

               $importData_arr = array();
               $i = 0;

               while (($filedata = fgetcsv($file, 1000, ";")) !== FALSE) {
                  $num = count($filedata );
                  
                  // Skip first row (Remove below comment if you want to skip the first row)
                  if($i == 0){
                     $i++;
                     continue; 
                  }
                  for ($c=0; $c < $num; $c++) {
                     $importData_arr[$i][] = $filedata [$c];
                  }
                  $i++;
               }
               fclose($file);

               // Insert to MySQL database
               foreach($importData_arr as $importData){

                 $insertData = array(
                    "name"=>Str::title($importData[0]),
                    "email"=>strtolower($importData[1]),
                    "password"=>bcrypt($importData[2]),
                    "code_gestionnaire"=>$importData[3],
                    // "code_gestionnaire"=>$importData[3],
                    // "numero_agence"=>$importData[4],
                    // "nom_agence"=>$importData[5],
                    // "devise"=>$importData[6],
                    // "numero_compte"=>$importData[7],
                    // "intitule"=>$importData[8],
                );
                 User::insertData($insertData);

               }

               session()->flash('status', 'Great it works !');
               session()->flash('class', 'alert-danger');

               // Session::flash('message','Import Successful.');
             }else{
               // Session::flash('message','File too large. File must be less than 2MB.');
             }

           }else{
              // Session::flash('message','Invalid File Extension.');
           }

         }

         // Redirect to index
         return redirect()->back();
       }
}
