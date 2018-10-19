<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
class MemberRequest extends FormRequest
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
            case 'PUT' :
                        return [
                            'name'      => 'required|min:4|max:120',
                            'email'     => 'min:4|max:250|required|email|unique:users,email,' . $id,
                            'password'    => 'required|confirmed|min:6'
                        ];
                        break;
         }

    }

}
