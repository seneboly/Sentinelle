<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpateReclamation extends FormRequest
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
                    'motif_reclamation'=>'required|min:5',
                    'justification_traitement'=>'required|min:5',
                    'canal_reception'=>'min:5',
                    
        ];
    }
}
