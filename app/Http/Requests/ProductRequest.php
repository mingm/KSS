<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
					'brandId' => 'required|exists:brands,id',
					'vendorId' => 'required|exists:vendors,id',
					'categoryId' => 'required|exists:categories,id',
					'name' => 'required|max:255|',
					'model' => 'required|max:255|',				
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				$product = Product::find($this->product->id);
				return [
					'brandId' => 'required|exists:brands,id',
					'vendorId' => 'required|exists:vendors,id',
					'categoryId' => 'required|exists:categories,id',
					'name' => 'required|max:255|',
					'model' => 'required|max:255|',
				];
			}
			default:break;
		}
    }
}
