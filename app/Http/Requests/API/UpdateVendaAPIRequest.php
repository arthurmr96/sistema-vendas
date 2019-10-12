<?php

namespace App\Http\Requests\API;

use App\Models\Venda;
use InfyOm\Generator\Request\APIRequest;

class UpdateVendaAPIRequest extends APIRequest
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
        $rules = Venda::$rules;
        
        return $rules;
    }
}
