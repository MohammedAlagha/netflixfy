<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                    'name' =>'required|min:3',
                    'email' => 'required|email|unique:users,email',
                    'password'=>'required|min:6|password|confirmed',
                    'password_confirmation'=>'password|required|min:6',
                    'role_id'=>'required|numeric'
                ];
            }
               break;

           case "PUT":
           case "PATCH":
               {
                   $collection = collect($this->request)->toArray();

                    return [
                    'name' =>'required|min:3',
                    'email' => 'required|email|unique:users,email,'.$collection['id'],
                    'role_id'=>'required|numeric'
                    ];

           }
           break;
       }
    }
}
