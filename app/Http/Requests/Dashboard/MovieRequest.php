<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
                   $collection = collect($this->request)->toArray();

        if ($collection['type'] == 'publish') {

            return [
                'name' => 'required|min:3|unique:movies,name,' . $collection['id'],
                'description' => 'required',
                 'poster'=>'required|image',
                 'image'=>'required|image',
                'categories' => 'required|array',
                'year' => 'required',
                'rating' => 'required'
            ];
        }else{

            return [
                'name' => 'required|min:3|unique:movies,name,' . $collection['id'],
                'description' => 'required',
                 'poster'=>'sometimes|nullable|image',
                 'image'=>'sometimes|nullable|image',
                'categories' => 'required|array',
                'year' => 'required',
                'rating' => 'required'
            ];

        }
    }

}
