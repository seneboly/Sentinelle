<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReclamation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                
                'motif_reclamation'=>'required| string',
                'justification_traitement'=>'required| string',
                'canal_reception'=>'required| string',
                'provenance_reclamation'=>'required| string',
                'reponse_partielle'=>'required| string',
                'user_id'=>'required',
                'service_charge_reclamation_id'=>'required',
                'client_id'=>'required',
                'status_reclamation_id'=>'required',
                'date_reception_sgbs'=>'required',
                'date_reception_marche_iaao'=>'required',
                
        ];
    }

    public function attributes(){

        return [
                    'status_reclamation_id'=>'status de la réclamation',
                    'service_charge_reclamation_id'=>'Direction responsable',
                    'client_id'=>'nom du client',
                    'user_id'=>'conseiller clientèle',
                ];
    }
}
