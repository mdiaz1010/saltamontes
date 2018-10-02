<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Coin_type;
class CoinRequest extends FormRequest
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

        $id= $this->input('id');

        switch ($this->method())
        {
            case 'POST':
                        return [
                            'namecoin'     => 'min:4|max:250|required|namecoin|unique:coins_types',
                            'soles'  => 'min:4|max:120|required',
                            'dolares'  => 'min:4|max:120|required',
                        ];
                        break;
            case 'PUT' :
                        return [
                            'namecoin'     => 'min:4|max:250|required|namnamecoine_coin|unique:coins_types,namecoin,' . $id,
                            'soles'  => 'min:4|max:120|required',
                            'dolares'  => 'min:4|max:120|required',
                        ];
                        break;
         }

    }
}
