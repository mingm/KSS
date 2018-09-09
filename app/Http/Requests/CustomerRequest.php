<?php

namespace App\Http\Requests;

use App\Customer;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
					'email' => 'required|unique:customers|max:255',
					'first_name' => 'required|max:255',
					'last_name' => 'required',
					'address' => 'required',
					'phone' => 'required',
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				$customer = Customer::find($this->customer->id);
				return [
					'email' => 'required|max:255|unique:customers,email,'.$customer->id,
					'first_name' => 'required|max:255',
					'last_name' => 'required',
					'address' => 'required',
					'phone' => 'required',
				];
			}
			default:break;
		}
    }
}
