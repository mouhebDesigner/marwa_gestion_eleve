<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeanceRequest extends FormRequest
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
            "jours" => 'required',
            "temps_debut" => 'required',
            "temps_fin" => 'required',
            "enseignant_id" => 'required',
            "classe_id" => 'required',
            "matiere_id" => 'required',
            "niveau_id" => 'required',
        ];
    }
}
