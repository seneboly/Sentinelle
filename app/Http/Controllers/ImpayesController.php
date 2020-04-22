<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Impayes;

class ImpayesController extends Controller
{
    public function index(){

    	return view('impayes');
    }


      public function store(Request $request){

        if ($request->file('file')){

          $file = $request->file('file');

          // File Details 
          $filename = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          $tempPath = $file->getRealPath();
          $fileSize = $file->getSize();
          $mimeType = $file->getMimeType();


          // dd($file);
          // Valid File Extensions
          $valid_extension = array("csv");

          // 2MB in Bytes
          $maxFileSize = 9097152; 

          // Check file extension
          if(in_array(strtolower($extension),$valid_extension)){

            // Check file size
            if($fileSize <= $maxFileSize){

              // File upload location
              $location = 'impayes';

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
                   "numero_client"=>$importData[0],
                   "numero_compte"=>$importData[1],
                   "agence"=>$importData[2],
                   "chapitre"=>$importData[3],
                   "chapitre_1_3"=>$importData[4],
                   "code_pcb"=>$importData[5],
                   "raison_sociale"=>$importData[6],
                   "segment_bhfm"=>$importData[7],
                   "qualite_client"=>$importData[8],
                   "code_gestionnaire"=>$importData[9],
                   "nom_ges"=>$importData[10],
                   "sde_a_jour"=>$importData[11],
                   "premier_impaye"=>$importData[12],
                   
            
               );
                Impayes::insertData($insertData);

              }

              // session()->flash('status', 'Great it works !');
              // session()->flash('class', 'alert-danger');

              // Session::flash('message','Import Successful.');
            }else{
              // Session::flash('message','File too large. File must be less than 2MB.');
            }

          }else{
             // Session::flash('message','Invalid File Extension.');
          }

        }

        // dd($request->all());

        // Redirect to index
        return redirect()->back();
    }
}
