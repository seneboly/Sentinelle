<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reclamation;


class DashboardController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){

    	

    	$reclamations = Reclamation::with(['service_charge_reclamation', 'status_reclamation'])
    	->orderBy('created_at', 'desc')->get();

  
       
    	return view('backend.dashboard.index', compact('reclamations'));

    	
    }




  



}

