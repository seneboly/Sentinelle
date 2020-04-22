<?php

namespace App\Http\Controllers;

use App\models\ServiceChargeReclamation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;




class ServiceChargeReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\ServiceChargeReclamation  $serviceChargeReclamation
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceChargeReclamation $serviceChargeReclamation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\ServiceChargeReclamation  $serviceChargeReclamation
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceChargeReclamation $serviceChargeReclamation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\ServiceChargeReclamation  $serviceChargeReclamation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceChargeReclamation $serviceChargeReclamation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\ServiceChargeReclamation  $serviceChargeReclamation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceChargeReclamation $serviceChargeReclamation)
    {
        //
    }

     public function dataAjax(Request $request)
    {
        $data = [];


        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("service_charge_reclamations")
                    ->select("id","nom_service")
                    ->where('nom_service','LIKE',"%$search%")
                    ->get();
        }

        return response()->json($data);
    }


    public function form(){
       return view('template.view_repository.service');
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
               $location = 'services';

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
                  // if($i == 0){
                  //    $i++;
                  //    continue; 
                  // }
                  for ($c=0; $c < $num; $c++) {
                     $importData_arr[$i][] = $filedata [$c];
                  }
                  $i++;
               }
               fclose($file);

               // Insert to MySQL database
               foreach($importData_arr as $importData){

                 $insertData = array(
                    "nom_service"=>$importData[0],
              
                );
                 ServiceChargeReclamation::insertData($insertData);

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
