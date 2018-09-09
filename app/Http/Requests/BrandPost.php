<?php

namespace App\Http\Requests;

use App\Brand;
use Illuminate\Foundation\Http\FormRequest;

class BrandPost extends FormRequest
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
        //return [
        //    'name' => 'required|unique:brands|max:255',
		//	'status' => 'required|in:Active,Inactive',
        //];

		switch($this->method())
		{
			case 'GET':
			case 'DELETE':
			{
				return [];
			}
			case 'POST':
			{
				return [
					'name' => 'required|unique:brands|max:255',
					'status' => 'required|in:Active,Inactive',
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				$brand = Brand::find($this->brand->id);
				return [
					'name' => 'required|max:255|unique:brands,name,'.$brand->id,
					'status' => 'required|in:Active,Inactive',
				];
			}
			default:break;
		}
		
    }
}
