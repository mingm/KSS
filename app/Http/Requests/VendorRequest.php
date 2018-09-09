<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
			case 'GET':
			case 'DELETE':
			{
				return [];
			}
			case 'POST':
			{
				return [
					'name' => 'required|unique:vendors|max:255',
					'details' => 'required|max:255',
					'phone' => 'required'
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				$vendor = vendor::find($this->vendor->id);
				return [
					'name' => 'required|max:255|unique:vendors,name,'.$vendor->id,
					'status' => 'required|max:255',
					'phone' => 'required'
				];
			}
			default:break;
		}
    }
}
