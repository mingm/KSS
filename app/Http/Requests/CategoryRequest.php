<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
					'name' => 'required|max:255|unique:categories,name',
					'parentId' => 'required',
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				$category = Category::find($this->categoryId);
				return [
					'updateName' => 'required|max:255|unique:categories,name,'.$category->id,
					'categoryId' => 'required',
				];
			}
			default:break;
		}
    }
}
