<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\Vendor;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
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
		return view('products.index', ['products' => Product::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$product = new Product();
		$categories = Category::where('parent_id', 0)->get();
		$brands = Brand::all();
		$vendors = Vendor::all();
		
		return view('products.form', ['method' => 'POST', 'product' => $product, 'categories' =>  $categories, 'brands' => $brands, 'vendors' => $vendors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
		$user = Auth::user();
		
		$product = new Product;
		$product->brand_id = $request->brandId;
		$product->vendor_id = $request->vendorId;
		$product->category_id = $request->categoryId;
		$product->name = $request->name;
		$product->model = $request->model;
		$product->description = $request->description;
				
		$product->created_by = $user->first_name;
		$product->updated_by = $user->first_name;

		$product->save();
		
        return redirect()->action('ProductsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
		$product = Product::find($product->id);
		$categories = Category::where('parent_id', 0)->get();
		$brands = Brand::all();
		$vendors = Vendor::all();
		
		return view('products.form', ['method' => 'PUT', 'product' => $product, 'categories' =>  $categories, 'brands' => $brands, 'vendors' => $vendors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
		$product = Product::find($product->id);
		$categories = Category::where('parent_id', 0)->get();
		$brands = Brand::all();
		$vendors = Vendor::all();
		
		return view('products.form', ['method' => 'PUT', 'product' => $product, 'categories' =>  $categories, 'brands' => $brands, 'vendors' => $vendors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
		$user = Auth::user();
		
		$product->brand_id = $request->brandId;
		$product->vendor_id = $request->vendorId;
		$product->category_id = $request->categoryId;
		$product->name = $request->name;
		$product->model = $request->model;
		$product->description = $request->description;
				
		$product->updated_by = $user->first_name;

		$product->save();
		
        return redirect()->action('ProductsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
