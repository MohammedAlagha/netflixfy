<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        switch($this->method())
        {
           case "GET":
           case "DELETE":
                   return [];
               break;

           case "POST":
            {
                return
                [
                    'name' =>'required|min:3|unique:roles,name',
                    'permissions'=>'required|array|min:1'

                ];
            }
               break;

           case "PUT":
           case "PATCH":
               {
                   $collection = collect($this->request)->toArray();

                    return [
                        'name' =>'required|min:3|unique:roles,name,'.$collection['id'],
                        'permissions'=>'required|array|min:1'


                    ];

           }
           break;
       }
    }
}
