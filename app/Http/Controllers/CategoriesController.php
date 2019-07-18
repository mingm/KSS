<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriesController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$datas = $this->getDatas();
		
        return view('categories.index', [ 'datas' => $datas ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
		$category = new Category;
		$category->name = $request->name;
		$category->parent_id = $request->parentId;
		$category->level = $this->getLevel($request->parentId);
		
		//Log::info('Level: ' . $this->getLevel($request->parentId));
		
		if ($request->isRoot) {
			$category->parent_id = 0;
			$category->level = 1;
		}
		
		$category->save();
		
        return redirect()->action('CategoriesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
		$category->name = $request->updateName;
		$category->save();
		
        return redirect()->action('CategoriesController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
	
	private function getSubCategories($children)
	{	
		$json_data = "";
		foreach ($children as $category) {
			$json_data .= '{ "id": "' . $category->id . '", "text": "' . $category->name . '"';
			if(count($category->children) > 0) {
				$json_data .= ', "nodes": [';
				$json_data .= $this->getSubCategories($category->children);
				$json_data .= ']';
			}
			$json_data .= '},';
		}
		
		$json_data = substr($json_data, 0, -1);
		return $json_data;
	}
	
	private function getDatas() {
		
		$categories = Category::where('parent_id', 0)->get();
		$json_data = "";
		foreach ($categories as $category) {
			$json_data .= '{ "id": "' . $category->id . '", "text": "' . $category->name . '"';
			if(count($category->children) > 0) {
				$json_data .= ', "nodes": [';
				$json_data .= $this->getSubCategories($category->children);
				$json_data .= ']';
			}
			$json_data .= '},';
		}
		
		$json_data = substr($json_data, 0, -1);
		return '[' . $json_data . ']';
	}
	
	private function getLevel($catId) {
		$category = Category::find($catId);
		
		if ($category->parent_id == 0)
			return 1;
		
		return $this->findRoot($category, 1) + 1;
	}
	
	private function findRoot($category, $level){
		
		$level++;
		
		if ($category->parent->parent_id == 0)
			return $level;
		
		return $this->findRoot($category->parent, $level);
	}
}
