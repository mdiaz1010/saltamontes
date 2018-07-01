<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Tag;
class TagRequest extends FormRequest
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
            case 'POST': return [ 'name' => 'required | max:120 | unique:tags' ]; break;
            case 'PUT' : return [ 'name' => 'required | max:120 | unique:tags,name,' . $id ]; break;
         }
    }
}
